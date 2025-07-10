<?php
class admin_overview extends Controller
{
    public function __construct()
    {
        parent::__construct();
          session_start();
          require_once "Models/realojarModel.php";
    $this->model = new admin_overviewModel();
    }


    
    public function index()
    {
        $this->views->getView('admin_overview', "index");
    }
}