<?php   
  session_start();
  if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($validCredentials){
      $_SESSION['username'] = $username;
    }
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ariana Ariline | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Ariana</b>Airline</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="main.php" method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name = "username" id = "username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name ="password" id ="password"  placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" name = "submit" class="btn btn-primary btn-block" value ="sign in" >
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Please Create your account</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<?php 
  $host = 'localhost';
  $username = 'root';
  $password = '';
  $dbname = 'ariana_atr';
  
  $conn = new mysqli($host, $username, $password, $dbname);
 
  if($conn->connect_error){
    die("connection failed".$conn->connect_error);
  }
if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "select * from users where username = '$username' and password = '$password'"; 
  $result = $conn -> query($sql);
  if($result ->num_rows > 0){
    $row = $result -> fetch_assoc();
  }else{
    echo "Username or password is not matched";
  }
}
  $conn->close();

?>
<!-- /.login-box -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>
