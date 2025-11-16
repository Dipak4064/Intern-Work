@extends('layout.super')
@section('content')
    <div class="container d-flex flex-column align-items-center justify-content-center text-center" style="height: 490px;">
        <h1>Create Post</h1>
        <form id="postForm">
            @csrf
            <input type="text" name="title" placeholder="Title" required class="form-control mb-2" />
            <textarea name="body" placeholder="Body" required class="form-control mb-2"></textarea>
            <button type="submit" class="btn btn-primary">Submit Post</button>
        </form>
        <div id="response" class="mt-3"></div>
    </div>

    <script>
        const token = "{{ auth()->user()->latest()->first()?->plainTextToken }}";
        console.log(token);

        document.getElementById('postForm').addEventListener('submit', async (e) => {
            e.preventDefault();

            const formData = new FormData(e.target);
            console.log(formData);
            const data = Object.fromEntries(formData.entries());

            try {
                const response = await fetch("{{ route('posts.create') }}", {
                    method: "POST",
                    headers: {
                        "Authorization": `Bearer ${token}`,
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();
                document.getElementById('response').innerHTML = `<p class="text-success">${result.message}</p>`;
                e.target.reset();
            } catch (error) {
                console.error(error);
                document.getElementById('response').innerHTML = `<p class="text-danger">Failed to create post</p>`;
            }
        });
    </script>
@endsection