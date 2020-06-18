/**
 * Created by Atin on 15-01-2017.
 */
var app = angular.module('userApp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});