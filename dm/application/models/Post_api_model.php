<?php
/*
** Admin model
** Model to save/update/delete Admin Users
*/
include_once('Abstract_model.php');

class Post_api_model extends Abstract_model {

    protected $table_name = "";	
    function __construct() {
        $this->table_name = "post_api";
		parent::__construct();
    }
    
}