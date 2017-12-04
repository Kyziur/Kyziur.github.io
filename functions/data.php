<?php
    function data_page($connection, $id)
    {
        $query = "SELECT * FROM pages WHERE page_id= $id";
        $result = mysqli_query($connection, $query);
        $page = mysqli_fetch_assoc($result);

        return $page;
    }
?>