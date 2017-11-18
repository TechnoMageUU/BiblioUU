<?php
/**
 * Description of classBooksDB
 *
 * @author Alvin
 */
class classDBBooks extends classDB {

    public $query_select;
    public $query_from;
    public $query_where;
    public $query_order;
    public $query_limit;
    
   function __construct()
   {
       parent::__construct();

          $this->util = new classDBUtilities();
          $this->cats = new classCats();
       
    $this->query_select = "SELECT * ";
    $this->query_from = " FROM books ";
    $this->query_where = " WHERE ItemID > 0 ";
    $this->query_order = " ORDER BY Title ";
    $this->query_limit = " LIMIT 20 ";

   }
   function read()
   {
       return "";
   }
   function update()
   {
       return "";
   }   
    function add()
   {
       return "";
   }
    function getItemCount()
    {
        $report = "";
        $query  = "SELECT COUNT(*) AS kount FROM books";
    
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
        //$resultCount = $result->num_rows;
        while ($r = $result->fetch_assoc()){
            $report = $r["kount"];
        }
        $result->free();
        $mysqli->close();
        return $report;
    }
   
   function querySearchResults($search_Title, $search_Author , $search_Types , $search_Cats)
   {
            echo '<br />search_Title ='  . $search_Title; 
            echo '<br />search_Author=' . $search_Author; 
            echo '<br />search_Types =' . $search_Types; 
            echo '<br />search_Cats  =' . $search_Cats; 
       
//  Get search parameters from the form
    $search_Title = trim($search_Title);
    $search_Author = trim($search_Author );
    $search_Types = trim($search_Types );
    $search_Cats = trim($search_Cats );

    $query_select = "SELECT * ";
    $query_from = " FROM books AS b "
                .   " INNER JOIN   booksXcats AS x ON b.ItemID = x.itemID"
                .   " INNER JOIN   catNames   AS c ON x.catID  = c.catID";

    $query_where = " WHERE ( b.ItemID > 0 ) ";
    $query_group = " GROUP BY b.Title ";
    $query_order = " ORDER BY b.Title ";
    $query_limit = " LIMIT 200 ";
        
    if ($search_Title <> "")
    {
        $query_where .= " AND (   ( b.Title    LIKE '%" . $search_Title . "%' ) "
                     .  "      OR ( b.SubTitle LIKE '%" . $search_Title . "%' ) "
                     .  "     ) ";
    }
    if ($search_Author <> "")
    {
        $query_where .= " AND ( b.AuthorName LIKE '%" . $search_Author . "%' ) ";
    }
    if ($search_Types <> "")
    {
        $query_where .= " AND ( b.ItemType IN (" . $search_Types . ") OR ItemType IS NULL )";
    }
    if ($search_Cats <> "")
    {
        $query_where .= " AND ( c.catCode IN (" . $search_Cats . ") ) ";
    }
    
    mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
    $mysqli = new mysqli(db_server, db_uid_select, db_pwd_select, db_db);
    
//        $query = "SELECT * FROM books ORDER BY Title LIMIT 10";
        $query =    $query_select 
                .   $query_from 
                .   $query_where
                .   $query_group 
                .   $query_order 
                .   $query_limit;

        echo '<br />query_select=' .  $query_select;
        echo '<br />query_from=' .  $query_from; 
        echo '<br />query_where=' .  $query_where;
        echo '<br />query_group=' .  $query_group; 
        echo '<br />query_order=' .  $query_order; 
        echo '<br />query_limit=' .  $query_limit;
        echo '<br />query=' . $query;
        
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
   
            
        $result = '<table class="tftable" border="1">';
        $result .= '<tr>';
        $result .= '<th>Title</th></th>';
        $result .= '<th>Author</th>';
        $result .= '<th>Item Type</th>';
        $result .= '<th>Categories</th>';
        $result .= '<th>UU Source</th>';
        $result .= '<th>Description</th>';
        $result .= '<th>Notes</th>';
        $result .= '<th>Bookcase and Shelf</th>';
        $result .= '</tr>';
        
        while ($r = $res->fetch_assoc()){
            $result .= '<tr><td>';
            
            $t = $r["Title"].'<br />'.$r["SubTitle"];
            $t = str_replace("'", "$quot;" , $t);
            $result .= $t;
            $result .= '</td><td>';
            $result .= $r["AuthorName"];
            $result .= '</td><td>';
            $result .= $r["ItemType"];            
            $result .= '</td><td>';
            $result .= $r["Keywords"];
            $result .= '</td><td>';
            $result .= $r["UUCategory"];
            $result .= '</td><td>';
            $result .= $r["Description"];
            $result .= '</td><td>';
            $result .= $r["Notes"];
            $result .= '</td><td>';
            $result .= $r["BookcaseID"] . '-' . $r["ShelfID"];            
            $result .= '</td></tr>';
        }
        
        $result .= "</table>";        

        $result .= "<br /><hr />query is<br />";
        $result .= $query;
        $result .= "<br /><hr />";

//        $result .= "<br /><hr />connect_error<br />";
//        $result .= $mysqli->connect_error;
//        $result .= "<br /><hr />";
//
//        $result .= "<hr />client info<br />";
//        $result .= $mysqli->client_info;
//        $result .= "<br />";    
//
//        $result .= "<hr />client version<br />";
//        $result .= $mysqli->client_version;
//        $result .= "<br />";   
//        
//        $result .= "<hr />protocol version<br />";
//        $result .= $mysqli->protocol_version;
//        $result .= "<br />";              
//            
//        $result .= "<hr />type of connection<br />";
//        $result .= $mysqli->host_info;
//        $result .= "<br />";                
//
//        $result .= "<hr />info about query<br />";
//        $result .= $mysqli->info;
//        $result .= "<br />";              
//
//        $result .= "<hr />warning count<br />";
//        $result .= $mysqli->warning_count;
//        $result .= "<br />";        
//
//        $result .= "<hr />#of affected rows<br />";
//        $result .= $mysqli->affected_rows;
//        $result .= "<br />";  
//        $numberOfRows = $mysqli->affected_rows;
//        
//        $result .= "<hr />#of fields returned<br />";
//        $result .= $mysqli->field_count;
//        $result .= "<br />";    
        
        $res->free();
        $mysqli->close();
        return $result;
   }
   
