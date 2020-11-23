var app = angular.module("App", ["ngRoute"]);

app.config(function ($routeProvider) {
  $routeProvider

    .when("/", {
      templateUrl: "pages/establecimiento.html",
      controller: "EstablecimientoController",
    })

    .when("/asociacion", {
      templateUrl: "pages/asociacion.html",
      controller: "AsociacionController",
    })
    .otherwise({ redirectTo: "/" });
});
app.controller("EstablecimientoController", function ($scope) {
  $scope.message = "Hello from EstablecimientoController";
});

app.controller("AsociacionController", function ($scope) {
  $scope.message = "Hello from AsociacionController";
});
