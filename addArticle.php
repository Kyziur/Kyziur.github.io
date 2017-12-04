<?php 

    include('config/setup.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Article</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
    <link href="css/starter-template.css" rel="stylesheet">
    <!-- FontAwesome -->
    <script src="https://use.fontawesome.com/60653917e2.js"></script>
</head>
<body>
    

<div class="container">

      <form class="form-signin" method="POST">
      <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
        <h2 class="form-signin-heading">Uzupełnij pola</h2>
        <label for="inputAuthor" class="sr-only">Tytuł</label>
        <input type="text" name="title" class="form-control" placeholder="Podaj tytuł" required autofocus>
        <label for="inputContent" class="sr-only">Treść artykułu</label>
        <textarea class="form-signin topFixing" cols="27" rows="5" id="inputContent" name="content" placeholder="Podaj treść" required></textarea>
        
        <div class="checkbox">
        
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submitArticle">Dodaj artykuł</button>
        <a class="btn btn-lg btn-primary btn-block" href="index.php"><i class="fa fa-home" aria-hidden="true"></i>
        Homepage</a>
      </form>


      </body>
</html>