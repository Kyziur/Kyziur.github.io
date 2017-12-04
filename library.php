<?php include('config/setup.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/book.png">

    <title>Książkowi znajomi</title>

    <?php include('config/css.php'); ?>


  </head>
  
  <body>
  <div class="container"> 
        <?php include('template/navigation.php') ?> <!--- MAIN NAVIGATION -->
    </div> <!--- END container -->
    <?php
    $sortujPo = "title";
    $query = "SELECT title, firstName, lastName, genre, publishYear, book_id from books inner join authors using(author_id) ORDER by $sortujPo";
    $result = mysqli_query($connection,$query);
        if(!$result)
        {
            echo('Error selecting library database' . mysqli_error($connection));
            exit();
            
        }else
            {
                echo '<div class="container">';
                echo '
                      <table class="table table-sm table-hover" id="libraryTable">
                        <thead class="thead-dark">
                          <tr>
                          <th id="thpoint" onclick="sortTable(0)">Tytuł</th>
                          <th id="thpoint" onclick="sortTable(1)">Imię</th>
                          <th id="thpoint" onclick="sortTable(2)">Nazwisko</th>
                          <th id="thpoint" onclick="sortTable(3)">Gatunek</th>
                          <th id="thpoint" onclick="sortTable(4)">Rok wydania</th>'; ?>
                          <?php  if(!empty($_SESSION['loggedIn']) && $_SESSION['loggedIn']=="yes")
                          { echo '<th>Twoja lista</th>'; }?>
                          <?php echo' </tr>     
                        </thead>
                        <tbody>'; 
                        
            
                        
                        if(mysqli_num_rows($result)>0)
                        {
                            while($row = mysqli_fetch_object($result))
                            {   $book_id = $row->book_id;
                                echo '<tr>';
                                echo '<td>' . $row->title . '</td>';
                                echo '<td>' . $row->firstName . '</td>';
                                echo '<td>' . $row->lastName . '</td>';
                                echo '<td>' . $row->genre . '</td>';
                                echo '<td>' . $row->publishYear . '</td>';
                                ?>
                                <?php  if(!empty($_SESSION['loggedIn']) && $_SESSION['loggedIn']=="yes")
                                {
                                echo '<td> 
                                <form class="form-inline" action="" method="POST">
                                    <input type="hidden" name="varname" value="' .$book_id .'">
                                    <input type="submit" class="btn btn-outline-dark btn-sm" name="submit" 
                                    value="Dodaj">
                                </form></td>'; 
                                echo '</tr>';
                                ?>
                                <?php
                                }
                            }
                            $num_rows = mysqli_num_rows($result);
                        }
                echo '</tr>'; echo '<h3 id="topik">Ilość książek w bibliotece to: '. $num_rows . '</h3>';
                echo '
                </tbody>
              </table>
                </div>'; 
            }
    ?>




<?php include('template/footer.php') ?> <!--- FOOTER -->
<?php include('config/js.php'); ?>

</body>
</html>