<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

Class Crud_model extends Model 
{

    protected $table;
    protected $primaryKey;
    protected $allowedFields;

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    // function __construct($table)
    // {
    //     $this->table = $table
    // }

    public function setTable($table) 
    {
        $this->table = $table;
    }

    public function setPrimaryKey($pk) 
    {
        $this->primaryKey = $pk;
    }

    public function setFields($fields)
    {
        $this->allowedFields = $fields;    
    }

}

?>