<?php
 header("Pragma: no-cache");
 include('config/connection.php');

      if(isset($_POST["submitArticle"]))
    {
        if (isset($_POST['title']) && isset($_POST['content']))
        {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $author = $username = $_SESSION['username'];
            $createDate = date("Y-m-d");
            $query = "INSERT INTO `articles` (author, title, content, createDate) VALUES ('$author', '$title', '$content', '$createDate')";
            $result = mysqli_query($connection, $query);
            if($result){
                $smsg = "Article send successfully";
                mysqli_close($connection);
                
            }else{
                $fmsg ="Failed to insert article <br><br>" 
                . " title: " . $title 
                . "<br> content: " . $content 
                . "<br> keywords: " . $keywords
                . "<br> dateTime: " . $createDate
                . "<br> query: " . $query
                . "<br> error: " . mysqli_error($connection);
            }
        }
    }

?>