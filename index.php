<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>CUUPS Library Index Page</title>
        <link rel='stylesheet' type='text/css' href='biblioUU.css'>
        <style type="text/css" >
            table { 
                background: url("../images/triskelion_300x264.png") no-repeat; 
                display: block;
                margin-left: auto;
                margin-right: auto;
            }
            
            a.button {
                -webkit-appearance: button;
                -moz-appearance: button;
                appearance: button;

                text-decoration: none;
                color: initial;
                }
        </style>
    </head>
    <body>
        <h2>Unitarian Universalist Congregation of Frederick</h2>
        <h1>CUUPS Library Project</h1>
        <br />
        <table border="1" width="350" height="275">
            <tr>
                <td>
                    Search Forums Policies
                </td>
            </tr>
            <tr>
                <td>
                    <button name="btnSearch">Search</button>
                    <button name="btnSearch">Forums</button>
                    <button name="btnSearch">Policy</button>
                </td>
            </tr>
            <tr>
                <td>
                    <button name="btnSearch">Search</button>
                    <button name="btnSearch">Forums</button>
                    <button name="btnSearch">Policy</button>
                </td>
            </tr>            
            <tr>
                <td>
                    <a href="search.php" button name="btnSearch">Search</button>
                    <button name="btnPolicy"><a href="../press/index.php" button name="btnPolicy">Policy</button>
                    <a href="../forum/index.php" button name="btnForum">Forum</button>
                </td>
            </tr>
        </table>
        <br />
        <img alt="test" id="img001" src="../images/triskelion_300x264.png">
        <br />
        <hr />
        <?php
        // put your code here
        phpinfo();
        ?>
    </body>
</html>
