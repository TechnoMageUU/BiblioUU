<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
//  setup db parms

$db_server = "mysql.bibliouu.online";
$db_userid = "bookmaster";
$db_pwd = "b00kMast3r!";
$db_db = "bibliouu_books";

//  this is the skeleton of the search query. 
//  we'll use the parms from the search form to modify it.

$query_select = "SELECT * ";
$query_from = " FROM books ";
$query_where = " WHERE ItemID > 0 ";
$query_order = " ORDER BY Title ";
$query_limit = " LIMIT 20 ";

//  Get search parameters from the form
$search_Title = $_POST['searchTitle'];
$search_Author = $_POST['searchAuthor'];
//$search_Types = $_POST[''];
//$search_Cats = $_POST[''];
//$search_UU6 = $_POST[''];

$search_Title  = trim($search_Title);
$search_Author = trim($search_Author);

echo "<hr />search Title=" . $search_Title ."<br />";
echo "<hr />search Author=" . $search_Author ."<br />";


if ($search_Title <> "")
{
    $query_where .= " AND (   ( Title    LIKE '%" . $search_Title . "%' ) "
                 .  "      OR ( SubTitle LIKE '%" . $search_Title . "%' ) "
                 .  "     ) ";
}
if ($search_Author <> "")
{
    $query_where .= " AND AuthorName LIKE '%" . $search_Author . "%' ";
}

echo "<hr />query=" . $query_where ."<br />";


?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Search Results</title>
        <link rel='stylesheet' type='text/css' href='biblioUU.css'>        
    </head>
    <body>
        <h2>Unitarian Universalist Congregation of Frederick</h2>
        <h1>Search Results</h1>
        <br />
        <?php
        mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
        
        $mysqli = new mysqli($db_server, $db_userid, $db_pwd, $db_db);
//        $query = "SELECT * FROM books ORDER BY Title LIMIT 10";
        $query =    $query_select 
                .   $query_from 
                .   $query_where
                .   $query_order 
                .   $query_limit;


        echo "<hr />query=" . $query ."<br />";
        
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        }        
        $res = $mysqli->query($query);
        
        if ($mysqli->error) {
                try {    
                    throw new Exception("MySQL error $mysqli->error <br> Query:<br> $query", $msqli->errno);    
                } catch(Exception $e ) {
                    echo "Error No: ".$e->getCode(). " - ". $e->getMessage() . "<br >";
                    echo nl2br($e->getTraceAsString());
                }
            }
        
        echo '<table class="tftable" border="1">';
        echo '<tr>';
        echo '<th>Title</th></th>';
        echo '<th>Author</th>';
        echo '<th>Item Type</th>';
        echo '<th>Categories</th>';
        echo '<th>UU Source</th>';
        echo '<th>Description</th>';
        echo '<th>Notes</th>';
        echo '</tr>';
        
        while ($r = $res->fetch_assoc()){
            echo '<tr><td>';
            
            $t = $r["Title"].'<br />'.$r["SubTitle"];
            $t = str_replace("'", "$quot;" , $t);
            echo $t;
            //echo $r["Title"].'<br />'.$r["SubTitle"];
            echo '</td><td>';
            echo $r["AuthorName"];
            echo '</td><td>';
            echo $r["ItemType"];            
            echo '</td><td>';
            echo $r["Keywords"];
            echo '</td><td>';
            echo $r["UUCategory"];
            echo '</td><td>';
            echo $r["Description"];
            echo '</td><td>';
            echo $r["Notes"];
            echo '</td></tr>';
        }
        
        echo "</table>";        


        echo "<br /><hr />query is<br />";
        echo $query;
        echo "<br /><hr />";

        echo "<br /><hr />connect_error<br />";
        echo $mysqli->connect_error;
        echo "<br /><hr />";

        echo "<hr />client info<br />";
        echo $mysqli->client_info;
        echo "<br />";    

        echo "<hr />client version<br />";
        echo $mysqli->client_version;
        echo "<br />";   
        
        echo "<hr />protocol version<br />";
        echo $mysqli->protocol_version;
        echo "<br />";              
            
        echo "<hr />type of connection<br />";
        echo $mysqli->host_info;
        echo "<br />";                

        echo "<hr />info about query<br />";
        echo $mysqli->info;
        echo "<br />";              

        echo "<hr />warning count<br />";
        echo $mysqli->warning_count;
        echo "<br />";        

        echo "<hr />#of affected rows<br />";
        echo $mysqli->affected_rows;
        echo "<br />";  
        $numberOfRows = $mysqli->affected_rows;
        
        echo "<hr />#of fields returned<br />";
        echo $mysqli->field_count;
        echo "<br />";    
        
        echo "<hr />fee and close<br />";
               
        $res->free();
        $mysqli->close();
        echo "<br /><hr />end of php code";
        ?>
    </body>
</html>
