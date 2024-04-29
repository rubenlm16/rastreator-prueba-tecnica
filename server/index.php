<?php

header("Access-Control-Allow-Origin: *");

require_once 'email_sender.php';
require_once 'validations.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $dni = $_POST['dni'];
    $schedule = $_POST['scheduleRadio'];
    $acceptance = isset($_POST['acceptance']);

    $errors = [];

    if (empty($name)){
        $errors[] = 'name';
    } 

    if (!is_valid_phone($phone)){
        $errors[] = 'phone';
    } 
    
    if (!filter_var( $email, FILTER_VALIDATE_EMAIL)){
        $errors[] = 'email';
    }

    if (!is_valid_dni($dni)){
        $errors[] = 'dni';
    } 
    
    if (empty($errors)) {
        $data = array(
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'dni' => $dni,
            'schedule' => $schedule == 1 ? 'tarde' : 'mañana',
        );
        if (send_email($data)){
            echo json_encode('success');
        } else {
            echo json_encode('error');
        }
    } else {
        header('Content-Type: application/json');
        echo json_encode($errors);
    }

}
?>