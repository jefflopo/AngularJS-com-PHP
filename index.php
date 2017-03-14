<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Clientes</title>
  
  <script src="//code.angularjs.org/snapshot/angular.min.js"></script>
  

  
</head>
<body ng-app="formCadClientes">
    <div ng-controller="CadClientesCtrl">
    <form novalidate class="simple-form">
        <label>Nome: <input type="text" ng-model="user.name" /></label><br />
        <label>Tipo de Cliente: 
            <select class="form-control"ng-model="user.tipoClientes" 
                  ng-options="tipoCliente.tipo group by tipoCliente.local for tipoCliente in tipoClientes"
                  ng-required="true">
                <option value="">Selecione o Tipo de Cliente</option>
            </select>
        </label><br />
        <label>Data de Cadastro: <input type="datetime-local" ng-model="user.data" /></label><br />
        <label>E-mail: <input type="email" ng-model="user.email" /></label><br />

        Best Editor: <label><input type="radio" ng-model="user.preference" value="vi" />vi</label>
        <label><input type="radio" ng-model="user.preference" value="emacs" />emacs</label><br />
        <input type="button" ng-click="reset()" value="Reset" />
        <input type="submit" ng-click="update(user)" value="Save" />
    </form>
    <pre>user = {{user | json}}</pre>
    <pre>master = {{master | json}}</pre>
  </div>

<script>
  angular.module('formCadClientes', [])
    .controller('CadClientesCtrl', ['$scope', function($scope) {
        $scope.app = "Cadastro de |Clientes";
        $scope.tipoClientes = [
          {tipo: "Pessoa Física", local: "Nacional"},  
          {tipo: "Pessoa Jurídica", local: "Nacional"},
          {tipo: "Sócios", local: "Nacional"},
          {tipo: "Exportador", local: "Internacional"},
          {tipo: "Importador", local: "Internacional"}
        ];
        $scope.master = {};

        $scope.update = function(user) {
          $scope.master = angular.copy(user);
        };

        $scope.reset = function() {
          $scope.user = angular.copy($scope.master);
        };

        $scope.reset();
    }]);
</script>
</body>
</html>

<!-- 
Copyright 2017 Google Inc. All Rights Reserved.
Use of this source code is governed by an MIT-style license that
can be found in the LICENSE file at http://angular.io/license
-->
