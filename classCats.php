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
            $keyMat = explodeCats($keyWords);
            
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
    $code = preg_replace("/[^A-Za-z0-9 \-]/", '', $code);
    //$code = substr_replace( "'" , "''" , $code  );
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
function addCategory($oldmysqli , $catID , $catCode , $catName)
{
    $catNameFixed = str_replace("'","''",$catName);     //  double a single quote for correct SQL syntax
    
    $sql = "INSERT INTO catNames "
             .  "(  catID, catCode, catName "
             .  ") VALUES "
             .  "( " . $catID 
             .  ", '" . $catCode . "'"
             .  ", '" . $catNameFixed . "'"
             .  ")";
     
    echo '<hr />function:addCategory Query = ' . $sql;

    $mysqli = new mysqli(db_server, db_uid_insert, db_pwd_insert, db_db);
    
    if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }
    if ($mysqli->errno != 0){
        echo '<br />Error #' . $mysqli->errno . ' has been detected!!!!';
        echo '<br />Connect Error ' . $mysqli->connect_error;
        echo '<br />Last Error ' . $mysqli->error;
        echo '<br />Error List ' . $mysqli->error_list;
        echo '<br />Last Error ' . $mysqli->error;
        
    }
    $result = $mysqli->query($sql);
        
//    if ($mysqli->error) {
//        try {    
//            throw new Exception("MySQL error $mysqli->error <br> Query:<br> $query", $msqli->errno);    
//        } 
//        catch(Exception $e ) {
//                    echo "Error No: ".$e->getCode(). " - ". $e->getMessage() . "<br >";
//                    echo nl2br($e->getTraceAsString());
//        }
//    }
//    if($result) {
//        //if the query ran ok, do stuff
//        $numberOfRows = $result->affected_rows;        
//        echo '<br />#of  rows inserted = ' . $numberOfRows;
//    } else {
//        echo "<br />Something has gone wrong! " . $mysqli->errorno;
//        //if it didn't, echo the error message
//    }
    //if ($result->num_rows == 1) {
    //if ($result->affected_rows == 1) {
    if ($mysqli->errno == 0) {
        echo "<br />Record was inserted successfully.";
        $numberOfRows = $mysqli->affected_rows;
        echo '<br />affected_rows = ' . $numberOfRows;
        //$result->free();
     } else {
        echo "<br />ERROR: Could not execute " . $sql;     // ."<br />" . mysqli_error($link);
        echo '<br />Error #' . $mysqli->errno . ' has been detected!!!!';
        echo '<br />Last Error ' . $mysqli->error;
        echo '<br />Error List ' . $mysqli->error_list;
        echo '<br />Last Error ' . $mysqli->error;
     }
    $mysqli->close();
    return $numberOfRows;
}   //  end of insertCategory

