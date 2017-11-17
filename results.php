<!DOCTYPE html>
<?php
    include 'library/classDB.php';
    include 'library/classDBUtilities.php';
    include 'library/classDBBooks.php';
    include 'library/classCats.php';
    
//  Get search parameters from the form
$search_Title = trim($_POST['searchTitle']);
$search_Author = trim($_POST['searchAuthor']);

$search_Types = "";
foreach($_POST['chkType'] as $checkbox){
    echo $checkbox . ' ';
    $search_Types .= "'" . $checkbox . "',";
}
$search_Types = rtrim($search_Types , ",");
echo "<hr />Search Types<br />" . $search_Types . "<hr />";

$search_Cats = "";
foreach($_POST['chkCat'] as $checkbox){
    echo $checkbox . ' ';
    $search_Cats .= "'" . $checkbox . "',";
}
$search_Cats = rtrim($search_Cats , ",");
echo "<hr />Search Cats<br />" . $search_Cats;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Search Results</title>
        <?php
            require 'library/incScripts.php';
        ?>
    </head>
    <body>
        <table border="1">
            <tr>
                <td style='text-align: center; vertical-align: middle;'>
                    <a href="index.php">
                        <img src="images/libraryHome.png" width="100" height="128"><br />
                        Home
                    </a>
                </td>
                <td style='text-align: center; vertical-align: middle;'>
                    <a href="search.php">
                        <img src="images/librarySearch.png" width="100" height="128"><br />
                        Search
                    </a>
                </td>                
                <td style='text-align: center;vertical-align: middle;'>
                    <h2>Unitarian Universalist Congregation of Frederick</h2>
                    <h1>Search Results</h1>
                </td>
            </tr>            
        </table>
        <br />        
        <?php
            $q = new classDBBooks();
            $searchResults = $q->querySearchResults($search_Title, $search_Author , $search_Types , $search_Cats);
            echo '<br />' . $searchResults;
        ?>
    </body>
</html>
