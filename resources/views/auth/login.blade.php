<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }
        .login-container h2 {
            margin-bottom: 20px;
        }
        .forgot-password {
            display: block;
            margin-top: 10px;
            text-align: right;
        }
        .demo-accounts {
    margin-top: 25px;
    padding-top: 20px;
    border-top: 1px solid #ddd;
}

.demo-accounts h5 {
    margin-bottom: 15px;
    text-align: center;
}

.demo-account {
    padding: 10px 12px;
    margin-bottom: 10px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 14px;
}

.demo-account strong {
    display: block;
    margin-bottom: 5px;
}

.demo-account p {
    margin: 2px 0;
}
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    
    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') }}">
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
        <a href="{{ route('forgetpass') }}" class="forgot-password">Forgot Password?</a>

        <div class="demo-accounts">
    <h5>Demo Accounts</h5>

    <div class="demo-account">
        <strong>Mentor</strong>
        <p>Email: hakim09@gmail.com</p>
        <p>Password: 062349</p>
    </div>

    <div class="demo-account">
        <strong>Staff</strong>
        <p>Email: kamarul87@gmail.com</p>
        <p>Password: 082367</p>
    </div>

    <div class="demo-account">
        <strong>Platinum</strong>
        <p>Email: iman@gmail.com</p>
        <p>Password: 134567</p>
    </div>
</div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
