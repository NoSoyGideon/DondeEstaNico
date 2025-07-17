<?php
class adminMascotas extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $data['title'] = 'Pagina Principal';
        $this->views->getView('adminMascotas', "index", $data);
    }
     public function send() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name = trim($_POST['name'] ?? '');
      $email = trim($_POST['email'] ?? '');
      $phone = trim($_POST['phone'] ?? '');
      $message = trim($_POST['message'] ?? '');

      $errors = [];

      if (empty($name)) $errors[] = "Name is required.";
      if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required.";
      if (empty($message)) $errors[] = "Message cannot be empty.";

      if (!empty($errors)) {
        $_SESSION['form_errors'] = $errors;
        header("Location: " . BASE_URL . "contacto");
        exit;
      }

      // Aquí puedes guardar en la base de datos o enviar un correo
      // Ejemplo: guardar en logs.txt
      $log = "Name: $name\nEmail: $email\nPhone: $phone\nMessage: $message\n------\n";
      file_put_contents('logs/contact_messages.txt', $log, FILE_APPEND);

      $_SESSION['form_success'] = "Your message has been sent!";
      $data['title'] = 'Pagina Principal';
      header("Location: " . BASE_URL . "contacto");
    }
  }
}