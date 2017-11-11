<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Item Count by Category</title>
    </head>
    <body>
        <h1>Item Count by Category</h1>
        <p>
            This report shows the number of items in each Category.
        </p>
        <hr />
        <?php
            include './classDB.php';
            include './classDBUtilities.php';
            include './classCats.php';
            $cats = new classCats();
            
           // echo '<hr />Preparing to call queryCategories from techCatBuild';
            
            $searchResults = $cats->getCountsByCategory();
            echo '<br />' . $searchResults;
        ?>
    </body>
</html>
