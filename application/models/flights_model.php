<?php

class flights_model extends MY_Model
{
    public $table = 'flights';
    public $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();

        $this->has_one['source'] = array('foreign_model'=>'airports_model','foreign_table'=>'airport_codes','foreign_key'=>'id','local_key'=>'source');
        $this->has_one['destination'] = array('foreign_model'=>'airports_model','foreign_table'=>'airport_codes','foreign_key'=>'id','local_key'=>'destination');

    }
}


?>