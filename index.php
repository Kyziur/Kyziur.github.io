<?php include('config/setup.php'); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="icon" href="img/book.png">

    <title><?php echo $page['title']; ?></title>

    <?php include('config/css.php'); ?>
   
 </head>
 <body>
    <div class="container"> 
        <?php include('template/navigation.php') ?> <!--- MAIN NAVIGATION -->
    </div> <!--- END container -->

    <main role="main" class="container">
      <div class="mt-1">
        <h1> <?php echo $page['header']; ?></h1>
      </div>
        <p class="lead">
          <?php echo $page['body']; ?>
        </p>
    </main>

 <?php include('template/footer.php') ?> <!--- FOOTER -->


<?php include('config/js.php'); ?>

</body>
</html>