<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
body{
    min-height: 100vh;
}

    </style>
</head>
<body>

<div class="container-fluid">
<div class="row no-gutter">
<div class="col-md-5 d-none d-md-flex ml-0">
<img src="https://images.unsplash.com/photo-1543002588-bfa74002ed7e?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8Ym9va3xlbnwwfDF8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"></img>
</div>
<div class="col-md-6  mt-5">
    <h2> Register </h2>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
                <li> <?php echo $error ?> </li>
            <?php endforeach;?>
        </div>
    <?php endif; ?>

    <?php if (!empty(Session::get_flash('errorMessage'))): ?>
        <div class="alert alert-danger">
            <strong>Danger!</strong> <?php echo Session::get_flash('errorMessage') ?>
        </div>
    <?php endif; ?>

    <form method="post" action="/register/register">
        <?php echo \Form::csrf(); ?>
        <div class="form-group">
            <label for="username" class="mt-2">Username:</label>
            <input type="text" class="form-control" id="username" placeholder="Enter username" name="username"
                   value=<?php echo !empty($oldRequest['username']) ? $oldRequest['username'] : '' ?>>
        </div>
        <div class="form-group">
            <label for="pwd" class="mt-2">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email"
                   value=<?php echo !empty($oldRequest['email']) ? $oldRequest['email'] : '' ?>>
        </div>
        <div class="form-group">
            <label for="pwd" class="mt-2">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
        </div>
        <div class="form-group">
            <label for="pwd" class="mt-2">Retype Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="confirmed_password">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Register</button>
        <br> <br>
        <p> I have an account! <a href="/login/login"> Login </a> </p>
    </form>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>
