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
            require 'library/incScripts.php';
        ?>        
    </head>
    <body>
        <table>
            <tr>
                <td style='text-align: center; vertical-align: middle;'>
                    <a href="index.php">
                        <img src="images/libraryHome.png" width="100" height="128" alt='image of a cottage'>
                        <br />
                        Home
                    </a>
                </td>
                <td style='text-align: center;vertical-align: middle;'>
                    <h2>Unitarian Universalist Congregation of Frederick</h2>
                    <h1>Administrator's Index</h1>
                </td>
            </tr>            
        </table>
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
            <li><a href="reportCountsByUUSource.php">Display Counts by UU Source</a></li>
            <li><a href="reportCountsByDonation.php">Display Counts by Donation Source</a></li>
            <li><a href="reportCatsAndDescs.php">Display Categories and their Descriptions</a></li>
            <li><a href="reportCountsByBookcase.php">Display Counts by Bookcase and Shelf</a></li>
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
    </body>
</html>

