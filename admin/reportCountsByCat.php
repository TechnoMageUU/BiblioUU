<!DOCTYPE html>
<?php
    include '../library/classDB.php';
    include '../library/classDBUtilities.php';
    include '../library/classCats.php';
    $cats = new classCats();
    $searchResults = $cats->getCountsByCategory();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Item Count by Category</title>
        <?php
        require 'include/incScripts.php';
        ?>   
    </head>
    <body>
        <h1>Item Count by Category</h1>
        <p>
            This report shows the number of items in each Category.
        </p>
        <hr />
        <?php
            echo '<br />' . $searchResults;
        ?>
    </body>
</html>
