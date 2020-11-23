document.getElementById("cerra-menu").style.display = "none";
const btnToggle = document.querySelector(".toggle-btn");

btnToggle.addEventListener("click", function () {
  document.getElementById("sidebar").classList.toggle("active");
  if (document.getElementById("abre-menu").style.display == "none") {
    document.getElementById("abre-menu").style.display = "block";
    document.getElementById("cerra-menu").style.display = "none";
  } else {
    document.getElementById("abre-menu").style.display = "none";
    document.getElementById("cerra-menu").style.display = "block";
  }
});

try {
  document.getElementById("donar").addEventListener("click", donarButtomState);

  document
    .getElementById("donaciones")
    .addEventListener("click", donacionesButtomState);
  document
    .getElementById("configuracion")
    .addEventListener("click", configButtomState);

  function donarButtomState() {
    document.getElementById("donar").style.backgroundColor =
      "rgba(0, 0, 0, 0.2)";
    document.getElementById("donaciones").style.backgroundColor = null;
    document.getElementById("configuracion").style.backgroundColor = null;
  }
  function donacionesButtomState() {
    document.getElementById("donaciones").style.backgroundColor =
      "rgba(0, 0, 0, 0.2)";
    document.getElementById("donar").style.backgroundColor = null;
    document.getElementById("configuracion").style.backgroundColor = null;
  }
  function configButtomState() {
    document.getElementById("configuracion").style.backgroundColor =
      "rgba(0, 0, 0, 0.2)";
    document.getElementById("donaciones").style.backgroundColor = null;
    document.getElementById("donar").style.backgroundColor = null;
  }
} catch (error) {}

try {
  document
    .getElementById("mis-apoyos")
    .addEventListener("click", misApoyosButtonState);

  document
    .getElementById("configuracion")
    .addEventListener("click", configBeneficiarioButtonState);

  document
    .getElementById("programming")
    .addEventListener("click", configButtomProgramming);

  function misApoyosButtonState() {
    document.getElementById("mis-apoyos").style.backgroundColor =
      "rgba(0, 0, 0, 0.2)";
    document.getElementById("configuracion").style.backgroundColor = null;
    document.getElementById("programming").style.backgroundColor = null;
  }

  function configBeneficiarioButtonState() {
    document.getElementById("configuracion").style.backgroundColor =
      "rgba(0, 0, 0, 0.2)";
    document.getElementById("mis-apoyos").style.backgroundColor = null;
    document.getElementById("programming").style.backgroundColor = null;
  }

  function configButtomProgramming() {
    document.getElementById("programming").style.backgroundColor =
      "rgba(0, 0, 0, 0.2)";
    document.getElementById("mis-apoyos").style.backgroundColor = null;
    document.getElementById("configuracion").style.backgroundColor = null;
  }
} catch (error) {}
