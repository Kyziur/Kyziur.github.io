<?php
    
    header("Pragma: no-cache");
    include('config/connection.php');
    

       if(isset($_POST["submit2"]))
        {
            $loggedUser = $_SESSION['username'];
            $query = "SELECT users_id from users where users.username = '$loggedUser'";
            $result = mysqli_query($connection, $query);
            if(mysqli_num_rows($result) > 0 )
            {
                $row = mysqli_fetch_assoc($result);
                $user_id = $row['users_id'];
                
                
            }
        
            $book_id = $_POST['varname2'];
        $query3 = "DELETE FROM booksowned WHERE user_id='$user_id' AND book_id='$book_id' LIMIT 1";
        $result3 = mysqli_query($connection,$query3);
        if($result3)
        {
            echo '<script>alert("Pomyślnie usunięto książkę z listy")</script>';
            $smsg = "Book added successfully";
            
            
        }else
        {
            
            $fmsg ="Failed to insert book <br><br>"
            . "<br> error: " . mysqli_error($connection);      
            mysqli_close($connection);
            
        }
    }

 
?>