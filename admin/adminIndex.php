<!DOCTYPE html>
<!--
Copyright 2017 Frederick CUPPS
-->
<?php
    // put your code here
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home Page for Administrators</title>
        <?php
            require '../include/incScripts.php';
        ?>        
    </head>
    <body>
        <h1>Administrator's Index</h1>
        <hr />
        <h2>Library Maintenance</h2>
        <ul>
            <li>
                <a href="adminEditItem.php">Edit the Description and Attributes of a Library Item</a>
            </li>
            <li>
                <a href="adminEditCatDesc.php">Edit Category Descriptions</a>
            </li>
        </ul> 
        <hr />
        <h2>Reports</h2>
        <ul>
            <li><a href="reportCountsByCat.php">Display Counts by Category</a></li>
            <li><a href="reportCatsAndDescs.php">Display Categories and their Descriptions</a></li>
            <li>Display the Inventory of a Shelf</li>
        </ul>
        <hr />
        <h2>User Maintenance</h2>
        <ul>
            <li>
                <a href="adminRegisterUser.php">
                    Confirm Registration of a New User Registration
                </a>
            </li>
            <li>
                <a href="adminRegisterUser.php">
                    Confirm Registration of a New User Registration
                </a>
            </li>
            <li>
                <a href="adminRegisterUser.php">
                    Review a User&apost;s Profile
                </a>
            </li>
            <li>
                <a href="adminRegisterUser.php">
                    Edit a User&apost;s Profile
                </a>
            </li>                    
        </ul>
        <hr />
        <h2>TechnoMage</h2>
        <ul>
            <li><a href="techCatPreview.php">Preview Categories Index</a></li>
            <li><a href="techCatBuild.php">Build Categories and Assign to Items</a></li>
        </ul>
    </body>
</html>

