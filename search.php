<!DOCTYPE html>
<?php
    include 'library/classDB.php';
    include 'library/classDBUtilities.php';
    include 'library/classDBBooks.php';
    include 'library/classCats.php';
    $books = new classDBBooks();
    $booksCount = $books->getItemCount();
    $cats = new classCats();
    $catsList = $cats->getCategoryCheckboxes();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Library Search</title>
        <?php
            include 'include/incScripts.php';
        ?>        
    </head>
    <body>
        <table border="1">
            <tr>
                <td style='text-align: center; vertical-align: middle;'>
                    <a href="index.php">
                        <img src="images/libraryHome.png" width="100" height="80"><br />
                        Home
                    </a>
                </td>
                <td style='text-align: center;vertical-align: middle;'>
                    <h2>Unitarian Universalist Congregation of Frederick</h2>
                    <h1>Library Search</h1>
                </td>
            </tr>            
        </table>
        <br />
        <form name='formSearch' method='post' action="results.php">
        <table border="0">
            <tr>
                <td colspan="2">
                <?php
                    echo "The library currently contains " .  $booksCount . " items.";
                ?>                    
                    <br />
                    Search results are restricted to a maximum of 200 rows.
                </td>
                <td style='text-align: center; vertical-align: middle;'>
                    <div class='button' id='divSearchButton'>
                          <a href="results.php" button name="btnResults">Go Find Stuff!</button>
                    </div>
                    <br />
                    <input type='submit' name='submitSearch' value='Search'>
                </td>
            </tr>
            <tr><td colspan="4"><hr /></td></tr>
            <tr>
                <td colspan='4'>
                    <div class='instruct' id='instructTitle'>
                        Enter all or part of an item&apos;s title; can be left blank.
                    </div>
                </td>
            </tr>            
            <tr>
                <td style='text-align:right;'>
                    Title<br />
                </td>
                <td>
                    <input type='text' name='searchTitle' >
                </td>
            </tr>
            <tr><td colspan="4"><hr /></td></tr>            
            <tr>
                <td colspan='4'>
                    <div class='instruct' id='instructTitle'>
                        Enter all or part of an author&apos;s name; can be left blank.
                    </div>
                </td>            
            <tr>
                <td style='text-align:right;'>
                    Author<br />
                </td>
                <td>
                    <input type='text' name='searchAuthor'>
                </td>
            <tr>
            </tr>
            <tr><td colspan="4"><hr /></td></tr>            
            <tr>
                <td colspan='4'>
                    <div class='instruct' id='instructTitle'>
                        The default is to search all item types. 
                        To restrict your search to specific types, adjust these checkboxes. 
                    </div>
                </td>
            </tr>  
            <tr>
                <td colspan='1'>
                    <input type='checkbox' name='chkType[]' value='Book'  checked>Books<br />
                    <input type='checkbox' name='chkType[]' value='Audio' checked>Audio Books<br />
                    <input type='checkbox' name='chkType[]' value='DVD'   checked>DVD
                </td>
                <td colspan='1'>
                    <input type='checkbox' name='chkType[]' value='Tarot Cards'  checked>Tarot Cards<br />
                    <input type='checkbox' name='chkType[]' value='Divine' checked>Divination Tools <i>(other than Tarot)</i><br />
                </td>
            </tr>
            <tr><td colspan="4"><hr /></td></tr>            
            <tr>
                <td colspan='4'>
                    <div class='instruct' id='instructTitle'>
                        To restrict search results by category, select from this list. 
                        The number in parenthesis is the number of items in the library
                        that have been tagged with that category. 
                    </div>
                </td>
            </tr>  
            <tr>
                <?php
                    echo $catsList;
                ?>
            </tr> 
        </table>
        </form>
        <hr />
        <p>
            Add accordion here which can expand to show detailed instructions. 
        </p>
    </body>
</html>
