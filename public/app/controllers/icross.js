app.controller('icrossController', function ($scope, $http, API_URL) {
    $http({
        method: 'GET',
        url: API_URL + "directions"
    }).then(function (response) {
        document.getElementById("petunjuk").innerHTML = response.data.instructions;

        $('#soal').hide()

        $("#btn").click(function () {
            // $("#soal").toggle(function () {
            //     // Animation complete.
            //     $('#petunjuk').hide()
            // });
            $('#soal').show()
            $('#petunjuk').hide()
            $('#btn').hide()
        });



        $scope.icross = response.data;
        console.log(response.data);
    });
});