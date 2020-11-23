<?php

  session_start();
  if(!isset($_SESSION['id']) && !isset($_SESSION['name']) && !isset($_SESSION['rol'])) {
    header('Location:../login/login.php');
  }

  require_once('../crud/Consultas.php');
  $usuarios = Usuarios::singleton();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Notificaciones</title>

    <!-- BOOTSTRAP CSS -->
    <link
      rel="stylesheet"
      href="../js/bootstrap-4.5.0-dist/css/bootstrap.min.css"
    />

    <script src="../js/bootstrap-4.5.0-dist/js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <a class="navbar-brand" href="index.php"
          >YoComparto
          <!-- <img src="img/logo.png" alt="Fazt" width="35px" height="35px"> -->
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="centro-donativo.php">
              <?php 
                  if(!($_SESSION['rol'] == 'donante')) {
                ?>
                <svg
                  width="1em"
                  height="1em"
                  viewBox="0 0 16 16"
                  class="bi bi-globe"
                  fill="currentColor"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    fill-rule="evenodd"
                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4H2.255a7.025 7.025 0 0 1 3.072-2.472 6.7 6.7 0 0 0-.597.933c-.247.464-.462.98-.64 1.539zm-.582 3.5h-2.49c.062-.89.291-1.733.656-2.5H3.82a13.652 13.652 0 0 0-.312 2.5zM4.847 5H7.5v2.5H4.51A12.5 12.5 0 0 1 4.846 5zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5H7.5V11H4.847a12.5 12.5 0 0 1-.338-2.5zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12H7.5v2.923c-.67-.204-1.335-.82-1.887-1.855A7.97 7.97 0 0 1 5.145 12zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11H1.674a6.958 6.958 0 0 1-.656-2.5h2.49c.03.877.138 1.718.312 2.5zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12h2.355a7.967 7.967 0 0 1-.468 1.068c-.552 1.035-1.218 1.65-1.887 1.855V12zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5h-2.49A13.65 13.65 0 0 0 12.18 5h2.146c.365.767.594 1.61.656 2.5zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4H8.5V1.077c.67.204 1.335.82 1.887 1.855.173.324.33.682.468 1.068z"
                  />
                </svg>
                Centro de donación
                <?php
                  }
                ?>
              </a>
            </li>
            <li class="nav-item dropdown active">
              <a
                class="nav-link dropdown-toggle"
                data-toggle="dropdown"
                role="button"
                aria-haspopup="true"
                aria-expanded="false"
                href="#/configuracion"
              >
                <svg
                  width="1em"
                  height="1em"
                  viewBox="0 0 16 16"
                  class="bi bi-person-circle"
                  fill="currentColor"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"
                  />
                  <path
                    fill-rule="evenodd"
                    d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"
                  />
                  <path
                    fill-rule="evenodd"
                    d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"
                  />
                </svg>
                <?php echo $_SESSION['name']; ?>
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="index.php">
                  <svg
                    width="1em"
                    height="1em"
                    viewBox="0 0 16 16"
                    class="bi bi-pip"
                    fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"
                    />
                    <path
                      d="M8 8.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1-.5-.5v-3z"
                    />
                  </svg>
                  Panel
                </a>
                <a class="dropdown-item active" href="#"
                  ><svg
                    width="1em"
                    height="1em"
                    viewBox="0 0 16 16"
                    class="bi bi-bell"
                    fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z" />
                    <path
                      fill-rule="evenodd"
                      d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"
                    />
                  </svg>
                  Notificaciones</a
                >
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">Salir</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container mt-5">
    <?php
      if ( $_SESSION['rol'] == 'donante') {
        
        $data = $usuarios -> get_full_data_donation($_SESSION['id']);
        if(count($data)) {
          foreach ($data as $fila) {
            $producto = $fila['producto'];
            $units = $fila['unidades_kg'];
            $date = $fila['fecha'];
            echo '<div class="alert alert-primary" role="alert">La publicación fue exitosa, acabas de publicar: '
                  , $units, ' Kg de ', $producto, ' con fecha de vencimiento del ', $date ,', Mantente al pendiente en cualquier momento puede llegarte una solicitud de tu donación.</div>';
          }
        }

        $data = $usuarios -> get_data_success_donation($_SESSION['id'], 3);
        if ( count ( $data ) ) {
          foreach ($data as $fila) {
            $producNotRequest = $fila['producto'];
            $unitNotRequest = $fila['unidades_kg'];

            echo '<div class="alert alert-danger" role="alert">
            Lo sentimos el limite de tiempo establecido para recolectar el donativo publicado <strong>'.$unitNotRequest.'kg de '.$producNotRequest.'</strong> se ha agotado
            y no fue reclamado, no te preocupes realiza otro donativo y extiende un poco mas el limite.
                  </div>';
          }
        }

        $data = $usuarios -> get_data_programming_donaction_by_id_donante($_SESSION['id'], 2);
        if ( count ( $data ) ) {
          foreach ($data as $fila) {
            $dataTemp = $usuarios -> get_data_donaction_by_id($fila['id_donacion']);
            if (count($dataTemp)) {
              foreach($dataTemp as $filaTemp) {
                $produducFailed = $filaTemp['producto'];
                $unitFailed = $filaTemp['unidades_kg'];
              }
            }
            $dataTemp = $usuarios -> get_full_data_user_organization($fila['id_user_asociacion']);
            if (count($dataTemp)) {
              foreach($dataTemp as $filaTemp) {
                $nombreAsociacion = $filaTemp['razon_social'];
              }
            }
            echo '<div class="alert alert-danger" role="alert">
                      Lo sentimos se ha agotado el tiempo para recolectar el donativo <strong>'.$unitFailed.'
                      kg de '.$produducFailed.'</strong> reclamado por \'<strong>'.$nombreAsociacion.'</strong>\' ,
                      no te preocupes puedes publicar nuevamente el donativo</a>.
                  </div>';
          }
        }

        if (!isset($producto) && !isset($producNotRequest) && !isset($produducFailed)){
          echo '<h2 class="text-center">Aun no tienes notificaciones</h2>';
          return;
        }

        $data = $usuarios -> get_data_success_donation($_SESSION['id'], 2);
        if(count($data)) {
          foreach ($data as $fila) {
            echo '<div class="alert alert-primary" role="alert">Acabas de donar exitosamente revisa tus datos
                  en el apartado de donaciones.. <a href="index.php#/">regresar</a></div>';
          }
        }

        
      
    ?>
      
    <?php
      } else {
        $data = $usuarios -> get_data_programming_donaction_by_id_asosciation($_SESSION['id'], 1);
        if(count($data)) {
          foreach ($data as $fila) {
            $dataTemp = $usuarios -> get_data_donaction_by_id($fila['id_donacion']);
            if(count ($dataTemp)) {
              foreach ($dataTemp as $filaTemp) {
                $productoTemp = $filaTemp['producto'];
                $unitsTemp = $filaTemp['unidades_kg'];
              }
            }
            echo '<div class="alert alert-primary" role="alert">Has recolectado tu donativo de '.$unitsTemp.' KG de '.$productoTemp.' de forma exitosa.</div>';

          }
        }
        
        $data = $usuarios -> get_data_programming_donaction_by_id_asosciation($_SESSION['id'], 2);
        if ( count ( $data ) ) {
          foreach ($data as $fila) {
            $dataTemp = $usuarios -> get_data_donaction_by_id($fila['id_donacion']);
            if (count($dataTemp)) {
              foreach($dataTemp as $filaTemp) {
                $produducFailed = $filaTemp['producto'];
                $unitFailed = $filaTemp['unidades_kg'];
              }
            }
            echo '<div class="alert alert-danger" role="alert">
                      Lo sentimos tu limite de tiempo para recolectar el donativo solicitado <strong>'.$unitFailed.'
                      kg de '.$produducFailed.'</strong> se ha acabado, no te preocupes puedes encontrar mas <a href="centro-donativo.php" class="alert-link">aquí</a>.
                  </div>';
          }
        }


        if (!isset($productoTemp) && !isset($produducFailed)) {
          echo '<h2 class="text-center">Aun no tienes notificaciones</h2>';
        }
      }
    ?>
      
      <!-- <div class="alert alert-danger" role="alert">
        El tiempo se ha agotado, la donación se ha cancelado, intente con otra.. animo!
      </div> -->
    </div>

    <!-- BOOTSTRAP SCRIPT -->
    <!-- <script src="../js/bootstrap-4.5.0-dist/js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap-4.5.0-dist/js/bootstrap.min.js"></script> -->
  </body>
</html>
