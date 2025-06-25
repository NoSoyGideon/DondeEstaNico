<?php

class adoptar extends Controller
{
    public function __construct() {
        parent::__construct();

    }
    public function index()
    {
        $data['title'] = 'Pagina Principal';
        $this->views->getView('adoptar', "index", $data);
    }
}