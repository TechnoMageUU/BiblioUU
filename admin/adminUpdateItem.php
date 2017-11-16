<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Item to Library</title>
    <?php
        include '/library/incScripts.php';
    ?>
</head>
<body>
        <h2>Unitarian Universalist Congregation of Frederick</h2>
        <h1>Add New Item to Library</h1>
        <br />
        <form name='formAdd' method='post' action="results.php">
        <table border="1">
            <tr>
                <td colspan='2' style='text-align: center; vertical-align: middle;'>
                    <div class='button' id='divSearchButton'>
                          <a href="results.php" button name="btnResults">Go Find Stuff!</button>
                    </div>
                    <br />
                    <input type='submit' name='submitAdd' value='Add'>
                </td>
            </tr>            
            <tr>
                <td>
                    Title<br />
                </td>
                <td>
                    <input type='text' name='addTitle' >
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
                    <input type='text' name='addAuthor'>
                </td>
            <tr>
                <td colspan='2'>
                    <div class='instruct' id='instructTitle'>
                        Enter author name in "firstname lastname format. <br />
                        If there are multiple authors, separate with commas, for example, "Johhn Smith, Jane Doe".<br />
                        If two authors have the same last name, for example "Ivan & Miranda Wu", please enter the names as "Ivan Wu, Miranda Wu"<br />
                        Titles (Such as "Ph.D." or "Ed.") are allowed. Commas are used to separate names, so their placement is important.<br />
                    </div>
                </td>
            </tr>            
            <tr>
                <td colspan='2'>
                    <div class='instruct' id='instructTitle'>
                        The default is to search all item types. To restrict your search to specific types, adjust these checkboxes. ]
                        If more item types are needed, please contact the TechnoMages.
                    </div>
                </td>
            </tr>  
            <tr>
                <td colspan='1'>
                        <input type='checkbox' name='chkBooks'  id='chkBooks'   value='Books' checked>Books<br />
                        <input type='checkbox' name='chkTarot'  id='chkTartot'  value='Tarot' >Tarot Cards<br />
                        <input type='checkbox' name='chkDivine' id='chkDivine'  value='Divine'>Divination Tools <i>(other than Tarot)</i><br />
                        <input type='checkbox' name='chkDVD'    id='chkDVD'     value='DVD' >DVD<br />
                </td>
            </tr>              
            <tr>
                <td colspan='2'>
                    <div class='instruct' id='instructTitle'>
                        The checkboxes show the Categories that have been defined thus far.
                        The number in parentheses after the Category Name is the number of items linked to that category in the database.
                        If more Categories are needed, type them into the text box. 
                        Use commas to separate multiple new categories, for example "Northern Lights, Solar Flares".
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
</body>
</html>

