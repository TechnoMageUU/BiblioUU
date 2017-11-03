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

class classDBBooks extends classDB {

    var $edible;
    var $color;

    public $query_select = "SELECT * ";
    public $query_from = " FROM books ";
    public $query_where = " WHERE ItemID > 0 ";
    public $query_order = " ORDER BY Title ";
    public $query_limit = " LIMIT 20 ";
    
    
   function __construct($edible, $color="green")
   {
       parent::__construct();

       $this->edible = $edible;
       $this->color = $color;
   }

   function is_edible()
   {
       return $this->edible;
   }
   function what_color()
   {
       return $this->color;
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
    //  Get search parameters from the form
    $search_Title = trim($search_Title);
    $search_Author = trim($search_Author );
    //$search_Types = $_POST[''];
    //$search_Cats = $_POST[''];
    //$search_UU6 = $_POST[''];

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
    $mysqli = new mysqli($db_server, $db_userid, $db_pwd, $db_db);
//        $query = "SELECT * FROM books ORDER BY Title LIMIT 10";
        $query =    $query_select 
                .   $query_from 
                .   $query_where
                .   $query_order 
                .   $query_limit;

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
   
   
   
   
} // end of classBooksDB
?>