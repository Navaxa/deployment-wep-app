<?php

    session_start();
    if(!isset($_SESSION['id']) && !isset($_SESSION['name']) && !isset($_SESSION['rol'])) {
        header('Location:../login/login.php');
    }

    require_once('../crud/Consultas.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación</title>
    <link rel="stylesheet" href="../js/bootstrap-4.5.0-dist/css/bootstrap.min.css">
    
</head>
<body style = "background-color: rgba(0,0,0,.5);">

<?php
    if (!empty($_POST['product']) &&
    !empty($_POST['weight']) &&
    !empty($_POST['date']) &&
    !empty($_POST['cause']))
    {

        $usuario = Usuarios::singleton();
        $data = $usuario -> insert_donation($_POST['product'], $_POST['weight'], $_POST['date'], $_POST['cause'], $_SESSION['id']);
?>
    <div class="modal" tabindex="-1" style="display: block;">
        <div class="modal-dialog">
             <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Donación publicada exitosamente</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
                </div>
                <div class="modal-body text-center">
                    <svg style="color: green; font-size: 50px;" width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-check2-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L8 9.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                        <path fill-rule="evenodd" d="M8 2.5A5.5 5.5 0 1 0 13.5 8a.5.5 0 0 1 1 0 6.5 6.5 0 1 1-3.25-5.63.5.5 0 1 1-.5.865A5.472 5.472 0 0 0 8 2.5z"/>
                    </svg>
                    <p class="mt-3">Gracias por tu aporte, en cuanto tu donación sea reclamada por una organización nosotros te notificaremos.</p>
                    <p>Recuerda que si tu donación no es reclamada en el tiempo establecido, se dara de baja, no te preocupes puedes volver a publicarla</p>
                </div>
                <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <a class="btn btn-primary text-white" href="index.php#/donar">Regresar</a>
                </div>
            </div>
        </div>
    </div>
<?php
    } else {

?>

<div class="modal" tabindex="-1" style="display: block;">
        <div class="modal-dialog">
             <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">La donación no pudo ser publicada</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
                </div>
                <div class="modal-body text-center">

                    <svg style="background-color: yellow; font-size: 50px; border-radius: 50%;" width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-emoji-frown" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path fill-rule="evenodd" d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683z"/>
                        <path d="M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
                    </svg>
                    <p class="mt-5">Es importante que llenes todos los campos.</p>
                </div>
                <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <a class="btn btn-danger text-white" href="index.php#/donar">Regresar</a>
                </div>
            </div>
        </div>
    </div>

<?php
    }
?>

    <!-- BOOTSTRAP SCRIPT -->
    <script src="../js/bootstrap-4.5.0-dist/js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
</body>
</html>