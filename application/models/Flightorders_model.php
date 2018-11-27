<?php

class Flightorders_model extends MY_Model
{
    public $table = 'flight_orders';
    public $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
        $this->timestamps = FALSE;

    }
}


?>