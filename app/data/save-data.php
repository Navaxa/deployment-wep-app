<?php

    session_start();
    if(!isset($_SESSION['id']) && !isset($_SESSION['name']) && !isset($_SESSION['rol'])) {
    header('Location:../login/login.php');
    }
    
    require_once('../../crud/Consultas.php');

    if (isset($_POST['nombre_establecimiento']) &&
        isset($_POST['nombre_responsabe']) &&
        isset($_POST['telefono']) &&
        isset($_POST['estado']) &&
        isset($_POST['direccion']))
        
        {

            saveDataDonador();

        }

    if (isset($_POST['razonSocial']) &&
        isset($_POST['cluni']) &&
        isset($_POST['rfc']) &&
        isset($_POST['representanteLegal']) && 
        isset($_POST['tipoOrganizacion']) && 
        isset($_POST['estado']) &&
        isset($_POST['direccion']) &&
        isset($_POST['telefono']))
        {

            saveDataAsociancion();

        }



    function saveDataDonador(){
        $usuarios = Usuarios::singleton();
        $data = $usuarios -> get_full_data_user($_SESSION['id']);
        if(count($data)) {
            
            $data = $usuarios -> update_full_data_user($_POST['nombre_establecimiento'],
                                                   $_POST['nombre_responsabe'],
                                                   $_POST['telefono'],
                                                   $_POST['estado'],
                                                   $_POST['direccion'],
                                                   $_SESSION['id']);

        } else {
            
            $data = $usuarios -> insert_full_data_user($_POST['nombre_establecimiento'],
                                                   $_POST['nombre_responsabe'],
                                                   $_POST['telefono'],
                                                   $_POST['estado'],
                                                   $_POST['direccion'],
                                                   $_SESSION['id']);

        }
        
    }

    function saveDataAsociancion(){
        $usuarios = Usuarios::singleton();
        $data = $usuarios -> get_full_data_user_organization($_SESSION['id']);
        if(count($data)) {
            
            $data = $usuarios -> update_full_data_user_organization($_POST['razonSocial'],
                                                                    $_POST['cluni'],
                                                                    $_POST['rfc'],
                                                                    $_POST['representanteLegal'],
                                                                    $_POST['tipoOrganizacion'],
                                                                    $_POST['direccion'],
                                                                    $_POST['estado'],
                                                                    $_POST['telefono'],
                                                                    $_SESSION['id']);

        } else {
            
            $data = $usuarios -> insert_full_data_user_organization($_POST['razonSocial'],
                                                                    $_POST['cluni'],
                                                                    $_POST['rfc'],
                                                                    $_POST['representanteLegal'],
                                                                    $_POST['tipoOrganizacion'],
                                                                    $_POST['direccion'],
                                                                    $_POST['estado'],
                                                                    $_POST['telefono'],
                                                                    $_SESSION['id']);

        }
    }

    header('Location:../#/configuracion');

?>