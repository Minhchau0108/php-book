<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE = edge">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1">
    <title><?php echo $title; ?></title>

    <!-- Bootstrap core CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <?php echo Asset::css('toastr.css'); ?>
    <?php echo Asset::js('toastr.min.js'); ?>
    <style>
    body {
        background: #fafafa;
    min-height: 100vh;
}
    </style>
</head>

<body>
<!-- <nav class = "navbar navbar-dark bg-dark ">
    <div class = "container">
        <div class = "navbar-header">
            <a class = "navbar-brand" href = "/book/index">FuelPHP</a>
        </div>
        <div id = "navbar" class = "collapse navbar-collapse">
            <ul class = "nav navbar-nav">
                <li><a href = "/book/index">Home</a></li>
                <?php if (Auth::member(100)): ?>
                    <li><a href = "/book/addBook">Add book</a></li>
                <?php endif; ?>
                <li><a href="/login/logout">Log out</a></li>
                <li><a href="/book/dashboard">Welcome <?php echo Auth::get_screen_name() ?></a></li>
            </ul>
        </div><!--/.nav-collapse -->
    <!-- </div>
</nav> --> 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/book/index">FUEL BOOKSTORE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="/book/index">Home</a>
        </li>
        <?php if (Auth::member(100)): ?>
        <li class="nav-item">
            <a class="nav-link active" href = "/book/addBook">Add book</a>
        </li>
        <?php endif; ?>
        <?php if (!Auth::member(100)): ?>
        <li class="nav-item"><a  class="nav-link active" href="/book/dashboard">Welcome <?php echo Auth::get_screen_name() ?></a></li>
        <?php endif; ?>
        <?php if (Auth::member(100)): ?>
        <li class="nav-item"><a  class="nav-link active" href="#">Welcome <?php echo Auth::get_screen_name() ?></a></li>
        <?php endif; ?>
      
      </ul>
      <span class="nav-item"><a class="nav-link active"  href="/login/logout">Log out</a></li>
    </div>
  </div>
</nav>

<div class = "container mb-5">
    <div class="col-md-12" style = "margin: 10px 0 0 0;">
        <!-- <h1><?php echo $title; ?></h1>
        <hr> -->
        <?php if (Session::get_flash('success')): ?>
            <div class="alert alert-success alert-dismissible show" role="alert">
                <p>
                    <?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
                    <span>
                        <button type="button" data-dismiss="alert" aria-label="Close" class="btn">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </span>
                </p>
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
    </div>
    <div class = "starter-template" style = "padding: 20px 0 0 0;">
        <?php echo $content; ?>
    </div>

</div><!-- /.container -->

<!-- Footer -->
<footer class="bg-dark text-light">
    <div class="container py-5">
      <div class="row py-4">
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
        <h6>BOOK STORE BY FUEL</h1>
          <p class="font-italic text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
          <ul class="list-inline mt-4">
            <li class="list-inline-item"><a href="#" target="_blank" title="twitter"><i class="fa fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="#" target="_blank" title="facebook"><i class="fa fa-facebook"></i></a></li>
            <li class="list-inline-item"><a href="#" target="_blank" title="instagram"><i class="fa fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="#" target="_blank" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
            <li class="list-inline-item"><a href="#" target="_blank" title="vimeo"><i class="fa fa-vimeo"></i></a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
          <h6 class="text-uppercase font-weight-bold mb-4">Shop</h6>
          
        </div>
        <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
          <h6 class="text-uppercase font-weight-bold mb-4">Company</h6>
         
        </div>
        <div class="col-lg-4 col-md-6 mb-lg-0">
          <h6 class="text-uppercase font-weight-bold mb-4">Newsletter</h6>
          <p class="text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At itaque temporibus.</p>
          <div class="p-1 rounded border">
            <div class="input-group">
              <input type="email" placeholder="Enter your email address" aria-describedby="button-addon1" class="form-control border-0 shadow-0">
              <div class="input-group-append">
                <button id="button-addon1" type="submit" class="btn btn-link"><i class="fa fa-paper-plane"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Copyrights -->
    <div class="bg-light py-4">
      <div class="container text-center">
        <p class="text-muted mb-0 py-2">© All rights reserved.</p>
      </div>
    </div>
  </footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>

</html>