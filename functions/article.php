<?php
    


    function show_article($connection)
    { 
        $query = "SELECT * FROM articles ORDER BY createDate DESC";
        $result = mysqli_query($connection,$query);
            if(!$result)
            {
                echo('Error selecting news' . mysqli_error($connection));
                exit();
            }else
                {
                    echo '<div class="container">';
                    echo '<div class="col-sm-8 blog-main">';
                    
                    if(mysqli_num_rows($result)>0)
                    {
                        while($row = mysqli_fetch_object($result))
                        { 
                            echo '<div class="blog-post">';
                            echo '<h2 class="blog-post-title">' . $row->title . '</h2>';
                            echo '<p class="blog-post-meta"> Added ' . $row->createDate . ' by ' . '<a href="#"> ' . $row->author . '</a></p>';
                            echo '<p>' . $row->content . '</p>';
                            echo '</div>'; #end blog post
                        }
                    }
                    echo '</div>'; #End Blog main
                    echo '</div>'; # END ROW
                }
    }

  
    
?>