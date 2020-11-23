<?php
    session_start();
    if(!isset($_SESSION['id']) && !isset($_SESSION['name']) && !isset($_SESSION['rol'])) {
        header('Location:../login/login.php');
    }

    require_once('../crud/Consultas.php');
    $usuario = Usuarios::singleton();
    $data = $usuario -> update_data_ganization(2, $_GET['d']);
    $data = $usuario -> update_data_programming(1, $_GET['d'])
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donacion exitosa</title>
    <link rel="stylesheet" href="../js/bootstrap-4.5.0-dist/css/bootstrap.min.css">

</head>
<body>
    <div class="modal" tabindex="-1" style="display: block;">
        <div class="modal-dialog">
             <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Felicidades</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
                </div>
                <div class="modal-body text-center">
                <svg style="font-size: 50px; background: yellow; border-radius: 50%;" width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-emoji-smile" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path fill-rule="evenodd" d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683z"/>
                    <path d="M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
                </svg>
                    <p class="mt-3" style="text-align: justify;">El donativo se realizado con exito, ahora menos personas se quedaran sin alimento.</p>
                    <p style="text-align: justify;">Estamos agradecidos con tu participación ayudando a que se redusca el mal uso de la comida excedente en establecimientos
                    y con ello ayudemos a mas personas que no pasen dias sin un alimento.</p>
                </div>
                <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <a class="btn btn-primary text-white" href="centro-donativo.php">Ver mas alimentos</a>
                </div>
            </div>
        </div>
    </div>

    <!-- BOOTSTRAP SCRIPT -->
    <script src="../js/bootstrap-4.5.0-dist/js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
</body>
</html>