<?php
    
    header("Pragma: no-cache");
    include('config/connection.php');
    error_reporting(0);

       if(isset($_POST["submit"]))
        {
            $loggedUser = $_SESSION['username'];
            $query = "SELECT users_id from users where users.username = '$loggedUser'";
            $result = mysqli_query($connection, $query);
            if(mysqli_num_rows($result) > 0 )
            {
                $row = mysqli_fetch_assoc($result);
                $user_id = $row['users_id'];
                
            }
        
            $book_id = $_POST['varname'];
        $query2 = "INSERT INTO booksowned(user_id, book_id) VALUES ('$user_id', '$book_id')";
        $result2 = mysqli_query($connection,$query2);
        if($result2)
        {
            echo '<script>alert("Pomyślnie dodano książkę do listy")</script>';
            $smsg = "Book added successfully";
            
            
        }else
        {
            
            $fmsg ="Failed to insert book <br><br>"
            . "<br> error: " . mysqli_error($connection);      
            mysqli_close($connection);
            
        }
    }

 
?>