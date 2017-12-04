<?php
 header("Pragma: no-cache");
 include('config/connection.php');
 
      if(isset($_POST["submitbook"]))
    {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $title = $_POST['title'];
            $publishYear = $_POST['publishYear'];
            $genre = $_POST['genre'];
            
            
            # Dodanie autora i wyszukanie jego ID
            $queryAuthor = "INSERT INTO `authors` (firstName, lastName) VALUES ('$firstName', '$lastName')";
            $resultOfInsertingAuthor = mysqli_query($connection, $queryAuthor) or die ("ERROR: " . mysqli_error($connection));
            # Sprawdzanie czy query autora się wykonało
            if($resultOfInsertingAuthor){
                echo '<script>alert("Pomyślnie dodano autora")</script>';
                $smsg = "Author inserted sucessfully";
                
                
            }else{
                echo '<script>alert("Błąd przy dodawaniu autora")</script>';
                $fmsg ="Failed to insert author <br><br>" 
                . " firstName: " . $firstName
                . "<br> lastName: " . $lastName
                . "<br> query: " . $queryGetAuthorId
                . "<br> error: " . mysqli_error($connection);
            }
            $queryGetAuthorId = "SELECT author_id FROM `authors` WHERE firstName = '$firstName' AND lastName = '$lastName' LIMIT 1";
            $resultOfAuthorId = mysqli_query($connection, $queryGetAuthorId) or die ("ERROR: " . mysqli_error($connection));

            # Sprawdzanie czy query autora się wykonało
            if($resultOfAuthorId){
                echo '<script>alert("Pomyślnie zaznaczono autora")</script>';
                $smsg = "Author selected sucessfully";
               
                
            }else{
                echo '<script>alert("Błąd przy zaznaczaniu autora")</script>';
                $fmsg ="Failed to select author <br><br>" 
                . " firstName: " . $firstName
                . "<br> lastName: " . $lastName
                . "<br> query: " . $queryGetAuthorId
                . "<br> error: " . mysqli_error($connection);
            }

            # Zapisanie ID autora
            if(mysqli_num_rows($resultOfAuthorId) > 0 )
            {
                $rowAuthors = mysqli_fetch_assoc($resultOfAuthorId);
                $authorId = $rowAuthors['author_id'];
            }
            # Dodanie książki
            $queryBook = "INSERT INTO books (author_id, title, publishYear, genre) VALUES ('$authorId', '$title', '$publishYear', '$genre')";
            $resultOfBook = mysqli_query($connection, $queryBook) or die ("ERROR: " . mysqli_error($connection));;
            
            if($resultOfBook){
                echo '<script>alert("Pomyślnie dodano książkę do listy")</script>';
                $smsg = "Book inserted successfully";
                mysqli_close($connection);
                
            }else{
                echo '<script>alert("Błąd przy dodawaniu książki do listy")</script>';
                $fmsg ="Failed to insert book <br><br>" 
                . " title: " . $title 
                . "<br> authorId: " . $authorId
                . "<br> publishYear: " . $publishYear
                . "<br> genre: " . $genre
                . "<br> query: " . $queryBook
                . "<br> error: " . mysqli_error($connection);
            }
        
    }

?>