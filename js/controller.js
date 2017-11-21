// JavaScript Document
var myApp = angular.module('myApp', []);

myApp.controller('MyController', ['$scope', '$http', function($scope, $http){
	$http.get('http://10.12.39.30/zforms/json.php').success(function(data){
		
		$scope.artists = data;
		
	}]);
});