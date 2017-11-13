<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tech - Build Categories</title>
        <link rel='stylesheet' type='text/css' href='biblioUU.css'>        
    </head>
    <body>
        <h1>Build Item Categories</h1>
        <ol>
            <li>Column 1 shows the item number and title.</li>
            <li>Column 2 shows the keywords and categories associated with that item by the Biblio Mage.</li>
            <li>Column 3 shows the Categories as parsed from Column 2.</li>
            <li>Column 4 shows the entries that will be written to the booksXcats junction table.</li>
        </ol>
        <hr />
            
        <?php
            include './classDB.php';
         //   include './classDBUtilities';
            include './classDBBooks.php';
            $q = new classDBBooks();
            
            echo '<hr />Preparing to call queryCategories from techCatBuild';
            
            $searchResults = $q->queryCategories(1, 200 , 'BUILD');
            echo '<br />' . $searchResults;
        ?>
    </body>
</html>
