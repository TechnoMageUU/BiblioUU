<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
//  Get search parameters from the form
$search_Title = trim($_POST['searchTitle']);
$search_Author = trim($_POST['searchAuthor']);
//$search_Types = $_POST[''];
//$search_Cats = $_POST[''];
//$search_UU6 = $_POST[''];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Search Results</title>
        <link rel='stylesheet' type='text/css' href='biblioUU.css'>        
    </head>
    <body>
        <h2>Unitarian Universalist Congregation of Frederick</h2>
        <h1>Search Results</h1>
        <br />
        <?php
            echo '<br />search_Title='  . $search_Title; 
            echo '<br />search_Author=' . $search_Author; 
        
            include './classDB.php';
            include './classDBBooks.php';
            $q = new classDBBooks();
            $searchResults = $q->querySearchResults($search_Title, $search_Author);
            echo '<br />' . $searchResults;
        ?>
    </body>
</html>
