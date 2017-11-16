<?php
/**
 * Description of classDBUtilities
 *
 * @author Alvin
 */
class classDBUtilities extends classDB {
   
   function __construct()
   {
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


