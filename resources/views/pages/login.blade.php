<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="School Management System">
  <meta name="author" content="Eazybright">
  <meta name="keyword" content="school, education, academics">
  <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

  <title>SMS | Login Page</title>
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap-theme.css') }}" rel="stylesheet">
  <link href="{{ asset('css/elegant-icons-style.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet" /> 
</head>

<body class="login-img3-body">

  <div class="container">

    <form class="login-form" action="{{ route('/login') }}" method="POST">
      {!! csrf_field() !!}
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" name="username" id="username" class="form-control" placeholder="Username" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
        <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
        <button class="btn btn-info btn-lg btn-block" type="submit">Signup</button>
      </div>
    </form>
    <div class="text-right">
      <div class="credits">
          Built with love by <a href="https://twitter.com/1Doneazy">Eazybright</a>
        </div>
    </div>
  </div>


</body>

</html>