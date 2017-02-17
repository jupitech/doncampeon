/*AngularJS*/
var dApp= angular.module('dApp', ['ngRoute', 'ngCookies','ngAnimate','ngResource', 'ngSanitize','ui.bootstrap','angularMoment','nya.bootstrap.select','angularLazyImg','ngPrint','angular-button-spinner','angular.filter','infinite-scroll']);

/*dApp.directive('highcharts', function () {
return {
    restrict: 'E',
    template: '<div></div>',
    replace: true,

    link: function (scope, element, attrs) {

        scope.$watch(function () { return attrs.chart; }, function () {

            if (!attrs.chart) return;

            var charts = JSON.parse(attrs.chart);

            $(element[0]).highcharts(charts);

        });
    }
};
});*/