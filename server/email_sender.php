<?php
require 'vendor/autoload.php';
use \Mailjet\Resources;

require_once 'config.php';

function send_email($data) {
    $mj = new \Mailjet\Client(MJ_APIKEY_PUBLIC, MJ_APIKEY_PRIVATE,true,['version' => 'v3.1']);

    $body = [
        'Messages' => [
            [
                'From' => [
                    'Email' => SENDER_EMAIL,
                    'Name' => "Rastreator Prueba técnica"
                ],
                'To' => [
                    [
                        'Email' => RECIPIENT_EMAIL,
                        'Name' => "You"
                    ]
                ],
                'Subject' => "Formulario seguro Adeslas",
                'HTMLPart' => "Nuevos datos de contacto:<br>
                    Nombre: ".$data['name']."<br>
                    Teléfono: ".$data['phone']."<br>
                    Email: ".$data['email']."<br>
                    DNI: ".$data['dni']."<br>
                    Franja horaria: ".$data['schedule']
            ]
        ]
    ];

    $response = $mj->post(Resources::$Email, ['body' => $body]);

    return $response->success();
}
?>