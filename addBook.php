<?php 

    include('config/setup.php');
    include('functions/insertBook.php');
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
        <label for="inputAuthorFirstName" class="sr-only">Imię autora</label>
        <input type="text" name="firstName" class="form-control" placeholder="Imię autora" required autofocus>

        <label for="inputAuthorLastName" class="sr-only">Nazwisko autora</label>
        <input type="text" name="lastName" class="form-control" placeholder="Nazwisko autora" required autofocus>

        <label for="inputTitle" class="sr-only">Tytuł</label>
        <input type="text" name="title" class="form-control" placeholder="Podaj tyuł" required autofocus>

        <label for="inputPublishYear" class="sr-only">Data wydania</label>
        <input type="number" name="publishYear" class="form-control" placeholder="Podaj datę wydania" required autofocus>

        <label for="inputGenre" class="sr-only">Gatunek</label>
        <input type="text" name="genre" class="form-control" placeholder="np. Fantasy|Horror" required autofocus>
        <div class="checkbox">
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submitbook" value="submitbook">Dodaj książkę</button>
        <a class="btn btn-lg btn-primary btn-block" href="index.php"><i class="fa fa-home" aria-hidden="true"></i>
        Homepage</a>
      </form>
</body>
</html>