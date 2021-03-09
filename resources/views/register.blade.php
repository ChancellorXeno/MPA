<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
@include('header')
<div>
    <form action="" method="post">
        <div class="form-group">
            <label for="Username">Email address</label>
            <input type="username" class="form-control" id="UsernameInput" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" class="form-control" id="PasswordInput" placeholder="Password">
        </div>
            <div class="form-group form-check"> 
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>