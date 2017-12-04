<?php
session_start();
header("Pragma: no-cache");
#Setup file:


#Database connection:
include('config/connection.php');


#Functions:
include('functions/data.php');
include('functions/article.php');
include('functions/insertArticle.php');
include('functions/addToList.php');
include('functions/deleteFromList.php');



#Page Setup:
if(isset($_GET['page']))
{
    $pageid = $_GET['page'];
}else
{
    $pageid = 1; # if there is no value of page go to homepage 
}

if($pageid == 2) #strona z artykułami
{
    
   show_article($connection);
   $page['title'] = 'Książkowe aktualności';
}elseif($pageid == 3) #logowanie
{
    header("Location: config/login.php");
}
if($pageid == 4) #rejestracja
{
    header("Location: config/register.php");
}
if($pageid == 5) #zbior ksiazek
{
    $page['title'] = 'Ksiunszki';
    header("Location: library.php");
}else
{
    $page = data_page($connection,$pageid);
}

?>