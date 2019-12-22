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

    public function index(){      
        
        $comments = $this->db->getAll('comments');       
        
        echo $this->templates->render('homepage', ['comments' => $comments]);       
    }

    public function profile(){   
          
        $user_id = $_SESSION['user']['id'];

        $users = $this->db->getAll('users');      
        
        echo $this->templates->render('profile', ['users' => $users, 'user_id' => $user_id]);       
    }

    public function login(){    
        
        echo $this->templates->render('login', ['users' => $users, 'user_id' => $user_id]);       
    }

    public function registration(){    
        
        echo $this->templates->render('registration', ['users' => $users, 'user_id' => $user_id]);       
    }
}