<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Item Count by Category</title>
        <link rel='stylesheet' type='text/css' href='biblioUU.css'>        
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
            $searchResults = $cats->getCountsByCategory();
            echo '<br />' . $searchResults;
        ?>
    </body>
</html>
