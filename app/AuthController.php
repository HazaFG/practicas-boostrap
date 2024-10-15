<?php

var_dump($_POST);

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'access':
            $authController = new AuthController();
            
            $email = strip_tags($_POST['email']);
            $contrasena = strip_tags($_POST['contrasena']);
            
            $authController->login($email, $contrasena);
            break;

        default:
            echo "Acción no reconocida";
            break;
    }
}

// Definición de la clase AuthController
class AuthController {
    public function login($email = '', $contrasena = '') {
        
        <?php
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => array('email' => 'hazaelf_21@alu.uabcs.mx','password' => '123456789'),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        $response = json_decode($response);  
        
        if(isset($response->data->name)){
            $_SESSION['user_data'] = $response->data
            $_SESSION['user_id'] = $response->data->id
        }

        echo $response->data->name;

    }
}
