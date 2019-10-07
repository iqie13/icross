app.controller('icrossController', function($scope, $http, API_URL) {
    $http({
        method: 'GET',
        url: API_URL + "directions"
    }).then(function(response) {
            $scope.icross = response.data;
            console.log(response.data);
    });
});