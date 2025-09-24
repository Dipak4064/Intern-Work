<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5 d-flex justify-content-center">
        <div class="card shadow-lg border-0 rounded-4 w-100" style="max-width: 600px;">
            <div class="card-body text-center">
                <img src="https://static.vecteezy.com/system/resources/previews/027/951/137/non_2x/stylish-spectacles-guy-3d-avatar-character-illustrations-png.png"
                    class="rounded-circle mb-3 shadow" alt="User Avatar" style="width: 150px; height: 150px;">
                <h3 class="fw-bold text-primary">{{ $user->name }}</h3>
                <p class="text-muted mb-1 fs-6"><i class="bi bi-envelope"></i> {{ $user->email }}</p>
                <p class="mb-3">
                    <span class="badge bg-info text-dark me-1">Age: {{ $user->age }}</span>
                    <span class="badge bg-secondary">City: {{ $user->city }}</span>
                </p>
                <a href="/users" class="btn btn-primary px-4 py-2 rounded-pill">Go Back</a>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>