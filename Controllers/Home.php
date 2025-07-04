<?php
class Home extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $mascotas = $this->model->getMascotas();
        $data['title'] = 'Pagina Principal';
        $data['mascotas'] = $mascotas;
        $this->views->getView('home', "index", $data);
    }
}