<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Library Search</title>
        <link rel='stylesheet' type='text/css' href='biblioUU.css'>
    </head>
    <body>
        <h2>Unitarian Universalist Congregation of Frederick</h2>
        <h1>Library Search</h1>
        <br />
        <form name='formSearch' method='post' action="results.php">
        <table border="1">
            <tr>
                <td colspan='2' style='text-align: center; vertical-align: middle;'>
                    <div class='button' id='divSearchButton'>
                          <a href="results.php" button name="btnResults">Go Find Stuff!</button>
                    </div>
                    <br />
                    <input type='submit' name='submitSearch' value='Search'>
                </td>
            </tr>            
            <tr>
                <td>
                    Title<br />
                </td>
                <td>
                    <input type='text' name='searchTitle' >
                </td>
            <tr>
                <td colspan='2'>
                    <div class='instruct' id='instructTitle'>
                        Enter all or part of an item&apos;s title; can be left blank.
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    Author<br />
                </td>
                <td>
                    <input type='text' name='searchAuthor'>
                </td>
            <tr>
                <td colspan='2'>
                    <div class='instruct' id='instructTitle'>
                        Enter all or part of the author&apos;s name; can be left blank.
                    </div>
                </td>
            </tr>            
            <tr>
                <td colspan='2'>
                    <div class='instruct' id='instructTitle'>
                        The default is to search all item types. To restrict your search to specific types, adjust these checkboxes. 
                    </div>
                </td>
            </tr>  
            <tr>
                <td colspan='1'>
                        <input type='checkbox' name='chkBooks'  id='chkBooks'   value='Books' checked>Books<br />
                        <input type='checkbox' name='chkTarot'  id='chkTartot'  value='Tarot' checked>Tarot Cards<br />
                        <input type='checkbox' name='chkDivine' id='chkDivine'  value='Divine' checked>Divination Tools <i>(other than Tarot)</i><br />
                        <input type='checkbox' name='chkDVD'    id='chkDVD'     value='DVD' checked>DVD<br />
                </td>
            </tr>              
            <tr>
                <td colspan='2'>
                    <div class='instruct' id='instructTitle'>
                        To search by keyword or category, select one or more from this list. Can be left blank.
                    </div>
                </td>
            </tr>  
            <tr>
                <td colspan='1'>
                        <input type='checkbox' name='kw01' id='kw01' value='wicca'>Wicca<br />
                        <input type='checkbox' name='kw02' id='kw02' value='nordic'>Nordic<br />
                </td>
            </tr>  
        </table>
        </form>
        <br />
        <?php
        // put your code here
        ?>
    </body>
</html>
