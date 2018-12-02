<?php

class Hotels_model extends MY_Model
{
    public $table = 'hotels';
    public $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
        $this->timestamps = FALSE;
    }
}


?>