    function queryCategories($ItemID_Start , $ItemID_End , $mode )
   {
        echo '<br />queryCategories (' . $itemIDStart . ' , ' . $itemID_End . ')';
        echo '<br />Starting Item ID=' . $ItemID_Start; 
        echo '<br />Ending Item ID='   . $ItemID_End; 
       
        $query_select = "SELECT * ";
        $query_from   = " FROM books ";
        $query_where  = " WHERE ItemID BETWEEN " . $ItemID_Start . " AND " . $ItemID_End;
        $query_order  = " ORDER BY ItemID ";
        $query_limit  = " LIMIT 200 ";
    
    mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
    $mysqli = new mysqli(db_server, db_uid_select, db_pwd_select, db_db);
    
//        $query = "SELECT * FROM books ORDER BY Title LIMIT 10";
        $query =    $query_select 
                .   $query_from 
                .   $query_where
                .   $query_order 
                .   $query_limit;

        echo '<br />query_select=' .  $query_select;
        echo '<br />query_from=' .  $query_from; 
        echo '<br />query_where=' .  $query_where;
        echo '<br />query_order=' .  $query_order; 
        echo '<br />query_limit=' .  $query_limit;
        echo '<br />query=' . $query;
        
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
   
            
        $result = '<table class="tftable" border="1">';
        $result .= '<th>Item# and Title</th>';
        $result .= '<th>Item&apos;s Category Text</th>';
        $result .= '<th>Parsed Categories</th>';
        $result .= '<th>Entry for booksXcats Junction Table</th>';
        $result .= '</tr>';

        $catID = 100;
        $newFlag = ' ';
        while ($r = $res->fetch_assoc()){
            
            $category = $r["Category"] . ',' .$r["Keywords"];
            $category = str_replace("/", "," , $category);
            
            echo '<hr />Raw Categories are ' . $category;
            
            $newCats = '';
            $catMat = $this->cats->explodeCats($category);
            $catMat  = array_unique($catMat);
            $newJunction = "";
            foreach ($catMat as $kitten)
            { 
                echo '<br />The kitten is ' . $kitten;
                $kitten = trim($kitten);
                if (!empty($kitten) ) {
                    $newFlag = ' ';
                    $catCode = $this->cats->createCategoryCode($kitten);
                    $catName = $this->cats->createCategoryName($kitten);
                    
                    echo '<br />Processing: Category = ' . $catCode . ' &mdash; Name = ' . $catName;
                    
                    /*
                     * Now that we have CatCode and CatName, we can 
                     * check to see if it is already in the 
                     */
                    $catID = $this->cats->getCatIDByCode($mysqli , $catCode);

                    echo '<br >is this a new cat or olde one? catID = ' . $catID;
                    
                    if ($catID == 0) {        //  zero means not found
                        
                        echo '<br />Not Found -- inserting New';
                        
                        $catID = $this->cats->getNextCatID($mysqli);  // SELECT MAX(catID) + 1 FROM catNames;
                        $returnCode = $this->cats->addCategory($mysqli, $catID, $catCode, $catName);
                        if ($returnCode == 1) {
                            $newFlag = " &ndash; New!";
                        } else {
                            $newFlag = " &ndash; ERROR!";
                        }
                    }
                    $catID++;
                    $newCats .= $catID . ') ' . $catName . '&ndash;' . $catCode . '<br />';
                    $newJunction .=  $r["ItemID"] . ' &ndash; ' . $catID . $newFlag . '<br />';
                }
                if ($mode == 'BUILD') {
                    echo '<br />&mdash;&mdash;&mdash;BUILDING!!!&mdash;&mdash;&mdash;';
                    $itemID = $r["ItemID"];
                    $killOldLinks = $this->deleteOldeLinks   ($mysqli , $itemID , $catID);
                    echo '<br />#of old links removed = ' . $killOldLinks;
                    $newLinks     = $this->linkItemToCategory($mysqli , $itemID , $catID);
                    echo '<br />#of new links created = ' . $newLinks;
                }
            }
            $result .= '<tr><td>';
            
            $t = $r["ItemID"] . ' ' . $r["Title"].'<br />'.$r["SubTitle"];
            $result .= $t;
            $result .= '</td><td>';
            $result .= $r["Category"] . ',' . $r["Keywords"];
            $result .= '</td><td>';
            $result .= $newCats;
            $result .= '</td><td>';
            $result .= $newJunction;        //  $r["ItemID"] . ' to ';
            $result .= '</td></tr>';
        }
        $result .= "</table>";        
        
        $debugStuff = $this->queryDebugInfo($mysqli);
        $result .= $debugStuff;
        
        $res->free();
        $mysqli->close();
        return $result;
   }
 
