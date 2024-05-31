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
    <style>
       
    </style>
</head>
<body>
    <div class="admin-login bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card p-4">
                        <form method="post" id="login-form" action="{{ route('adminlogincheck') }}">
                            @csrf
                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            
                            <h3 class="mb-5 text-center">
                                <i class="fa-solid fa-arrow-right-to-bracket"></i> <b>LOGIN</b>
                            </h3>
                            <div class="form-group input-group">
                                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                <input type="email" class="form-control custom-input mb-3" name="log_email" placeholder="Enter your email" value="{{ old('email') }}"><br>
                               
                            </div>
                            @error('log_email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            <div class="form-group input-group">
                                <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                                <input type="password" class="form-control custom-input mb-3" name="log_password" placeholder="Enter your password"  value="{{ old('password') }}"><br>
                               
                            </div>
                            @error('log_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            <button type="submit" class="btn btn-light login-button mt-4 w-100 mb-3">{{ $button }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <script src="https://kit.fontawesome.com/d8bcc82f5b.js" crossorigin="anonymous"></script>
</body>
</html>
