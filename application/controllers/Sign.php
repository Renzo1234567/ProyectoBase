<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sign extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo 1;
    }
    
    public function in() {
        echo "Sig in";
    }
    
    public function up() {
        echo "Sign up";
    }
    
    public function out() {
        echo "Sig out";
    } 
    
    public function remember() {
        echo "Remember";
    }

}