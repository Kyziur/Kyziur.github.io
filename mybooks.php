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
    $loggedUser = $_SESSION['username'];
    $query = "SELECT title, firstName, lastName, genre, publishYear, book_id from booksowned inner join books using(book_id) inner join authors using(author_id) inner join users on (booksowned.user_id = users.users_id) where users.username = '$loggedUser'";
    $result = mysqli_query($connection,$query);
        if(!$result)
        {
            echo('Error selecting mybooks database ' . mysqli_error($connection));
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
                          <th id="thpoint" onclick="sortTable(4)">Rok wydania</th>
                          <th>Twoja lista</th>
                          </tr>
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
                                echo '<td> 
                                <form class="form-inline" action="" method="POST">
                                <input type="hidden" name="varname2" value="'.$book_id .'">
                                <input type="submit" class="btn btn-outline-dark btn-sm" value="Usuń" name="submit2">
                            </form></td>'; 
                            echo '</tr>';
                            }
                            $num_rows = mysqli_num_rows($result);
                            
                        }
                echo '</tr>';  echo '<h3 id="topik">Twoja ilość książek to: '. $num_rows . '</h3>';
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