<?php

  session_start();
  if(!isset($_SESSION['id']) && !isset($_SESSION['name']) && !isset($_SESSION['rol'])) {
    header('Location:../login/login.php');
  }
  date_default_timezone_set('America/Mexico_City');

  require_once('../crud/Consultas.php');
      $usuarios = Usuarios::singleton();

      $data = $usuarios -> get_full_donations_out_range_date_and_not_req();
      if ( count($data) ) {
          foreach ($data as $fila) {
              $dataTemp = $usuarios -> update_data_ganization(3, $fila['id']);
          }
      }

      $data = $usuarios -> get_full_programming_out_range_date_and_not_req();
      if ( count($data) ) {
          foreach ($data as $fila) {
            $dataTemp = $usuarios -> update_data_programming(2, $fila['id_donacion']);
          }
      }
?>
<!DOCTYPE html>
<html lang="en" ng-app="App">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular-route.min.js"></script>

    <link rel="stylesheet" href="../js/bootstrap-4.5.0-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/style-slidebar.css">

  </head>

  <body ng-controller="FirstController">
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
          <a class="navbar-brand" href="#/">YoComparto
              <!-- <img src="img/logo.png" alt="Fazt" width="35px" height="35px"> -->
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <?php
                  $dir = '';
                  $dirTxt = '';
                  $subTitle = '';
                  $txtButton = 'Centro de donación';
                  if ($_SESSION['rol'] == 'donante') 
                  {
                     $dir = 'http://www.google.com';
                     $dirTxt = '';
                     $subTitle = 'Alimento que puedes donar';
                     $dirRol = '#/donar';
                     $txtButton = 'Donar';
                  } else {
                     $dir = 'centro-donativo.php';
                     $dirTxt = 'Centro de donación';
                     $subTitle = 'Alimento que puedes encontrar';
                     $dirRol = 'centro-donativo.php';

                  }
                ?>

                  <a class="nav-link" href="<?php echo $dir; ?>">
                  <?php
                    if (!$dirTxt == '') {
                  ?>
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-globe" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4H2.255a7.025 7.025 0 0 1 3.072-2.472 6.7 6.7 0 0 0-.597.933c-.247.464-.462.98-.64 1.539zm-.582 3.5h-2.49c.062-.89.291-1.733.656-2.5H3.82a13.652 13.652 0 0 0-.312 2.5zM4.847 5H7.5v2.5H4.51A12.5 12.5 0 0 1 4.846 5zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5H7.5V11H4.847a12.5 12.5 0 0 1-.338-2.5zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12H7.5v2.923c-.67-.204-1.335-.82-1.887-1.855A7.97 7.97 0 0 1 5.145 12zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11H1.674a6.958 6.958 0 0 1-.656-2.5h2.49c.03.877.138 1.718.312 2.5zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12h2.355a7.967 7.967 0 0 1-.468 1.068c-.552 1.035-1.218 1.65-1.887 1.855V12zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5h-2.49A13.65 13.65 0 0 0 12.18 5h2.146c.365.767.594 1.61.656 2.5zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4H8.5V1.077c.67.204 1.335.82 1.887 1.855.173.324.33.682.468 1.068z"/>
                    </svg>
                  <?php
                  }
                   echo $dirTxt; ?>
                  </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#/configuracion">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                    <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                  </svg>
                  <?php echo $_SESSION['name']; ?>
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item active" href="#">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pip" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
                      <path d="M8 8.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1-.5-.5v-3z"/>
                    </svg>
                    Panel
                  </a>
                  <a class="dropdown-item" href="notificaciones.php"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z"/>
                    <path fill-rule="evenodd" d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                  </svg> Notificaciones</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="logout.php">Salir</a>
                </div>
              </li>
            </ul>
          </div>
      </div>
    </nav>

    <div id="sidebar">
        <div class="toggle-btn">
          <span id="abre-menu">&#9776</span>
          <span id="cerra-menu">X</span>
        </div>
        <ul>
          <li>
            <h3 class="title-sliderbar">Menu</h3>
            <!-- <img src="img/logo.jpg" alt="Logo Fazt" class="logo"> -->
          </li>
          <?php 
            if ($_SESSION['rol'] == 'donante') 
            {
          ?>  
              <a class="item" id="donar" href="#/donar">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-puzzle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M4.605 2.5V2v.5zM3.61 3.6l.498-.043V3.55l-.498.05zM7 2.5h.5A.5.5 0 0 0 7 2v.5zm-.676 1.454l.304.397-.304-.397zm3.352 0l-.304.397.304-.397zM9 2.5V2a.5.5 0 0 0-.5.5H9zm3.39 1.1l-.498-.05v.007l.498.043zM12.1 7l-.498-.043a.5.5 0 0 0 .498.543V7zm1.854-.676l.397.304-.397-.304zm0 3.352l.397-.304-.397.304zM12.1 9v-.5a.5.5 0 0 0-.498.542L12.1 9zm.29 3.4l-.498.043v.007l.498-.05zM9 13.5h-.5a.5.5 0 0 0 .5.5v-.5zm.676-1.454l-.304-.397.304.397zm-3.352 0l.304-.397-.304.397zM7 13.5v.5a.5.5 0 0 0 .5-.5H7zm-2.395 0V13v.5zm-.995-1.1l.498.05v-.007L3.61 12.4zM3.9 9l.498.042A.5.5 0 0 0 3.9 8.5V9zm-1.854.676l-.397-.304.397.304zm0-3.352l-.397.304.397-.304zM3.9 7v.5a.5.5 0 0 0 .498-.543L3.9 7zm.705-5a1.5 1.5 0 0 0-1.493 1.65l.995-.1A.5.5 0 0 1 4.605 3V2zM7 2H4.605v1H7V2zm.5.882V2.5h-1v.382h1zm-.872 1.469c.375-.287.872-.773.872-1.469h-1c0 .195-.147.42-.48.675l.608.794zM6.5 4.5l.001-.006a.113.113 0 0 1 .012-.025.459.459 0 0 1 .115-.118l-.608-.794c-.274.21-.52.528-.52.943h1zM8 5c-.491 0-.912-.1-1.19-.24a.86.86 0 0 1-.271-.194.213.213 0 0 1-.039-.063V4.5h-1c0 .568.447.947.862 1.154C6.807 5.877 7.387 6 8 6V5zm1.5-.5v.003a.213.213 0 0 1-.039.064.86.86 0 0 1-.27.193C8.91 4.9 8.49 5 8 5v1c.613 0 1.193-.123 1.638-.346.415-.207.862-.586.862-1.154h-1zm-.128-.15c.065.05.099.092.115.119.008.013.01.021.012.025L9.5 4.5h1c0-.415-.246-.733-.52-.943l-.608.794zM8.5 2.883c0 .696.497 1.182.872 1.469l.608-.794c-.333-.255-.48-.48-.48-.675h-1zm0-.382v.382h1V2.5h-1zm2.895-.5H9v1h2.395V2zm1.493 1.65A1.5 1.5 0 0 0 11.395 2v1a.5.5 0 0 1 .498.55l.995.1zm-.29 3.392l.29-3.4-.996-.085-.29 3.4.996.085zm.284-.542H12.1v1h.782v-1zm.675-.48c-.255.333-.48.48-.675.48v1c.696 0 1.182-.497 1.469-.872l-.794-.608zm.943-.52c-.415 0-.733.246-.943.52l.794.608a.459.459 0 0 1 .118-.115.113.113 0 0 1 .025-.012L14.5 6.5v-1zM16 8c0-.613-.123-1.193-.346-1.638-.207-.415-.586-.862-1.154-.862v1h.003l.01.003a.237.237 0 0 1 .053.036.86.86 0 0 1 .194.27c.14.28.24.7.24 1.191h1zm-1.5 2.5c.568 0 .947-.447 1.154-.862C15.877 9.193 16 8.613 16 8h-1c0 .491-.1.912-.24 1.19a.86.86 0 0 1-.194.271.214.214 0 0 1-.063.039H14.5v1zm-.943-.52c.21.274.528.52.943.52v-1l-.006-.001a.113.113 0 0 1-.025-.012.458.458 0 0 1-.118-.115l-.794.608zm-.675-.48c.195 0 .42.147.675.48l.794-.608c-.287-.375-.773-.872-1.469-.872v1zm-.782 0h.782v-1H12.1v1zm.788 2.858l-.29-3.4-.996.084.29 3.401.996-.085zM11.395 14a1.5 1.5 0 0 0 1.493-1.65l-.995.1a.5.5 0 0 1-.498.55v1zM9 14h2.395v-1H9v1zm.5-.5v-.382h-1v.382h1zm0-.382c0-.195.147-.42.48-.675l-.608-.794c-.375.287-.872.773-.872 1.469h1zm.48-.675c.274-.21.52-.528.52-.943h-1l-.001.006a.113.113 0 0 1-.012.025.459.459 0 0 1-.115.118l.608.794zm.52-.943c0-.568-.447-.947-.862-1.154C9.193 10.123 8.613 10 8 10v1c.492 0 .912.1 1.19.24.14.07.226.14.271.194a.214.214 0 0 1 .039.063v.003h1zM8 10c-.613 0-1.193.123-1.638.346-.415.207-.862.586-.862 1.154h1v-.003l.003-.01a.214.214 0 0 1 .036-.053.859.859 0 0 1 .27-.194C7.09 11.1 7.51 11 8 11v-1zm-2.5 1.5c0 .415.246.733.52.943l.608-.794a.459.459 0 0 1-.115-.118.113.113 0 0 1-.012-.025L6.5 11.5h-1zm.52.943c.333.255.48.48.48.675h1c0-.696-.497-1.182-.872-1.469l-.608.794zm.48.675v.382h1v-.382h-1zM4.605 14H7v-1H4.605v1zm-1.493-1.65A1.5 1.5 0 0 0 4.605 14v-1a.5.5 0 0 1-.498-.55l-.995-.1zm.29-3.393l-.29 3.401.996.085.29-3.4-.996-.086zm-.284.543H3.9v-1h-.782v1zm-.675.48c.255-.333.48-.48.675-.48v-1c-.696 0-1.182.497-1.469.872l.794.608zm-.943.52c.415 0 .733-.246.943-.52l-.794-.608a.459.459 0 0 1-.118.115.112.112 0 0 1-.025.012L1.5 9.5v1zM0 8c0 .613.123 1.193.346 1.638.207.415.586.862 1.154.862v-1h-.003a.213.213 0 0 1-.064-.039.86.86 0 0 1-.193-.27C1.1 8.91 1 8.49 1 8H0zm1.5-2.5c-.568 0-.947.447-1.154.862C.123 6.807 0 7.387 0 8h1c0-.492.1-.912.24-1.19a.86.86 0 0 1 .194-.271.213.213 0 0 1 .063-.039H1.5v-1zm.943.52c-.21-.274-.528-.52-.943-.52v1l.006.001a.112.112 0 0 1 .025.012c.027.016.068.05.118.115l.794-.608zm.675.48c-.195 0-.42-.147-.675-.48l-.794.608c.287.375.773.872 1.469.872v-1zm.782 0h-.782v1H3.9v-1zm-.788-2.858l.29 3.4.996-.085-.29-3.4-.996.085z"/>
                </svg>
                Donar
              </a>
              <a class="item" id="donaciones" href="#/donaciones">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-receipt-cutoff" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v13h-1V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51L2 2.118V15H1V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zM0 15.5a.5.5 0 0 1 .5-.5h15a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z"/>
                  <path fill-rule="evenodd" d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-8a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                </svg>
                Donaciones
              </a>
              </li><a class="item" id="configuracion" href="#/configuracion">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z"/>
                  <path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z"/>
                </svg>
                Configuracón
              </a>
          <?php } else { ?>
              <a class="item" id="mis-apoyos" href="#/mis-apoyos">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-receipt-cutoff" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v13h-1V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51L2 2.118V15H1V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zM0 15.5a.5.5 0 0 1 .5-.5h15a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z"/>
                  <path fill-rule="evenodd" d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-8a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                </svg>
                Mis apoyos
              </a>
              <a class="item" id="programming" href="#/programming">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clock-history" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                <path fill-rule="evenodd" d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
              </svg>
                Programación
              </a>
              <a class="item" id="configuracion" href="#/configuracion">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z"/>
                  <path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z"/>
                </svg>
                Configuracón
              </a>
          <?php } ?>
        </ul>
      </div>

      <script type="text/ng-template" id="pages/index.html">
        <div class="jumbotron">
          <h1 class="display-4 mt-5">Bienvenido <?php echo $_SESSION['name']; ?> </h1>
          <p class="lead">Gracias por formar parte de este proyecto, recuerda que si nos unimos todos, podemos acabar con la hambruna que millones de mexicanos padecen</p>
          <hr class="my-4">
          <p> <?php echo $subTitle; ?>: Azucar, comida enlatada, Arroz, Frijoles, entre otros...!</p>
          <a class="btn btn-primary btn-lg" href="<?php echo $dirRol; ?>" id="startHelp" role="button"><?php echo $txtButton; ?></a>
        </div>

        <div class="container pb-5">
        <?php
        if ($_SESSION['rol'] == 'donante') 
            {
              require_once('../crud/Consultas.php');
              $usuarios = Usuarios::singleton();

              $data = $usuarios -> get_data_programming_donaction_by_id_donante($_SESSION['id'], 0);
              if ( count($data) ) {
                foreach ($data as $fila) {
                  $dataTemp = $usuarios -> get_data_donaction_by_id($fila['id_donacion']);
                  if(count ($dataTemp)) {
                    foreach ( $dataTemp as $filaTemp) {
                        $productoTemp = $filaTemp['producto'];
                        $unitsTemp = $filaTemp['unidades_kg'];
                        $fechaLimite = $filaTemp['fecha'];
                    }
                  }

                  $dataTemp = $usuarios -> get_full_data_user_organization($fila['id_user_asociacion']);
                  if(count ($dataTemp)) {
                    foreach ( $dataTemp as $filaTemp) {
                        $tempRazonSocial = $filaTemp['razon_social'];
                        $tempNombreResponsable = $filaTemp['representante_legal'];
                        $tempTelefono = $filaTemp['telefono'];
                        $tempTipoOrganizacion = $filaTemp['tipo_organizacion'];
                    }
                  }
    
        ?>
          <div class="list-group mt-5">
            <h4 class="list-group-item list-group-item-action active"><?php echo '\'<strong>', $tempRazonSocial,'</strong>\'', ' se intereso en tu donativo'; ?></h4>
            <a class="list-group-item list-group-item-action disabled"><strong>Nombre recolector</strong>: <?php echo $fila['nombre_recolector']; ?></a>
            <a class="list-group-item list-group-item-action disabled"><strong>Fecha de recoleción</strong>: <?php echo $fila['fecha']; ?></a>
            <a class="list-group-item list-group-item-action disabled"><strong>Donativo</strong>: <?php echo $productoTemp; ?></a>
            <a class="list-group-item list-group-item-action disabled"><strong>Unidades en KG</strong>: <?php echo $unitsTemp; ?></a>
            <a class="list-group-item list-group-item-action disabled"><strong>Tipo de organización:</strong>: <?php echo $tempTipoOrganizacion ?></a>
            <a class="list-group-item list-group-item-action disabled"><strong>Representante legal</strong>: <?php echo $tempNombreResponsable; ?></a>
            <a class="list-group-item list-group-item-action disabled"><strong>Teléfono</strong>: <?php echo $tempTelefono; ?></a>
            <a class="list-group-item list-group-item-action disabled"><strong>Nota</strong>: Muy pronto llegara <?php echo $fila['nombre_recolector']; ?> para recibir tu donativo, cuando lo entregues este aviso se eliminara.</a>
            <!-- <a href="success.php?d=<?php echo $fila['id_donacion']; ?>" class="btn-success btn">Ya he recibido la donación</a> -->
          </div>
        <?php
                }
              }
            }
        ?>
        </div>  

        
      </script>
     
      <!-- DONAR PAGE -->
      <script type="text/ng-template" id="pages/donar.html">
      <?php 
        if ($_SESSION['rol'] == 'donante') 
          {

            require_once('../crud/Consultas.php');
            $usuarios = Usuarios::singleton();

            $data = $usuarios -> get_full_data_user($_SESSION['id']);
            $issetUserFlag = 0;
            if ( count($data)) {
              $issetUserFlag = 1;
              $textButton = '<button class="btn btn-primary btn-lg btn-block">Subir donación</button>';
            } else {
              $textButton = '';
            }
      ?>
      <?php if ($issetUserFlag == 0) { ?>
      <div class="container">
        <div class="alert alert-dismissible alert-primary mt-5">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Oops!</strong> <a href="index.php#/configuracion" class="alert-link">Configura tu cuenta para realizar una donación haz clic aquí</a>, solo necesitamos algunos de tus datos.
        </div>  
      </div>
      <?php } ?>
        <section class="light py-5 mt-5">
          <div class="container d-flex align-items-center justify-content-center">
              <div class="row">
                  <div class="col-md-12">
                      <h3>Has una donación 
                        <svg style="color: red;" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bookmark-heart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                          <path fill-rule="evenodd" d="M8 4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z"/>
                        </svg>
                      </h3>
                      <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p> -->
                      <form action="donar.php" method="POST">
                          <div class="input-group mb-3">
                              <div class="input-group-prepend input-group-text">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bag-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M8 1a2.5 2.5 0 0 0-2.5 2.5V4h5v-.5A2.5 2.5 0 0 0 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
                                </svg>
                              </div>
                              <input type="text"class="form-control" name="product" placeholder="Producto">
                          </div>
                          <div class="input-group mb-3">
                              <div class="input-group-prepend input-group-text">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bag-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M8 1a2.5 2.5 0 0 0-2.5 2.5V4h5v-.5A2.5 2.5 0 0 0 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5H2z"/>
                                  <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                              </div>
                              <input type="number"class="form-control" name="weight" step="0.01" placeholder="Unidades en Kilos">
                          </div>
                          <label>Fecha de vencimiento</label>
                          <div class="input-group">
                            <div class="input-group-prepend input-group-text">
                              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar2-range-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 3.5c0-.276.244-.5.545-.5h10.91c.3 0 .545.224.545.5v1c0 .276-.244.5-.546.5H2.545C2.245 5 2 4.776 2 4.5v-1zM10 7a1 1 0 0 0 0 2h5V7h-5zm-4 4a1 1 0 0 0-1-1H1v2h4a1 1 0 0 0 1-1z"/>
                              </svg>
                            </div>
                            <input type="date"class="form-control" name="date" min="<?php echo date('Y-m-d');?>">
                        </div>
                          <!-- <label>Hora de vencimiento</label>
                          <div class="input-group mb-3">
                              <div class="input-group-prepend input-group-text">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar2-range-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 3.5c0-.276.244-.5.545-.5h10.91c.3 0 .545.224.545.5v1c0 .276-.244.5-.546.5H2.545C2.245 5 2 4.776 2 4.5v-1zM10 7a1 1 0 0 0 0 2h5V7h-5zm-4 4a1 1 0 0 0-1-1H1v2h4a1 1 0 0 0 1-1z"/>
                                </svg>
                              </div>
                              <input type="time"class="form-control" name="time" placeholder="Unidades en Kilos">
                          </div> -->
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Causa de la donación</label>
                          <select class="form-control" name="cause" id="exampleFormControlSelect1">
                            <option>Ayuda humanitaria</option>
                            <option>Proximo a vencer</option>
                            <option>Dano en el paquete</option>
                          </select>
                        </div>
                          <!-- <button class="btn btn-primary btn-lg btn-block">Subir donación</button> -->
                          <?php echo $textButton; ?>
                      </form>
                  </div>
              </div>
          </div>
          <?php
            } else {
              echo '<h2 class="mt-5 text-center"> no tienes acceso a ésta sesión</h2>';
            }
          ?>
      </section>

      

      <!-- DONACIONES -->
      <script type="text/ng-template" id="pages/donaciones.html">
      <?php
      if ($_SESSION['rol'] == 'donante') 
        {        
      ?>
      <?php
              require_once('../crud/Consultas.php');
              $usuarios = Usuarios::singleton();
              $counterDonation = 0 ;
              $counterUnitsKg = 0;
              $data = $usuarios -> get_data_success_donation($_SESSION['id'], 2);
              if ( count ( $data) ) {
                foreach ( $data as $fila ) {
                  $counterDonation++;
                  $counterUnitsKg = $counterUnitsKg + $fila['unidades_kg'];
                }
              }
        ?>
        <div class="container row d-flex align-items-center justify-content-center py-5">
          <div class="col-sm-12 col-md-12 mt-5 text-center">
            <h3>Bienvenido a tus datos de donaciones</h3>
          </div>
          <div class="col-sm-12 col-md-3 card bg-danger mt-5 ml-4">
            <div class="card-header text-center text-white">Tus atribuciones</div>
            <div class="card text-white bg-danger mb-3">
              <div class="card-body">
                <h5 class="card-title"><?php echo $counterUnitsKg; ?> Kg.</h5>
              </div>
              <div class="card-body">
                <h5 class="card-title"><?php echo $counterDonation; ?> donaciones</h5>
              </div>
            </div>
          </div>
        </div>
        <?php
        } else {     
            echo '<h2 class="mt-5 text-center"> no tienes acceso a ésta sesión</h2>';
        }
        ?>
      </script>

      <!-- CONFIG PAGE -->
      <script type="text/ng-template" id="pages/configuracion.html">
        <?php 
            if ($_SESSION['rol'] == 'donante') 
            {
        ?>  
        <!-- CONFIG DONADOR -->
        <div class="container justify-content-center mt-5 row">
          <div class="col-sm-12 col-md-12 text-center mb-4 mt-4">
          <h3>Manten actualizados tus datos</h3>
          </div>
          <div class="col-sm-12 col-md-5">
            <?php
              require_once('../crud/Consultas.php');
              $usuarios = Usuarios::singleton();

              $data = $usuarios -> get_full_data_user($_SESSION['id']);
              if ( count($data) ) {
                foreach ($data as $fila) {
                  $nombre_E = $fila['nombre_establecimiento'];
                  $nombre_r = $fila['nombre_responsable'];
                  $telefono = $fila['telefono'];
                  $estado = $fila['estado'];
                  $direccion = $fila['direccion'];
                }
              }

              if (!isset($nombre_E) || $nombre_E == '') {
                $nombre_E = '';
              }
              if (!isset($nombre_r) || $nombre_r == '') {
                $nombre_r = '';
              }
              if (!isset($telefono) || empty($telefono)) {
                $telefono = '';
              }
              if (!isset($estado) || $estado == null) {
                $estado = '';
              }
              if (!isset($direccion) || $direccion == '') {
                $direccion = '';
              }


            ?>

            <table class="table ">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Nombre establecimeinto</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $nombre_E; ?></td>
                </tr>
              </tbody>

              <thead class="thead-dark">
                <tr>
                  <th scope="col">Nombre responsable</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $nombre_r; ?></td>
                </tr>
              </tbody>

              <thead class="thead-dark">
                <tr>
                  <th scope="col">Teléfono</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $telefono; ?></td>
                </tr>
              </tbody>

              <thead class="thead-dark">
                <tr>
                  <th scope="col">Estado</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $estado; ?></td>
                </tr>
              </tbody>

              <thead class="thead-dark">
                <tr>
                  <th scope="col">Dirección</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $direccion; ?></td>
                </tr>
              </tbody>

              <thead class="thead-dark">
                <tr>
                  <th scope="col">Correo</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $_SESSION['email']; ?></td>
                </tr>
              </tbody>
            </table>


          </div>
          <div class="col-sm-12 col-md-7 mb-3">
            <form class="card ml-4" action="data/save-data.php" method="POST">
              <div class="card-header mb-1">
                <h3>
                Rellena el formulario
                </h3>
              </div>
              <div class="container p-3">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre establecimiento</label>
                  <input name="nombre_establecimiento" type="text" value="<?php echo $nombre_E; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <small id="emailHelp" class="form-text text-muted">Nombre del restaurante, buffet, hotel, fonda, etc...</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputName1">Nombre responsable</label>
                  <input name="nombre_responsabe" value="<?php echo $nombre_r; ?>" placeholder="Nombre completo" type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                  <label for="exampleInputName1">Telefono establecimiento</label>
                  <input name="telefono" type="number" value="<?php echo $telefono; ?>" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                  <!-- <label for="exampleInputName1">Estado</label> -->
                  <!-- <input name="estado" type="text" value="<?php echo $estado; ?>" class="form-control" id="exampleInputPassword1"> -->
                  <div class="form-group">
                          <label for="exampleFormControlSelect1">Estado</label>
                          <select class="form-control" id="exampleFormControlSelect1" name="estado">
                          <option ><?php echo $estado; ?></option>
                          <option >Ciudad de México</option>
                          <option >Aguascalientes</option>
                          <option >Baja California</option>
                          <option >Baja California Sur	</option>
                          <option >Campeche</option>
                          <option >Coahuila de Zaragoza	</option>
                          <option >Colima</option>
                          <option >Chiapas</option>
                          <option >Chihuahua</option>
                          <option >Durango</option>
                          <option >Guanajuato</option>
                          <option >Guerrero</option>
                          <option >Hidalgo</option>
                          <option >Jalisco</option>
                          <option >México</option>
                          <option >Michoacán </option>
                          <option >Morelos</option>
                          <option >Nayarit</option>
                          <option >Nuevo León	</option>
                          <option >Oaxaca</option>
                          <option >Puebla</option>
                          <option >Querétaro</option>
                          <option >Quintana Roo	</option>
                          <option >San Luis Potosí	</option>
                          <option >Sinaloa</option>
                          <option >Sonora</option>
                          <option >Tabasco</option>
                          <option >Tamaulipas </option>
                          <option >Tlaxcala	</option>
                          <option >Veracruz</option>
                          <option >Yucatán</option>
                          <option >Zacatecas</option>
                          </select>
                </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputName1">Dirección: calle, número, colonia o municipio</label>
                  <input name="direccion" type="text" value="<?php echo $direccion; ?>" placeholder="ej: calle, número, colonia o municipio" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" id="save" class="btn btn-outline-primary btn-block">Guardar</button>
              </div>
            </form>
          </div>
        </div>
        <?php
            } else {
        ?>

            <!-- CONFIG BOLUNTARIO -->
            <div class="container justify-content-center mt-5 row">
          <div class="col-sm-12 col-md-12 text-center mb-4 mt-4">
          <h3>Manten actualizados tus datos</h3>
          </div>

          <?php

              require_once('../crud/Consultas.php');
              $usuarios = Usuarios::singleton();

              $data = $usuarios -> get_full_data_user_organization($_SESSION['id']);
              if ( count($data) ) {
                foreach ($data as $fila) {
                  $razonSocial = $fila['razon_social'];
                  $cluni = $fila['cluni'];
                  $rfc = $fila['rfc_osc'];
                  $representante = $fila['representante_legal'];
                  $tipoOrganizacion = $fila['tipo_organizacion'];
                  $direccion = $fila['direccion'];
                  $estado = $fila['estado'];
                  $telefono = $fila['telefono'];
                }
              }

              if (!isset($razonSocial) || $razonSocial == '') {
                $razonSocial = '';
              }
              if (!isset($cluni) || $cluni == '') {
                $cluni = '';
              }
              if (!isset($rfc) || empty($rfc)) {
                $rfc = '';
              }
              if (!isset($representante) || $representante == null) {
                $representante = '';
              }
              if (!isset($tipoOrganizacion) || $tipoOrganizacion == '') {
                $tipoOrganizacion = '-------';
              }
              if (!isset($direccion) || $direccion == '') {
                $direccion = '';
              }
              if (!isset($estado) || $estado == '') {
                $estado = '-------';
              }
              if (!isset($telefono) || $telefono == '') {
                $telefono = '';
              }

          ?>

          <div class="col-sm-12 col-md-6">
            
          <table class="table ">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Razon social</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $razonSocial; ?></td>
                </tr>
              </tbody>

              <thead class="thead-dark">
                <tr>
                  <th scope="col">CLUNI</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $cluni; ?></td>
                </tr>
              </tbody>

              <thead class="thead-dark">
                <tr>
                  <th scope="col">RFC OSC</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $rfc; ?></td>
                </tr>
              </tbody>

              <thead class="thead-dark">
                <tr>
                  <th scope="col">Representante legal de la organización</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $representante; ?></td>
                </tr>
              </tbody>

              <thead class="thead-dark">
                <tr>
                  <th scope="col">Tipo de organización</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $tipoOrganizacion; ?></td>
                </tr>
              </tbody>

              <thead class="thead-dark">
                <tr>
                  <th scope="col">Teléfono</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $telefono; ?></td>
                </tr>
              </tbody>

              <thead class="thead-dark">
                <tr>
                  <th scope="col">Estado</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $estado; ?></td>
                </tr>
              </tbody>

              <thead class="thead-dark">
                <tr>
                  <th scope="col">Dirección</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $direccion; ?></td>
                </tr>
              </tbody>

              <thead class="thead-dark">
                <tr>
                  <th scope="col">Correo</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $_SESSION['email']; ?></td>
                </tr>
              </tbody>
            </table>

          </div>
          <div class="col-sm-12 col-md-6 mb-3">
            <form class="card ml-4" action="data/save-data.php" method="POST">
              <div class="card-header mb-1">
                <h3>
                Rellena el formulario
                </h3>
              </div>
              <div class="container p-3">
                <div class="form-group">
                  <label for="exampleInputEmail1">Razon social</label>
                  <input type="text" value="<?php echo $razonSocial; ?>" name="razonSocial" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="exampleInputName1">CLUNI</label>
                  <input type="text" value="<?php echo $cluni; ?>" name="cluni" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                  <label for="exampleInputName1">RFC OSC</label>
                  <input type="text" value="<?php echo $rfc; ?>" name="rfc" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                  <label for="exampleInputName1">Representante legal de la organización</label>
                  <input type="text" value="<?php echo $representante; ?>" name="representanteLegal" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                          <label for="exampleFormControlSelect1">Tipo de organización</label>
                          <select class="form-control" id="exampleFormControlSelect1" name="tipoOrganizacion">
                            <option><?php echo $tipoOrganizacion; ?></option>
                            <option>Albergue</option>
                            <option>Asociacion civil</option>
                            <option>Banco de alimentos</option>
                            <option>Comedor comunitario</option>
                            <option>Fundación</option>
                            <option>Iglesia</option>
                          </select>
                </div>
                <div class="form-group">
                          <label for="exampleFormControlSelect1">Estado</label>
                          <select class="form-control" id="exampleFormControlSelect1" name="estado">
                          <option ><?php echo $estado; ?></option>
                          <option >Ciudad de México</option>
                          <option >Aguascalientes</option>
                          <option >Baja California</option>
                          <option >Baja California Sur	</option>
                          <option >Campeche</option>
                          <option >Coahuila de Zaragoza	</option>
                          <option >Colima</option>
                          <option >Chiapas</option>
                          <option >Chihuahua</option>
                          <option >Durango</option>
                          <option >Guanajuato</option>
                          <option >Guerrero</option>
                          <option >Hidalgo</option>
                          <option >Jalisco</option>
                          <option >México</option>
                          <option >Michoacán </option>
                          <option >Morelos</option>
                          <option >Nayarit</option>
                          <option >Nuevo León	</option>
                          <option >Oaxaca</option>
                          <option >Puebla</option>
                          <option >Querétaro</option>
                          <option >Quintana Roo	</option>
                          <option >San Luis Potosí	</option>
                          <option >Sinaloa</option>
                          <option >Sonora</option>
                          <option >Tabasco</option>
                          <option >Tamaulipas </option>
                          <option >Tlaxcala	</option>
                          <option >Veracruz</option>
                          <option >Yucatán</option>
                          <option >Zacatecas</option>
                          </select>
                </div>
                <div class="form-group">
                  <div class="form-group">
                    <label for="exampleInputName1">Dirección: calle, número, colonia o municipio</label>
                    <input type="text" value="<?php echo $direccion; ?>" name="direccion" placeholder="ej: calle, número, colonia o municipio" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputName1">Teléfono</label>
                  <input type="number" value="<?php echo $telefono; ?>" name="telefono" class="form-control" placeholder="Teléfono de la organización" id="exampleInputPassword1">
                </div>
                </div>
                <button type="submit" id="save" class="btn btn-outline-primary btn-block">Guardar</button>
              </div>
            </form>
          </div>
        </div>
        <?php
            }
        ?>
      </script>

      <script type="text/ng-template" id="pages/mis-apoyos.html">
      <?php 
            if ($_SESSION['rol'] != 'donante') 
            {
            
      ?> 
            <div class="container pt-5">
            <div class="row">
              <div class="col-sm-12 col-md-12 text-center">
                <h2>Lista de apoyos que has recibido</h2>
              </div>

            </div>
             <table class="table mt-5">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Producto</th>
                  <th scope="col">Unidad en kg.</th>
                  <th scope="col">Razon social</th>
                </tr>
              </thead>

              <tbody>
              <?php
              require_once('../crud/Consultas.php');
              $usuarios = Usuarios::singleton();

              $counter = 0 ;
              $data = $usuarios -> get_data_programming_donaction_by_id_asosciation($_SESSION['id'], 1);
              if ( count($data) ) {
                foreach ($data as $fila) { 
                  $counter++;

                 $dataTemp = $usuarios -> get_data_donaction_by_id($fila['id_donacion']);
                 if ( count ( $dataTemp )) {
                   foreach ( $dataTemp as $filaTemp ) {
                     $productoTemp = $filaTemp['producto'];
                     $unitsTemp = $filaTemp['unidades_kg'];
                   }
                 }

                 $dataTemp = $usuarios -> get_data_donaction_by_id_donor($fila['id_user_donante']);
                 if ( count ( $dataTemp )) {
                   foreach ( $dataTemp as $filaTemp ) {
                     $nombreEstablecimientoTemp = $filaTemp['nombre_establecimiento'];
                   }
                 }

              ?>
                <tr>
                  <th scope="row"><?php echo $counter; ?></th>
                  <td><?php echo $productoTemp; ?></td>
                  <td><?php echo $unitsTemp; ?></td>
                  <td><?php echo $nombreEstablecimientoTemp; ?></td>
                </tr>
              <?php
                }
              }
              ?>
              </tbody>
            </table>
            <?php 
            if($counter == 0 ) {
                echo '<h1 class="text-center mt-5"> aun no has recibido un donativo</h1>';
                echo '<h5 class="text-center mt-5"> <a class="btn btn-outline-primary" href="centro-donativo.php">ir a centro de donacion</a> </h5>';
              }
            ?>
            </div>
            <?php
                } else {
                  echo '<h2 class="mt-5 text-center"> no tienes acceso a ésta sesión</h2>';
                }
            ?>
      </script>
      

      <script type="text/ng-template" id="pages/programming.html">
      <?php 
            if ($_SESSION['rol'] != 'donante') 
            {
            
      ?> 
        <div class="container pb-5">
        <?php
              require_once('../crud/Consultas.php');
              $usuarios = Usuarios::singleton();

              $data = $usuarios -> get_data_programming_donaction_by_id_asosciation($_SESSION['id'], 0);
              if ( count($data) ) {
                foreach ($data as $fila) {
                  $estadoProducto = $fila['estado'];
                  $dataTemp = $usuarios -> get_data_donaction_by_id($fila['id_donacion']);
                  if(count ($dataTemp)) {
                    foreach ( $dataTemp as $filaTemp) {
                        $productoTemp = $filaTemp['producto'];
                        $unitsTemp = $filaTemp['unidades_kg'];
                        $fechaLimite = $filaTemp['fecha'];
                    }
                  }

                  $dataTemp = $usuarios -> get_data_donaction_by_id_donor($fila['id_user_donante']);
                  if(count ($dataTemp)) {
                    foreach ( $dataTemp as $filaTemp) {
                        $tempNombreEstablecimiento = $filaTemp['nombre_establecimiento'];
                        $tempNombreResponsable = $filaTemp['nombre_responsable'];
                        $tempTelefono = $filaTemp['telefono'];
                        $tempDireccion = $filaTemp['direccion'];
                        $tempEstado = $filaTemp['estado'];
                    }
                  }
    
        ?>
          <div class="list-group mt-5">
            <h4 class="list-group-item list-group-item-action active"><?php echo $productoTemp, ' ', $unitsTemp; ?> KG</h4>
            <a class="list-group-item list-group-item-action disabled"><strong>Nombre recolector</strong>: <?php echo $fila['nombre_recolector']; ?></a>
            <a class="list-group-item list-group-item-action disabled"><strong>Fecha de recoleción</strong>: <?php echo $fila['fecha']; ?></a>
            <a class="list-group-item list-group-item-action disabled"><strong>Fecha limite</strong>: <?php echo $fechaLimite; ?></a>
            <a class="list-group-item list-group-item-action disabled"><strong>Razon social</strong>: <?php echo $tempNombreEstablecimiento; ?></a>
            <a class="list-group-item list-group-item-action disabled"><strong>Nombre encargado</strong>: <?php echo $tempNombreResponsable; ?></a>
            <a class="list-group-item list-group-item-action disabled"><strong>Teléfono</strong>: <?php echo $tempTelefono; ?></a>
            <a class="list-group-item list-group-item-action disabled"><strong>Dirección</strong>: <?php echo $tempDireccion, ', ', $tempEstado; ?></a>
            <a href="success.php?d=<?php echo $fila['id_donacion']; ?>" class="btn-success btn">Ya he recibido la donación</a>
          </div>
        <?php
                }
              }

              if(!isset($estadoProducto)) {
                echo '<h3 class="text-center mt-5">Aqui vizualizaras la recolección de alimento que programes</h3>';       
              }
        ?>
        </div> 
        <?php
                } else {
                  echo '<h2 class="mt-5 text-center"> no tienes acceso a ésta sesión</h2>';
                }
            ?>       
      </script>

    <!-- VIEW PAGES -->
    <div ng-view class="content"></div>

  
    <script src="js/app.js"></script>
    <script src="js/js-slidebar.js"></script>

    <!-- BOOTSTRAP SCRIPT -->
    <script src="../js/bootstrap-4.5.0-dist/js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
  </body>
</html>
