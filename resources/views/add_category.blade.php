@extends('layout')
@section('content')
    <section class="container">
        <div class="d-flex flex-column justify-content-center form-container category">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4 fs-1">Add|Edit category</h2>
                    <div class="alert alert-danger fs-2" id="errorMessage">
                        Both fields is required
                    </div>
                    <form id="addCategory">
                        <div class="mb-5">
                            <label for="name" class="form-label fs-2">Name</label>
                            <input type="text" class="form-control fs-2 is-invalid" id="name" name="name"
                                   placeholder="Enter category name">
                            <div class="invalid-feedback fs-3">
                                Maximum 15 characters. Only cyrillic, space, dash.
                            </div>
                        </div>
                        <div class="mb-5">
                            <label for="description" class="form-label fs-2">Description</label>
                            <textarea class="form-control fs-2 is-invalid" id="description" name="description"
                                      placeholder="Enter description"></textarea>
                            <div class="invalid-feedback fs-3">
                                Maximum 50 characters. Only cyrillic, space, dash.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 my-2 fs-2">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
<!--
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Goods</title>
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <script defer src="assets/bootstrap/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header>
    <nav class="mt-3 d-flex justify-content-between fs-2">
        <a href="category.html" class="text-primary text-decoration-none">Category</a>
        <a href="index.html" class="text-primary text-decoration-none">Goods</a>
        <a href="orders.html" class="text-primary text-decoration-none">Orders</a>
        <div>
            <a href="login.html" class="login text-decoration-none">Login</a>
        </div>
    </nav>
    <h1 class="d-flex justify-content-center pt-3">Goods</h1>
</header>
<main>
    <section class="container">
        <div class="d-flex flex-column justify-content-center form-container category">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4 fs-1">Add|Edit category</h2>
                    <div class="alert alert-danger fs-2" id="errorMessage">
                        Both fields is required
                    </div>
                    <form id="addCategory">
                        <div class="mb-5">
                            <label for="name" class="form-label fs-2">Name</label>
                            <input type="text" class="form-control fs-2 is-invalid" id="name" name="name"
                                   placeholder="Enter category name">
                            <div class="invalid-feedback fs-3">
                                Maximum 15 characters. Only cyrillic, space, dash.
                            </div>
                        </div>
                        <div class="mb-5">
                            <label for="description" class="form-label fs-2">Description</label>
                            <textarea class="form-control fs-2 is-invalid" id="description" name="description"
                                      placeholder="Enter description"></textarea>
                            <div class="invalid-feedback fs-3">
                                Maximum 50 characters. Only cyrillic, space, dash.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 my-2 fs-2">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
</body>
</html>
-->
