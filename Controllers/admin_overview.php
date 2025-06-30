<?php
class admin_overview extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    
    public function index()
    {
        $this->views->getView('admin_overview', "index");
    }
}