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
    <h2 class="mt-5">Welcome to my application!</h2>
    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
                <li> <?php echo $error ?> </li>
            <?php endforeach;?>
        </div>
    <?php endif; ?>


    <?php if (Session::get_flash('error')): ?>
        <div class="alert alert-danger alert-dismissible show" role="alert">
            <p>
                <?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
                <span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </span>
            </p>
        </div>
    <?php endif; ?>

    <form method="post" action="/login/login">
        <div class="form-group">
            <label for="email" class="mt-3">Username:</label>
            <input type="text" class="form-control" id="email" placeholder="Enter username" name="username"
                   value=<?php echo !empty($oldRequest['username']) ? $oldRequest['username'] : '' ?>>

            <?php if (!empty($errors['username'])): ?>
                <div class="alert alert-danger">
                    <?php echo $errors['username'] ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="pwd" class="mt-3">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">

            <?php if (!empty($errors['password'])): ?>
                <div class="alert alert-danger">
                    <?php echo $errors['password'] ?>
                </div>
            <?php endif; ?>

        </div>
        <div class="checkbox mt-3">
            <label><input type="checkbox" name="remember"> Remember me</label>
        </div> 
        <button type="submit" class="btn btn-primary mt-3"> Login </button>
        <br> <br>
        <p> I don't have an account <a href="/login/register"> Register </a> </p>
    </form>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>
