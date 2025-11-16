<?php

namespace App\Http\Middleware;

use App\Models\Subscription;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Symfony\Component\HttpFoundation\Response;

class checkExpiryDate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = User::find(Auth::id());
        if ($user->hasRole('subscriber') || $user->hasRole('admin')) {
            $subscription = Subscription::where('user_id', $user->id)->first();
            if (!$subscription) {
                return redirect()->route('getprice')->with('message', 'No active subscription found. Please subscribe to access premium features.');
            } else if ($subscription->end_date === null) {
                return $next($request);
            } else if ($subscription->status == 'failed') {
                return redirect()->route('getprice')->with('message', 'Your subscription payment has failed. Please update your payment information to continue accessing premium features.');
            } else if ($subscription && now()->lt($subscription->end_date)) {
                return $next($request);
            } else if ($subscription && now()->gt($subscription->end_date)) {
                $user->payment_status = 'expired';
                $subscription->status = 'expired';
                $user->save();
                $subscription->save();
                return redirect()->route('getprice')->with('message', 'Your subscription has expired. Please renew to continue accessing premium features.');
            }
        } else {
            return redirect()->route('getprice')->with('message', 'You need to be a subscriber to access this feature. Please subscribe to continue.');
        }

        return $next($request);
    }
}
