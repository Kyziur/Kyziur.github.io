<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/book.png">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
     <!-- FontAwesome -->
    <script src="https://use.fontawesome.com/60653917e2.js"></script>
  </head>
  
  <body>

    <?php
	require('connection.php');
    
    if (isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
	      $email = $_POST['email'];
        $password = $_POST['password'];
 
        $query = "INSERT INTO `users` (username, password, email) VALUES ('$username', '$password', '$email')";
        $result = mysqli_query($connection, $query);
        if($result){
            $smsg = "User Created Successfully.";
            header('Location: login.php');
            
        }else{
            $fmsg ="User Registration Failed";
        }

    }
    ?>  



    <div class="container">

      <form class="form-signin" method="POST">
      <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
        <h2 class="form-signin-heading">Please register</h2>
         <label for="inputUsername" class="sr-only">username</label>
        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
        If you have an account please <a href="login.php">login</a>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit"> Register </button>
        <a class="btn btn-lg btn-primary btn-block" href="../?page=1"><i class="fa fa-home" aria-hidden="true"></i>
        Homepage</a>
      </form>

    </div> <!-- /container -->
  </body>
</html>
