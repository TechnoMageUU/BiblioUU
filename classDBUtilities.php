<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of classDBUtilities
 *
 * @author Alvin
 */

class classDBUtilities extends classDB {
    //put your code here
   
   function __construct()
   {
   }    
    
function splitCategories(){
    
   $querySelect = "SELECT ItemID, BookcaseID, ShelfID, ISBN, Title, SubTitle, ItemType"
           .    ", Category, Keywords, AuthorName, UUCategory"
           .    ", LOCNumber, DDSNumber, Description, Notes"
           .    ", AddedDate, AddedBy, ModifyDate, ModifyBy"
           .    " FROM books";

        mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
        $mysqli = new mysqli($db_server, $db_uid_maint, $db_pwd_maint, $db_db);

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
   
        while ($r = $res->fetch_assoc()){
            
            $itemId = $r["ItemID"];
            $rows = deleteCategoriesForAnItem($myqli , $itemID);
            
            $category = $r["Category"];
            $keyWords = $r["Keywords"];
          
            $catMat = explodeCats($category);
            $keyMat = explodeCates($keyWords);
            
            foreach ($catMat as $kitten)
            {
                $catCode = createCategoryCode($kitten);
                $catName = createCategoryName($kitten);
                $rows = deleteCategoryByCode($mysqli , $catName);
                $catID = insertCategory($mysqli , $catCode , $catName);
                $rows = linkItemToCategory($mysqli , $itemID , $catID);
            }
            foreach ($keyMat as $kitten)
            {
                $catCode = createCategoryCode($kitten);
                $catName = createCategoryName($kitten);
                $rows = deleteCategoryByCode($mysqli , $catName);
                $catID = insertCategory($mysqli , $catCode , $catName);
                $rows = linkItemToCategory($mysqli , $itemID , $catID);
            }
                        
        }
        
        $res->free();
        $mysqli->close();
        return $result;
}   //  end of splitCategories   
  
function explodeCats($conCats)
{
    $manyCats = explode(",", $conCats);
    return $manyCats;
}   //  end of parseCats
function createCategoryCode($catName)
{
    /*
     *  Remove all characters except A-Z and numbers
     */
    $code = preg_replace("/[^A-Za-z0-9 ]/", '', $string);
    $code = strtoupper($code);
    return $code;
}
function createCategoryName($catName)
{
    $code = trim($catName);
    return $code;
}
function deleteCategoriesForAnItem($mysqli , $itemID)
{   
   /*   Attempt MySQL server connection. Assuming you are running MySQL
    *   server with default setting (user 'root' with no password) 
    */
    $sql = "DELETE FROM booksXcats WHERE itemID = " . $itemID;
    $res = $mysqli->query($sql);    

    if ($mysqli->error) {
                try {    
                    throw new Exception("MySQL error $mysqli->error <br> Query:<br> $query", $msqli->errno);    
                } catch(Exception $e ) {
                    echo "Error No: ".$e->getCode(). " - ". $e->getMessage() . "<br >";
                    echo nl2br($e->getTraceAsString());
                }
            }

    $numberOfRows = $mysqli->affected_rows;
    return $numberOfRows;
}   //  end deleteCategoriesForAnItem    
function deleteCategoryByCode($mysqli , $codeName)
{   
        /*   Attempt MySQL server connection. Assuming you are running MySQL
         *   server with default setting (user 'root' with no password) 
         */
     $link = mysqli_connect($db_server. $db_uid_delete, $db_pwd_delete, $db_db);

     // Check connection
     if($link === false){
         die("ERROR: Could not connect. " . mysqli_connect_error());
     }
     /*
      *  Attempt delete query execution
      */
     $sql = "DELETE FROM catNames WHERE catCode = " . $codeName;

     if(mysqli_query($link, $sql)){
         echo "Records were deleted successfully.";
     } else{
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
     }
     // Close connection
     mysqli_close($link);
}   //  end deleteCategoryByCode
function insertCategory($mysqli , $catCode , $catName)
{
        /*   Attempt MySQL server connection. Assuming you are running MySQL
         *   server with default setting (user 'root' with no password) 
         */
     $link = mysqli_connect($db_server. $db_uid_insert, $db_pwd_insert, $db_db);

     // Check connection
     if($link === false){
         die("ERROR: Could not connect. " . mysqli_connect_error());
     }

     $sql = "INSERT INTO catNames "
             .  "(  catID, catCode, catName "
             .  ") VALUES "
             .  "( " . $catID 
             .  ", " . $catCode
             .  ", " . $catName
             .  ")";

    if(mysqli_query($link, $sql)){
         echo "Record was inserted successfully.";
     } else{
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
     }
       $catID = $mysqli->insert_id;
     // Close connection
     mysqli_close($link);
        
     return $catID;
}   //  end of insertCategory

function countsByCategory()
{

    $sql = "SELECT c.CatName, COUNT(*) AS kount"
        .   " FROM              catNames        AS	c"
        .   " LEFT OUTER    JOIN   booksXcats   AS	x   ON	c.CatID = x.CatID"
        .   " INNER         JOIN   books        AS	b   ON  x.ItemID = b.ItemID" 
        .   " GROUP BY c.CatName"
        .   " ORDER BY c.CatName";
}

function resultDiagnostics($mysqli)
{
        $result = "<br /><hr />connect_error<br />";
        $result .= $mysqli->connect_error;
        $result .= "<br /><hr />";

        $result .= "<hr />client info<br />";
        $result .= $mysqli->client_info;
        $result .= "<br />";    

        $result .= "<hr />client version<br />";
        $result .= $mysqli->client_version;
        $result .= "<br />";   
        
        $result .= "<hr />protocol version<br />";
        $result .= $mysqli->protocol_version;
        $result .= "<br />";              
            
        $result .= "<hr />type of connection<br />";
        $result .= $mysqli->host_info;
        $result .= "<br />";                

        $result .= "<hr />info about query<br />";
        $result .= $mysqli->info;
        $result .= "<br />";              

        $result .= "<hr />warning count<br />";
        $result .= $mysqli->warning_count;
        $result .= "<br />";        

        $result .= "<hr />#of affected rows<br />";
        $result .= $mysqli->affected_rows;
        $result .= "<br />";  
        $numberOfRows = $mysqli->affected_rows;
        
        $result .= "<hr />#of fields returned<br />";
        $result .= $mysqli->field_count;
        $result .= "<br />";   
        
        return $result;
}   //  end of resultDiagnostics
        
        
}   //  end of classDBUtilities

?>
