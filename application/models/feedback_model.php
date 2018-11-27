<?php

class feedback_model extends MY_Model
{
    public $table = 'feedback';
    public $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
        $this->timestamps = FALSE;

    }
}


?>