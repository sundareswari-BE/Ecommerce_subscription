<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <script src="https://kit.fontawesome.com/d8bcc82f5b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
@if (session('message'))
<div class="alert  alert-success flash-message text-center text-danger">
    {{ session('message') }}
</div>
@endif

    <div class="bg-light">
        <div class="container">
      
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-md-5">
                    <div class="card p-4">
                    <form method="post" id="login-form" action="{{ route('check') }}">
                        @csrf
                       
                        
                        <h3 class="mb-5 text-center">
                            <i class="fa-solid fa-arrow-right-to-bracket"></i> <b>LOGIN</b>
                        </h3>
                        <div class="form-group input-group">
                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" class="form-control custom-input mb-3" name="log_email" placeholder="Enter your email" value="{{ old('email') }}">
                            </div>
                            @error('log_email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                      
                        <div class="form-group input-group">
                            <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                            <input type="password" class="form-control custom-input mb-3" name="log_password" placeholder="Enter your password"  value="{{ old('password') }}">
                           
                        </div>
                        @error('log_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        <button type="submit" class="btn btn-light login-button mt-4 w-100 mb-3">{{ $button }}</button>
                        <p class="text-center" id="signuppage">Don't have an account? <u class="text-primary">Sign Up</u></p>
                    </form>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card p-4">
                   
                    <form action="{{ route('store') }}" method="post" id="reg-form">
                        @csrf
                        <h3 class="mb-4 text-center">
                            <i class="fa-solid fa-id-card"></i> <b>REGISTER</b>
                        </h3>
        
                        <div class="form-group input-group">
                            <span class="input-group-text"><i class="fa-solid fa-circle-user"></i></span>
                            <input type="text" class="form-control custom-input mb-3" name="name" placeholder="Enter your name" value="{{ old('name') }}">
                           
                        </div>
                        @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        <div class="form-group input-group">
                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" class="form-control custom-input mb-3" name="email" placeholder="Enter your email" value="{{ old('reg-email') }}">
                            </div>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                      
                        <div class="form-group input-group">
                            <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                            <input type="password" class="form-control custom-input mb-3" name="password" placeholder="Enter your password">
                            </div>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                      
                        <div class="form-group input-group">
                            <span class="input-group-text"><i class="fa-solid fa-phone-volume"></i></span>
                            <input type="number" class="form-control custom-input mb-3" name="number" placeholder="Enter your number" value="{{ old('number') }}">
                            </div>
                            @error('number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                      
                        <button type="submit" class="btn btn-light login-button text-center mt-4 w-100 mb-3">{{ $button }}</button>
                        <p id="signinpage" class="text-center">Already have an account? <u class="text-primary">Sign In</u></p>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/d8bcc82f5b.js" crossorigin="anonymous"></script>
</body>

</html>

@if (session('message'))
<div class="flash-message text-center text-success">
    {{ session('message') }}
</div>
@endif


<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            var flashMessages = document.querySelectorAll('.flash-message');
            flashMessages.forEach(function(flashMessage) {
                flashMessage.style.display = 'none';
            });
        }, 2000); // 5000 milliseconds = 5 seconds
    });
</script>
