<?php

class Hoteldestinations_model extends MY_Model
{
    public $table = 'hotel_destinations';
    public $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
        $this->timestamps = FALSE;
    }
}


?>