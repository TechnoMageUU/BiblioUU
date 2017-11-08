<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//include './classDBUtilities.php';
/**
 * Description of classCats
 *
 * @author Alvin
 */
class classCats extends classDB {
   
   function __construct()
   {
        parent::__construct();
        $this->util = new classDBUtilities();
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
    $code = preg_replace("/[^A-Za-z0-9]/", '', $catName);
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
function addCategory($mysqli , $catID , $catCode , $catName)
{
//     $link = mysqli_connect($db_server. $db_uid_insert, $db_pwd_insert, $db_db);
//     // Check connection
//     if($link === false){
//         die("ERROR: Could not connect. " . mysqli_connect_error());
//     }
     $sql = "INSERT INTO catNames "
             .  "(  catID, catCode, catName "
             .  ") VALUES "
             .  "( " . $catID 
             .  ", " . $catCode
             .  ", " . $catName
             .  ")";
     
     echo 'Query = ' . $sql;

    if(mysqli_query($link, $sql)){
         echo "Record was inserted successfully.";
         $numberOfRows = $mysqli->affected_rows;
     } else{
         echo "ERROR: Could not to execute $sql. " . mysqli_error($link);
     }
       //$catID = $mysqli->insert_id;
     return $numberOfRows;
}   //  end of insertCategory

function getCatIDByCode($mysqli , $catCode)
{
    $query = "SELECT catID FROM catNames WHERE catCode = '" . $catCode . "';";
    
    echo '<br />getCatIDByCode query=' . $query;
    
    $result = $mysqli->query($query);
    
    if ( $result->num_rows == 0 ) {
        $catID = 0;
    }
    else {
        while ($r = $result->fetch_assoc()){
            $catID = $r["catID"];
        }
    }
    echo '<br />query result =' . $catID;
    echo '<br />returning ' . $catID;
    
    return $catID;
}
function getNextCatID($mysqli)
{
    $query = "SELECT MAX(catID) AS nxt FROM catNames";
    echo '<br />getNextCatID query = ' . $query;
   
    $result = $mysqli->query($query);

    echo '<br />#of Rows = ' . $result->num_rows;
    
    if ( $result->num_rows == 0 ) {
        $catID = 1;
    }
    else {
        while ($r = $result->fetch_assoc()){
            $catID = $r["nxt"] + 1;
        }
    }
    echo '<br />query result =' . $catID;
    echo '<br />returning ' . $catID;
    return $catID;
}
  
  
function countsByCategory()
{

    $sql = "SELECT c.CatName, COUNT(*) AS kount"
        .   " FROM              catNames        AS	c"
        .   " LEFT OUTER    JOIN   booksXcats   AS	x   ON	c.CatID = x.CatID"
        .   " INNER         JOIN   books        AS	b   ON  x.ItemID = b.ItemID" 
        .   " GROUP BY c.CatName"
        .   " ORDER BY c.CatName";
}

    
}   //  end of classCats
