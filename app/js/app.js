var app = angular.module("App", ["ngRoute"]);

app.config(function ($routeProvider) {
  $routeProvider

    .when("/", {
      templateUrl: "pages/index.html",
      controller: "IndexController",
    })

    .when("/donar", {
      templateUrl: "pages/donar.html",
      controller: "FirstController",
    })

    .when("/donaciones", {
      templateUrl: "pages/donaciones.html",
      controller: "SecondController",
    })

    .when("/configuracion", {
      templateUrl: "pages/configuracion.html",
      controller: "ThirdController",
    })

    .when("/mis-apoyos", {
      templateUrl: "pages/mis-apoyos.html",
      controller: "MisApoyosController",
    })

    .when("/programming", {
      templateUrl: "pages/programming.html",
      controller: "ProgrammingController",
    })
    .otherwise({ redirectTo: "/" });
});
app.controller("IndexController", function ($scope) {
  $scope.message = "Hello from FirstController";
});

app.controller("FirstController", function ($scope) {
  $scope.message = "Hello from FirstController";
});

app.controller("SecondController", function ($scope) {
  $scope.message = "Hello from SecondController";
});

app.controller("ThirdController", function ($scope) {
  $scope.message = "Hello from ThirdController";
});

app.controller("MisApoyosController", function ($scope) {
  $scope.message = "Hello from ThirdController";
});

app.controller("ProgrammingController", function ($scope) {
  $scope.message = "Hello from ThirdController";
});