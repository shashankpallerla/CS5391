<?php

class Users_model extends MY_Model
{
    public $table = 'users';
    public $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
        $this->timestamps = FALSE;
    }
}


?>