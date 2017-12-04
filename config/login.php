<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/book.png">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
    <!-- FontAwesome -->
    <script src="https://use.fontawesome.com/60653917e2.js"></script>
  </head>
  
  <body>

  <?php  //Start the Session
  session_start();
 require('../config/connection.php');
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['username']) and isset($_POST['password'])){
//3.1.1 Assigning posted values to variables.
$username = $_POST['username'];
$password = $_POST['password'];

$username = htmlentities($username, ENT_QUOTES,"UTF-8");
$password = htmlentities($password, ENT_QUOTES,"UTF-8");
//3.1.2 Checking the values are existing in the database or not
$query = sprintf("SELECT * FROM `users` WHERE username='%s' and password='%s'",
mysqli_real_escape_string($connection,$username),
mysqli_real_escape_string($connection,$password)
);
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$row = mysqli_fetch_object($result);
$adminVar = $row->isAdmin;
$count = mysqli_num_rows($result);

//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){
  
$_SESSION['loggedIn'] = "yes";
$_SESSION['username'] = $username;
if($adminVar == 'true')
{
  $_SESSION['god'] = "yes"; 
}
$smsg = "User Logged Successfully.";
header("Location: ../?page=1");


//
}else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
$fmsg = "Niepoprawne dane logowania";
}
}

//3.2 When the user visits the page first time, simple login form will be displayed.
?>

    <div class="container">

      <form class="form-signin" method="POST">
      <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            Not having account yet? <a href="register.php">Register</a>
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <a class="btn btn-lg btn-primary btn-block" href="../?page=1"><i class="fa fa-home" aria-hidden="true"></i>
        Homepage</a>
      </form>

    </div> <!-- /container -->
  </body>
</html>
