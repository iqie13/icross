$('#contentbody').hide()

app.controller('dragdropController', function ($scope, $http, API_URL) {
    $http({
        method: 'GET',
        url: API_URL + "dragdrop",
    }).then(function (response) {
        // console.log(response)
        document.getElementById("petunjuk").innerHTML = response.data.instructions;
        $scope.dragdrop = response.data;

        $("#btn-start").click(function () {
            $('#contentbody').show()
            $('#opening').hide()
            $('#btn-opening').hide()
        });

        var answerData = [];
        response.data.data.forEach(element => {
            // console.log(element)
            element.rightanswerdata.rightanswer.forEach(ele => {
                answerData.push(ele)
            });
        });
        $scope.answerDataCustom = answerData;
    });
});