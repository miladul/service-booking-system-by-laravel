<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Booking API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #121212, #1c1c1c);
            color: #ffffff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            background: linear-gradient(160deg, #1f1f1f, #2a2a2a);
            border-radius: 20px;
            border: none;
            box-shadow: 0 8px 30px rgba(0,0,0,0.6);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0,0,0,0.7);
        }
        .card-header {
            background-color: transparent;
            border-bottom: 1px solid #333;
        }
        .card-header h3 {
            font-weight: 600;
            color: #0d6efd;
        }
        .card-body h1 {
            font-size: 2.4rem;
            font-weight: 700;
        }
        .card-body p.lead {
            color: #bbb;
        }
        .btn-primary {
            background: linear-gradient(45deg, #0d6efd, #5a8dee);
            border: none;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 50px;
        }
        .btn-primary:hover {
            background: linear-gradient(45deg, #0a58ca, #3f6fd9);
        }
        code {
            background-color: #2d2d2d;
            padding: 2px 6px;
            border-radius: 4px;
            color: #f1f1f1;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #aaa;
            font-size: 0.9rem;
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
                    <hr class="border-secondary">
                    <p class="mb-0">To use this API, please authenticate using your credentials and access the endpoints via <code>/api/*</code> routes.</p>
                    <a href="{{ asset('open-api/postman_collection.json') }}" download class="btn btn-primary mt-4">
                        📥 Download API Documentation
                    </a>
                </div>
                <div class="footer mt-3">
                    &copy; <script>document.write(new Date().getFullYear());</script> Service Booking System. All rights reserved.
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
