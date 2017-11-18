<!DOCTYPE html>
<?php
    require 'library/classDB.php';
    require 'library/classDBUtilities.php';
    include 'library/classBookcase.php';
    $bookcase = new classBookcase();
    $searchResultsBookcase = $bookcase->getCountsByBookcase();
    $searchResultsShelf = $bookcase->getCountsByBookcaseAndShelf();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Item Count by Bookcase and Shelf</title>
        <?php
        require 'library/incScripts.php';
        ?>   
    </head>
    <body>
        <h1>Item Count by Bookcase and Shelf</h1>
        <p>
            This report shows the number of items in each Bookcase and Shelf.
        </p>
        <hr />
        <?php
            echo '<br />' . $searchResultsBookcase;
        ?>
        <hr />
        <?php
            echo '<br />' . $searchResultsShelf;
        ?>        
    </body>
</html>