   function deleteOldeLinks ($mysqli , $itemID , $catID)
   {
        $deletedLinkCount = 0;
        $sql = "DELETE FROM booksXcats WHERE itemID = " . $itemID . ' AND catID = ' . $catID;
     
        echo '<hr />function:deleteOldeLinks  Query = ' . $sql;

        $mysqli = new mysqli(db_server, db_uid_delete, db_pwd_delete, db_db);

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
        
        $res = $mysqli->query($sql);
        
        if ($mysqli->errno == 0) {
            echo "<br />The DELETE query ran successfully.";
            $deletedLinkCount = $mysqli->affected_rows;
            echo '<br />#of Deleted Rows = affected_rows = ' . $deletedLinkCount;
         } else {
            echo "<br />ERROR: Could not execute " . $sql;     // ."<br />" . mysqli_error($link);
            echo '<br />Error #' . $mysqli->errno . ' has been detected!!!!';
            echo '<br />Last Error ' . $mysqli->error;
            echo '<br />Error List ' . $mysqli->error_list;
            echo '<br />Last Error ' . $mysqli->error;
         }
        $mysqli->close();       
       
        echo '<br />#of old links removed = ' . $deletedLinkCount;
        return $deletedLinkCount;
    }
   function linkItemToCategory($mysqli , $itemID , $catID)
   {
       $newLinkCount = 0;
        $sql = "INSERT INTO booksXcats(itemID, catID) VALUES ( " . $itemID . " , " . $catID . " )";
     
        echo '<hr />function:linkItemToCategory Query = ' . $sql;

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
       
        $res = $mysqli->query($sql);
        
        if ($mysqli->errno == 0) {
            echo "<br />INSERT query ran successfully.";
            $newLinkCount = $mysqli->affected_rows;
            echo '<br />affected_rows = ' . $newLinkCount;
            //$result->free();
         } else {
            echo "<br />ERROR: Could not execute " . $sql;     // ."<br />" . mysqli_error($link);
            echo '<br />Error #'     . $mysqli->errno . ' has been detected!!!!';
            echo '<br />Last Error ' . $mysqli->error;
            echo '<br />Error List ' . $mysqli->error_list;
            echo '<br />Last Error ' . $mysqli->error;
         }
        $mysqli->close();       
       
        echo '<br />#of new links created = ' . $newLinkCount;
        return $newLinkCount;
    }   
    
    function queryDebugInfo($mysqli)
    {
        $result = "<hr />Debug Infor<hr />";
        $result .= "<br />query is<br />";
        $result .= $query;

        $result .= "<br />connect_error<br />";
        $result .= $mysqli->connect_error;

        $result .= "<br />client info<br />";
        $result .= $mysqli->client_info;

        $result .= "<br />client version<br />";
        $result .= $mysqli->client_version;

        $result .= "<br />protocol version<br />";
        $result .= $mysqli->protocol_version;
            
        $result .= "<br />type of connection<br />";
        $result .= $mysqli->host_info;

        $result .= "<br />info about query<br />";
        $result .= $mysqli->info;

        $result .= "<br />warning count<br />";
        $result .= $mysqli->warning_count;

        $result .= "<br />#of affected rows<br />";
        $result .= $mysqli->affected_rows;

        $numberOfRows = $mysqli->affected_rows;
        
        $result .= "<br />#of fields returned<br />";
        $result .= $mysqli->field_count;
        $result .= "<br />";  
        
        return $result;
    }
    
    
} // end of classBooksDB
