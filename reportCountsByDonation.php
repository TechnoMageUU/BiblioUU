<!DOCTYPE html>
<?php
    require 'library/classDB.php';
    require 'library/classDBUtilities.php';
    require 'library/classDonations.php';
    $don = new classDonations();
    $reportResults = $don-> getCountsByDonationSource();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Item Count by Donation Source</title>
        <?php
        require 'library/incScripts.php';
        ?>   
    </head>
    <body>
        <h1>Item Count by Donation Source</h1>
        <p>
            This report shows the number of items donated by each source.
        </p>
        <hr />
        <?php
            echo '<br />' . $reportResults;
        ?>
    </body>
</html>
