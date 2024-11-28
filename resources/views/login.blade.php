<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UKK Januardi</title>
    <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0; /* Remove default margin */
            font-family: 'Arial', sans-serif; /* Consistent font */
            overflow: hidden; /* Prevent scrollbars */
            background: linear-gradient(270deg, #ffffff, #f8f9fa, #ffffff);
            background-size: 400% 400%; /* For animation */
            animation: gradientAnimation 15s ease infinite; /* Animation for background */
        }

        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1); /* Soft shadow */
            border: none; /* Remove border for a cleaner look */
            width: 450px; /* Increased width for the card */
            padding: 30px; /* Increased padding inside the card */
            transform: translateY(-20px); /* Start position for slide-in */
            opacity: 0; /* Start hidden */
            animation: slideIn 0.5s forwards; /* Slide-in animation for card */
            animation-delay: 0.5s; /* Delay for card animation */
            background-color: white; /* White background for the card */
        }

        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .card-title {
            font-weight: bold;
            color: #333;
            font-size: 1.75rem; /* Increased font size of title */
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #ced4da;
            padding: 12px; /* Increased padding to input fields */
            font-size: 1.1rem; /* Increased font size of input fields */
            transition: border-color 0.3s ease, box-shadow 0.3s ease; /* Transition for focus effect */
        }

        .form-control:focus {
            box-shadow: 0 0 5px rgba(106, 17, 203, 0.5); /* Focus shadow */
            border-color: #6a11cb; /* Focus color */
        }

        .btn-success {
            background: linear-gradient(to right, #6a11cb, #2575fc); /* Gradient button */
            border: none;
            border-radius: 10px;
            padding: 12px; /* Increased padding to button */
            font-size: 1.2rem; /* Increased font size of button */
            transition: background 0.3s ease, transform 0.3s ease; /* Transition for button hover */
        }

        .btn-success:hover {
            background: linear-gradient(to right, #2575fc, #6a11cb); /* Hover effect */
            transform: scale(1.05); /* Slightly enlarge on hover */
        }

        .text-center {
            margin-bottom: 20px; /* Space below the title */
        }

        @media (max-width: 576px) {
            .card {
                width: 90%; /* Make the card take up more width on small screens */
            }
        }
    </style>
</head>
<body>
    @include('sweetalert::alert')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 col-10"> <!-- Added col-10 for smaller screens -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sign In</h5>
                        <form action="/auth" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Username" required />
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required />
                            </div>
                            <button type="submit" class="btn btn-success w-100">Sign In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
