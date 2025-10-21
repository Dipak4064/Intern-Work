<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function landing()
    {
        $posts = Post::all();
        return view('landing', compact('posts'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $validated['user_id'] = Auth::id(); // take from logged-in user

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        Post::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'img_path' => $validated['image'] ?? null,
            'user_id' => $validated['user_id'],
        ]);

        return redirect()->route('dashboard')->with('success', 'Post created successfully!');
    }
    public function yourposts()
    {
        $posts = Post::where('user_id', Auth::id())->get();
        return view('data', compact('posts'));
    }

    public function showpost($id)
    {
        $post = Post::findOrFail($id);
        Gate::authorize('isloggedin');
        if ($post->user_id !== Auth::id() && !Gate::allows('isadmin')) {
            abort(403, 'Unauthorized action.');
        }
        return view('singlepost', compact('post'));
    }

    public function edit(Request $request, $id)
    {
        // Find the post
        $post = Post::findOrFail($id);

        // Authorization: only owner or admin
        Gate::authorize('isloggedin');
        if ($post->user_id !== Auth::id() && !Gate::allows('isadmin')) {
            abort(403, 'Unauthorized action.');
        }

        // Validation
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Handle image replacement
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($post->img_path && Storage::disk('public')->exists($post->img_path)) {
                Storage::disk('public')->delete($post->img_path);
            }
            // Store new image
            $post->img_path = $request->file('image')->store('images', 'public');
        }

        // Update post fields
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->deleted_by = Auth::id();
        $post->deleted_at = now();
        if($post->user_id !== Auth::id() && !Gate::allows('isadmin')) {
            return redirect()->route('posts.index')->with('error', 'Unauthorized action.');
        }
        $post->delete();
        $post->save();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
    public function Trash()
    {
        $posts = Post::onlyTrashed()->get();
        return view('trash', compact('posts'));
    }
    public function restore($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->route('trash.index')->with('success', 'Post restored successfully!');
    }
    public function permanentDestroy($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->forceDelete();
        return redirect()->route('trash.index')->with('success', 'Post permanently deleted!');
    }
    public function adminIndex()
    {
        Gate::authorize('isadmin');
        $posts = Post::all();
        return view('data', compact('posts'));
    }
    public function search(Request $request)
    {
        $query = $request->input('search');
        $posts = Post::where('title', 'like', "%{$query}%")
            ->orWhere('content', 'like', "%{$query}%")
            ->get();
        return view('searchresult', compact('posts'));
    }

    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'plan' => 'required|string',
            'pid' => 'required|integer',
            'amount' => 'required|numeric',
        ]);

        $date = new \DateTime();
        if ($request->input('plan') === 'premium') {
            $endDate = null;
        } else {
            $endDate = (clone $date)->modify('+1 month')->format('Y-m-d H:i:s');
        }
        $user = Subscription::where('user_id', Auth::id())->get();
        if (!$user->isEmpty()) {
            $user[0]->user_id = Auth::id();
            $user[0]->plan = $request->input('plan');
            $user[0]->pid = $request->input('pid');
            $user[0]->amount = $request->input('amount');
            $user[0]->status = 'initialized';
            $user[0]->start_date = $date->format('Y-m-d H:i:s');
            $user[0]->end_date = $endDate;
            $user[0]->save();
        } else {
            Subscription::create([
                'user_id' => Auth::id(),
                'plan' => $request->input('plan'),
                'pid' => $request->input('pid'),
                'amount' => $request->input('amount'),
                'status' => 'initialized',
                'start_date' => $date->format('Y-m-d H:i:s'),
                'end_date' => $endDate,
            ]);

        }

        $amount = $request->input('amount');
        $pid = $request->input('pid');
        $message = 'total_amount=' . $amount . ',transaction_uuid=' . $pid . ',product_code=EPAYTEST';
        $secrete = '8gBm/:&EnhH.1/q';
        $successUrl = route('payment.success');
        $failureUrl = route('payment.failure');
        $s = hash_hmac('sha256', $message, $secrete, true);
        $html = '<body>
                <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
                <input type="hidden" id="amount" name="amount" value=' . $amount . ' required>
                <input type="hidden" id="tax_amount" name="tax_amount" value ="0" required>
                <input type="hidden" id="total_amount" name="total_amount" value=' . $amount . ' required>
                <input type="hidden" id="transaction_uuid" name="transaction_uuid" value="' . $pid . '" required>
                <input type="hidden" id="product_code" name="product_code" value ="EPAYTEST" required>
                <input type="hidden" id="product_service_charge" name="product_service_charge" value="0" required>
                <input type="hidden" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
                <input type="hidden" id="success_url" name="success_url" value="' . $successUrl . '" required>
                <input type="hidden" id="failure_url" name="failure_url" value="' . $failureUrl . '" required>
                <input type="hidden" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
                <input type="hidden" id="signature" name="signature" value="' . base64_encode($s) . '" required>
                <input value="pay via eSewa" type="submit">
                </form>
                </body>';
        return $html;
    }
    public function paymentSuccess(Request $request)
    {
        $user = Subscription::where('user_id', Auth::id())->get();
        $payment = Subscription::where('user_id', Auth::id())->get();
        $payment[0]->status = 'payed';
        $amount = $payment[0]->amount;

        if ($amount > 0 || $payment[0]->status == 'payed') {
            $payment[0]->total_amount += $amount;
        }
        $user = User::find(Auth::id());
        $user->payment_status = 'payed';
        $user->save();
        $payment[0]->save();
        $pid = $payment[0]->pid;
        return view('payment_success', compact('amount', 'pid'));
    }
    public function paymentFailure(Request $request)
    {
        $payment = Subscription::where('user_id', Auth::id())->latest()->first();
        $payment->status = 'failed';
        $payment->save();
        $amount = $payment->amount;
        $pid = $payment->pid;
        return view('payment_failed', compact('amount', 'pid'));
    }
}
