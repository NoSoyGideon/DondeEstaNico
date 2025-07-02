<?php

class donar extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();

    }
    public function index()
    {
        $data['title'] = 'Pagina Principal';
        $this->views->getView('donar', "index", $data);
    }
}