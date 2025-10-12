<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Striped Table Example</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Bootstrap Striped Table Example</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Alice</td>
                    <td>Johnson</td>
                    <td>@alice</td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>Bob</td>
                    <td>Smith</td>
                    <td>@bobsmith</td>
                </tr>
            </tbody>
        </table>

        <h3 class="mt-5 mb-3">Additional Table Variations</h3>

        <!-- Dark striped table -->
        <h4>Dark Striped Table</h4>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>John Doe</td>
                    <td>john@example.com</td>
                    <td>Admin</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jane Smith</td>
                    <td>jane@example.com</td>
                    <td>User</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Mike Wilson</td>
                    <td>mike@example.com</td>
                    <td>Moderator</td>
                </tr>
            </tbody>
        </table>

        <!-- Striped table with hover effect -->
        <h4 class="mt-4">Striped Table with Hover Effect</h4>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Laptop</td>
                    <td>$999.99</td>
                    <td>15</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Mouse</td>
                    <td>$29.99</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Keyboard</td>
                    <td>$79.99</td>
                    <td>25</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Monitor</td>
                    <td>$299.99</td>
                    <td>8</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>