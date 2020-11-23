<?php
    echo '<script>
              var flag = 0; 
              var flagEmailExist = 0;
          </script>';
    require_once('../crud/Consultas.php');
    $usuarios = Usuarios::singleton();

    $rol = "";
    $session = "";
    $name = "";

    // LOGIN
    if (isset($_POST['email']) && isset($_POST['password']) && !isset($_POST['name']) && !isset($_POST['rol']))
    {
      $data = $usuarios -> get_user($_POST['email'], $_POST['password']);
      if(count($data)) {
           foreach($data as $fila) {
             $rol = $fila['rol'];
             $session = $fila['id'];
             $name = $fila['nombre'];
             $email = $fila['correo'];
          }

          session_start();
          $_SESSION['id'] = $session;
          $_SESSION['name'] = $name;
          $_SESSION['email'] = $email;
          $_SESSION['rol'] = $rol;

          header('Location:../app/');
      } else {
        echo "<script> flag = 1;</script>";
      }
      
    }


    // REGSTER
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['rol']))
    {
      $data = $usuarios -> get_email($_POST['email']);
      if (count($data)) {
          foreach ($data as $fila) {
            $email = $fila['correo'];
          }
      }

      if(isset($email)){
        echo "<script> flagEmailExist = 1;</script>";
      } else {
        $data = $usuarios -> insert_user($_POST['name'], $_POST['email'], $_POST['password'], $_POST['rol']);
      }
    }

?>
<!DOCTYPE html>
<htm lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!--IMPORT GOOGLE ICON FONT-->
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="css/css-login.css">
</head>
<body>
    <div class="container">
        <div class="container-img">
            <div class="overlay"></div>
        </div>
        <div class="login-register">
            <div class="wrapper">
                <div class="title-text">
                  <div class="title login">
          Iniciar sesión</div>
          <div class="title signup">
          Unete</div>
          </div>
          <div class="form-container">
                  <div class="slide-controls">
                    <input type="radio" name="slide" id="login" checked>
                    <input type="radio" name="slide" id="signup">
                    <label for="login" class="slide login">Acceder</label>
                    <label for="signup" class="slide signup">Registrate</label>
                    <div class="slider-tab">
          </div>
          </div>
          <span id="no-valid"></span>
          <span id="no-valid-data"></span>
          <div class="form-inner">
                    <form action="login.php" class="login" method="POST">
                      <div class="field">
                        <input type="text" placeholder="Email" name="email" required>
                      </div>
          <div class="field">
                        <input type="password" placeholder="Contraseña" name="password" required>
                      </div>
          <div class="pass-link">
          <a href="#">¿Olvidaste la contraseña?</a></div>
          <div class="field btn">
                        <div class="btn-layer">
          </div>
          <input type="submit" value="Iniciar sesión">
                      </div>
          <div class="signup-link">
          ¿No eres mientro? <a href="">Registrate ahora</a></div>
          </form>
          <form action="login.php" class="signup" method="POST">
                      <div class="field">
                        <input type="text" placeholder="Nombre completo" name="name" required>
                      </div>
          <div class="field">
                        <input type="email " placeholder="Corre electrónico" name="email" required>
                      </div>
          <div class="field">
                        <input type="password" placeholder="Contraseña" name="password" required>
                      </div>

            <label class="label-radio">
              <input clas="input-radio" type="radio" name="rol" value="donante" checked>
              <span class="design"></span>
              <span class="text">Quiero donar</span>
            </label>
            <label class="label-radio">
                <input clas="input-radio" type="radio" name="rol" value="organizacion_humanitaria" checked>
                <span class="design"></span>
                <span class="text">Quiero ser veneficiario</span>
            </label>
                      
          <div class="field btn">
                        <div class="btn-layer">
          </div>
          
          <input type="submit" value="Regstrarse">
                      </div>
          </form>
          </div>
          </div>
          </div>
        </div>
    </div>

    
  <script>
        const loginText = document.querySelector(".title-text .login");
        const loginForm = document.querySelector("form.login");
        const loginBtn = document.querySelector("label.login");
        const signupBtn = document.querySelector("label.signup");
        const signupLink = document.querySelector("form .signup-link a");
        signupBtn.onclick = (()=>{
          loginForm.style.marginLeft = "-50%";
          loginText.style.marginLeft = "-50%";
        });
        loginBtn.onclick = (()=>{
          loginForm.style.marginLeft = "0%";
          loginText.style.marginLeft = "0%";
        });
        signupLink.onclick = (()=>{
          signupBtn.click();
          return false;
        });
      </script>


      <script>
        if (flag == 1) {
          document.getElementById('no-valid-data').style.color = 'red';
          document.getElementById('no-valid-data').innerHTML = 'Los datos no coinciden intenta de nuevo';  
        } else if(flag == 0) {
          document.getElementById('no-valid-data').innerHTML = '';
        }

        if (flagEmailExist == 1) {
          document.getElementById('no-valid').style.color = 'red';
          document.getElementById('no-valid').innerHTML = 'La cuanta ya existe intenta con otra'; 
        } else {
          document.getElementById('no-valid').innerHTML = ''; 
        }
      </script>
      
</body>
</html>