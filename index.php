

<?php session_start();

 require_once("db_config.php");

   if(isset($_POST["btnLogin"])){

      $username=$_POST["txtUsername"];
      $password=md5($_POST["pwdPassword"]);


      $query=$db->query("select id,username,role_id from {$ex}users where username='$username' and password='$password'");
 
      if($db->affected_rows>0){
        list($user_id,$username,$role_id)=$query->fetch_row();
        
        $_SESSION["s_id"]=$user_id;
        $_SESSION["s_username"]=$username;
        $_SESSION["s_role_id"]=$role_id;

        header("location:home.php");

      }else{
         $error="Username or password is incorrect";
      }
      

   }
     

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>BIKEBD| Log in</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Font Awesome -->
<link rel="stylesheet" href="asset/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="asset/AdminLTE-3.0.5/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="asset/AdminLTE-3.0.5/dist/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link href="logo.jpg"  rel="icon">
	<link href="logo.jpg"  rel="apple-touch-icon">

<style>
    .bg{
      background-image: url("img/bg4.jpg");
      background-position: center;
      background-size: cover;
    }
    .card_bg{
      background-image: url("img/bg.jpg") ;
      background-position: center;
      background-size: cover;
      border:1px solid white;
    }
    .logo{
   height:100px;
   width:100px;
 }
    
    .text1{
      font-size:35px;
      text-align:center;
     
    }
    .text2{
      text-align:center;
    }
   
    
</style>

</head>
<body >

<div class="hold-transition login-page bg">
  
  <div class="row">

  
    <div class="col-sm-5">
    </div>

      <div class="col-sm-3">
        <div class="login-box "  >
          <!-- //.login-logo -->
          <div class="card "  >
            <div class="card-body login-card-body card_bg rounded text-white "  >
              <div class="login-logo "><img class="logo rounded-circle pb-0 mb-0" src="img/logo2.jpg " alt="logo2"></div>
              <div class="text1" style="opacity:"><strong>BikeBD</strong></div>
              <div class="text2"> Most Popular Bike Portal of Bangladesh</div>
              
              <p style="color:red;text-align:center;">
              <?php echo isset($error)?$error:""?></p>

                  <form action="#" method="post">
                      <div class="input-group mb-3">
                          <input type="text" class="form-control" name="txtUsername" placeholder="Email">
                          <div class="input-group-append">
                            <div class="input-group-text bg-white">
                              <span class="fas fa-envelope" style="color:dark"></span>
                            </div>
                          </div>
                        </div>

                        <div class="input-group mb-3">
                          <input type="password" class="form-control" name="pwdPassword" placeholder="Password">
                          <div class="input-group-append">
                            <div class="input-group-text  bg-white">
                              <span class="fas fa-lock"  style="color:dark"></span>
                            </div>
                          </div>
                        </div>

                    <div class="row">
                    <div class="col-8">
                      <div class="icheck-primary text-primary">
                        <input type="checkbox" id="remember">
                        <label for="remember">
                          Remember Me
                        </label>
                      </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                      <input type="submit" name="btnLogin" class="btn btn-primary btn-block" value="Sign In"/>
                    </div>
                    <!-- /.col -->
                  
               </form>

              <!-- <div class="social-auth-links text-center ">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary" style="background-color:#132A4D">
                  <i class="fab fa-facebook mr-2" style="color:#B0C4DE"></i> Sign in using Facebook
                </a>
              </div> -->
              <!-- /.social-auth-links -->

              <!-- <p class="mb-1">
                <a href="forgot-password.html" style="color:#B0C4DE">I forgot my password</a>
              </p> -->

            </div>
            <div class="pt-3">
                <table class="table table-bordered table-sm">
                  <tr>
                    <td>Usernaem: admin</td>
                    <td>Password: 123456</td>
                  </tr>
                </table>
            </div>

            <!-- /.login-card-body -->
          </div>
        </div>
      </div>

    <div class="col-sm-4">
      </div>
     

    </div>
</div>
 


<!-- jQuery -->
<script src="asset/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="asset/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="asset/AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>

</body>
</html>
