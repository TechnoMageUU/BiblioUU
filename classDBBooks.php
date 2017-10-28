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
    
    var $db_server = "mysql.bibliouu.online";
    var $db_userid = "bookmaster";
    var $db_pwd = "b00kMast3r!";
    var $db_db = "bibliouu_books";

    var $edible;
    var $color;

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
   
} // end of classBooksDB
?>