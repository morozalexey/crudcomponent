<?php

namespace App\controllers;

use App\QueryBuilder;

use League\Plates\Engine;

use \Tamtamchik\SimpleFlash\Flash;

use PDO;

class PagesController {

    protected $templates;
    protected $db;
    protected $auth;
    protected $validator;

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
          
        $users = $this->db->getOne('users', $_SESSION['auth_user_id']);     
        
        echo $this->templates->render('profile', ['users' => $users]);       
    }

    public function registration_page(){

        echo $this->templates->render('registration');
    }

     public function login_page(){

        echo $this->templates->render('login');
    } 
}