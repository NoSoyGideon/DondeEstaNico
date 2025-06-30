<?php

class donar extends Controller
{
    public function __construct() {
        parent::__construct();

    }
    public function index()
    {
        $data['title'] = 'Pagina Principal';
        $this->views->getView('donar', "index", $data);
    }
}