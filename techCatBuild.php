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
    </head>
    <body>
        <h1>Build Item Categories</h1>
        <ol>
            <li>Column 1 will contain the item number and title.</li>
            <li>Extract category text from the Items table and list them in Column 2.</li>
            <li>In column 2, show the Categories as parsed from Column 2.</li>
            <li>Column 3 will show the entries that will be written to the booksXcats junction table.</li>
        </ol>
        <hr />

            
            <?php
            include './classDB.php';
         //   include './classDBUtilities';
            include './classDBBooks.php';
            $q = new classDBBooks();
            
            echo '<hr />Preparing to call queryCategories from techCatBuild';
            
            $searchResults = $q->queryCategories(1, 200);
            echo '<br />' . $searchResults;
        ?>
            
            
           
        <?php
        // put your code here
        ?>
    </body>
</html>
