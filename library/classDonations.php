<?php
/*
 * Copyright 2017 Frederick CUPPS
 */
/**
 * Description of classDonations
 *
 * @author Alvin
 */
class classDonations extends classDB {
  
   function __construct()
   {
        parent::__construct();
        $this->util = new classDBUtilities();
   }    
function getCountsByDonationSource()
{
    $report = "";
    $query  = $this->queryCountsBySource();
    
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
    $report = '<table class="tftable">';
    $report .= '<th style="width:200px;">Donation Source#</th>';
    $report .= '<th style="width:200px;">Count</th>';
    $report .= '</tr>';

    while ($r = $result->fetch_assoc()){
            $report .= '<tr>';
            $report .= '<td>' . $r["DonationSourceID"]  . '</td>';
            $report .= '<td style="text-align:right;">' . $r["kount"] . '</td>';
            $report .= '</tr>';
        }
    $report .= "</table>";        
    $result->free();
    $mysqli->close();
    return $report;
}
function queryCountsBySource()
{
    $sql = ""
        .   "SELECT  b.DonationSourceID, COUNT(*) AS kount"
        .   "  FROM        books      AS b" 
        .   " GROUP BY b.DonationSourceID"
        .   " ORDER BY 1";
    return $sql;
}


}   //  end of classDonations


