<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Booking API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            background-color: #1f1f1f;
            border-radius: 20px;
            border: none;
            box-shadow: 0 0 20px rgba(0,0,0,0.5);
        }
        .card-header {
            background-color: transparent;
            border-bottom: 1px solid #333;
        }
        .card-body h1 {
            font-size: 2.2rem;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #aaa;
            font-size: 0.9rem;
        }
        a {
            color: #0d6efd;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container px-3">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card text-center p-4">
                <div class="card-header">
                    <h3 class="mb-0">🚀 Welcome to</h3>
                </div>
                <div class="card-body">
                    <h1 class="fw-bold">Service Booking System API</h1>
                    <p class="mt-3 lead">This is the backend API service for managing and booking services.</p>
                    <hr>
                    <p class="mb-0">To use this API, please authenticate using your credentials and access the endpoints via <code>/api/*</code> routes.</p>
                    <p class="mt-3"><a href="https://miladul-bd.postman.co/workspace/My-Workspace~9ebeb10d-5cc1-40b8-8636-de4469f2a7e2/collection/15141375-910da93e-5edd-4537-80c0-a190c602c4bd?action=share&source=copy-link&creator=15141375" target="_blank">📄 View API Documentation</a></p>
                </div>
                <div class="footer mt-3">
                    &copy; {{ date('Y') }} Service Booking System. All rights reserved.
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