function getCatIDByCode($mysqli , $catCode)
{
    $query = "SELECT catID FROM catNames WHERE catCode = '" . $catCode . "';";
    
    echo '<br />getCatIDByCode query=' . $query;
    
    $result = $mysqli->query($query);
    
//    if ( $result->num_rows == 0 ) {
//        $catID = 0;
//    }
//    else {
        while ($r = $result->fetch_assoc()){
            $catID = $r["catID"];
        }
//    }
    echo '<br />query result num_rows =' . $result->num_rows;
    echo '<br />query result =' . $catID;
    echo '<br />returning ' . $catID;
    
    return $catID;
}
function getNextCatID($mysqli)
{
    echo '<hr />function: getNextCatID()';
    
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
function getCountsByCategory()
{
    //echo '<hr>classCats->getCountsByCategory()';
    $report = "";
    $query  = $this->queryCountsByCategory();
    //echo '<br />classCats->getCountsByCategory()->query=' . $query;
    
    mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
    $mysqli = new mysqli(db_server, db_uid_select, db_pwd_select, db_db);

    if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }
    $result = $mysqli->query($query);
        
    if ($mysqli->error) {
        try {    
            throw new Exception("MySQL error $mysqli->error <br> Query:<br> $query", $msqli->errno);    
        } catch(Exception $e ) {
                echo "Error No: ".$e->getCode(). " - ". $e->getMessage() . "<br >";
                echo nl2br($e->getTraceAsString());
            }
    }
   
    $report = '<table class="tftable" border="1">';
    $report .= '<th>Category Code</th>';
    $report .= '<th>#of Linked Items</th>';
    $report .= '</tr>';

    while ($r = $result->fetch_assoc()){
            $categoryName = $r["catName"];
            $categoryCount = $r["kount"];
            $report .= '<tr>';
            $report .= '<td>' . $categoryName  . '</td>';
            $report .= '<td>' . $categoryCount . '</td>';
            $report .= '</tr>';
        }
        $report .= "</table>";        
        
    $result->free();
    $mysqli->close();
    return $report;
}
function getCategoryCheckboxes()
{
    $report = "";
    $query  = $this->queryCheckboxesByCategory();
    //echo '<br />classCats->getCountsByCategory()->query=' . $query;
    
    mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
    $mysqli = new mysqli(db_server, db_uid_select, db_pwd_select, db_db);

    if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }
    $result = $mysqli->query($query);
        
    if ($mysqli->error) {
        try {    
            throw new Exception("MySQL error $mysqli->error <br> Query:<br> $query", $msqli->errno);    
        } catch(Exception $e ) {
                echo "Error No: ".$e->getCode(). " - ". $e->getMessage() . "<br >";
                echo nl2br($e->getTraceAsString());
            }
    }
   
    /*
        <td colspan='1'>
            <input type='checkbox' name='kw01' id='kw01' value='wicca'>Wicca<br />
            <input type='checkbox' name='kw02' id='kw02' value='nordic'>Nordic<br />
        </td>
    */
    $colCount = 4;
    $resultCount = $result->num_rows;
    $rowCount = ceil($resultCount / $colCount);
    
    $col = 1;
    $cnt = 0;
    while ($r = $result->fetch_assoc()){
        $cnt++;
        $categoryCode = $r["catCode"];
        $categoryName = $r["catName"];
        $categoryCount = $r["kount"];
        
        if ($col == 1 ){
            $report .= '<tr>';      //  if 1st column, start the table row
        }

        $report .= '<td>';
        $report .= "<input type='checkbox' name='chkCat[]'";
        $report .= " value='" . $categoryCode . "'>" . $categoryName;
        $report .= "&nbsp;(" . $categoryCount . ")";
        $report .= "</td>";
        $col++;

        if ($col == 5){
            $report .= "</tr>";
            $col = 1;
        }
    }
    if ($col != 1){
        $report .= "</tr>";
    }
        
    $result->free();
    $mysqli->close();
    return $report;
}
function queryCountsByCategory()
{
//    echo '<br />classCats->queryCountsByCategory()';
    
    $sql = ""
        .   "SELECT  c.catName , COUNT(*) AS kount"
        .   "  FROM        books      AS b" 
        .   " INNER JOIN   booksXcats AS x ON b.ItemID = x.itemID"
        .   " INNER JOIN   catNames   AS c ON x.catID  = c.catID"
        .   " GROUP BY c.catName"
        .   " ORDER BY 1";
    
//    echo '<br />' . $sql;
    return $sql;
}
function queryCheckboxesByCategory()
{
//    echo '<br />classCats->queryCountsByCategory()';
    
    $sql = ""
        .   "SELECT  c.catCode , c.catName , COUNT(*) AS kount"
        .   "  FROM        books      AS b" 
        .   " INNER JOIN   booksXcats AS x ON b.ItemID = x.itemID"
        .   " INNER JOIN   catNames   AS c ON x.catID  = c.catID"
        .   " GROUP BY c.catCode , c.catName"
        .   " ORDER BY 2";
    
//    echo '<br />' . $sql;
    return $sql;
}
    
}   //  end of classCats
