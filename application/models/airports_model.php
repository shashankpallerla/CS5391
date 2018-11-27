<?php

class airports_model extends MY_Model
{
    public $table = 'airport_codes';
    public $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
        $this->timestamps = FALSE;
    }
}


?>