app.controller('trueController', function ($scope, $http, API_URL) {
    $http({
        method: 'GET',
        url: API_URL + "truefalse",
    }).then(function (response) {
        document.getElementById("petunjuk").innerHTML = response.data.instructions;
        $scope.truefalse = response.data;
        console.log(response);
    });
});