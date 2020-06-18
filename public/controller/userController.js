/**
 * Created by Atin on 15-01-2017.
 */
app.controller('userController', function($scope, $http) {

    $scope.users = [];
    $scope.loading = false;

    $scope.init = function() {
        $scope.loading = true;
        $http.get('/api/v1/listUser').
        success(function(data, status, headers, config) {
            $scope.users = data;
            $scope.loading = false;

        });
    };

    $scope.$watch('searchUser',function(val){
        $scope.loading = true;
        $http.get('/api/v1/listUser'+'?search_string='+val).
        success(function(data, status, headers, config) {
            $scope.users = data.data;
            $scope.users_count = data.count;
            $scope.loading = false;

        });
    });


    //$scope.init();

});
