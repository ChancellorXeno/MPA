<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
@include('header')
    <div>
        <form action="{{ route('user.login') }}" method="post">
            <div class="form-group">
                <label for="Username">Username</label>
                <input type="text" name="username" class="form-control" id="UsernameInput" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" name="password" class="form-control" id="PasswordInput" placeholder="Password">
            </div>
                <div class="form-group form-check"> 
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            @csrf
        </form>
    </div>
</body>
</html>