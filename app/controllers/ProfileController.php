<?php

namespace App\controllers;

use App\QueryBuilder;

use League\Plates\Engine;

use PDO;

class HomeController {

    protected $templates;
    protected $db;

    public function __construct()
    {
        $this->templates = new Engine('../app/views');
        $this->db = new QueryBuilder();
    }


}