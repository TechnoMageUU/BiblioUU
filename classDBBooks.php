<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of classBooksDB
 *
 * @author Alvin
 */
include './classDBUtilities.php';

class classDBBooks extends classDB {

    public $query_select;
    public $query_from;
    public $query_where;
    public $query_order;
    public $query_limit;
    
    //function __construct($edible, $color="green")
   function __construct()
   {
       parent::__construct();

          $this->util = new classDBUtilities();
       
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
   
   function querySearchResults($search_Title, $search_Author)
   {
            echo '<br />search_Title='  . $search_Title; 
            echo '<br />search_Author=' . $search_Author; 
       
//  Get search parameters from the form
    $search_Title = trim($search_Title);
    $search_Author = trim($search_Author );
    //$search_Types = $_POST[''];
    //$search_Cats = $_POST[''];
    //$search_UU6 = $_POST[''];

    $query_select = "SELECT * ";
    $query_from = " FROM books ";
    $query_where = " WHERE ItemID > 0 ";
    $query_order = " ORDER BY Title ";
    $query_limit = " LIMIT 20 ";
    
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
        $result .= '<tr>';
        $result .= '<th>Title</th></th>';
        $result .= '<th>Author</th>';
        $result .= '<th>Item Type</th>';
        $result .= '<th>Categories</th>';
        $result .= '<th>UU Source</th>';
        $result .= '<th>Description</th>';
        $result .= '<th>Notes</th>';
        $result .= '</tr>';
        
        while ($r = $res->fetch_assoc()){
            $result .= '<tr><td>';
            
            $t = $r["Title"].'<br />'.$r["SubTitle"];
            $t = str_replace("'", "$quot;" , $t);
            $result .= $t;
            //echo $r["Title"].'<br />'.$r["SubTitle"];
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
            $result .= '</td></tr>';
        }
        
        $result .= "</table>";        

        $result .= "<br /><hr />query is<br />";
        $result .= $query;
        $result .= "<br /><hr />";

        $result .= "<br /><hr />connect_error<br />";
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
        
        $res->free();
        $mysqli->close();
        return $result;
   }
   
    function queryCategories($ItemID_Start , $ItemID_End)
   {
            echo '<br />Starting Item ID=' . $ItemID_Start; 
            echo '<br />Ending Item ID='   . $ItemID_End; 
       
    $query_select = "SELECT * ";
    $query_from = " FROM books ";
    $query_where = " WHERE ItemID BETWEEN " . $ItemID_Start . " AND " . $ItemID_End;
    $query_order = " ORDER BY ItemID ";
    $query_limit = " LIMIT 200 ";
    
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
        
        while ($r = $res->fetch_assoc()){
            
            $category = $r["Category"] . ',' .$r["Keywords"];
            $category = str_replace("/", "," , $category);
            
            $newCats = '';
            $catMat = $this->util->explodeCats($category);
            $catMat  = array_unique($catMat);
            $newJunction = "";
            foreach ($catMat as $kitten)
            { 
                $kitten = trim($kitten);
                if (!empty($kitten) )
                {
                    $catCode = $this->util->createCategoryCode($kitten);
                    $catName = $this->util->createCategoryName($kitten);
    //                $rows = deleteCategoryByCode($mysqli , $catName);
    //                $catID = insertCategory($mysqli , $catCode , $catName);
    //                $rows = linkItemToCategory($mysqli , $itemID , $catID);

                    $catID++;
                    $newCats .= $catID . ') ' . $catName . '&ndash;' . $catCode . '<br />';
                    $newJunction .=  $r["ItemID"] . ' &ndash; ' . $catID . '<br />';
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
//   function explodeCats($conCats)
//    {
//    $manyCats = explode(",", $conCats);
//    return $manyCats;
//    }
//function createCategoryCode($catName)
//{
//    /*
//     *  Remove all characters except A-Z and numbers
//     */
//    $code = preg_replace("/[^A-Za-z0-9 ]/", '', $string);
//    $code = strtoupper($code);
//    return $code;
//}    
    
    
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
