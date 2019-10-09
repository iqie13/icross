$('#soal').hide()
$('#answer').hide()

app.controller('trueController', function ($scope, $http, API_URL) {
    $http({
        method: 'GET',
        url: API_URL + "truefalse",
    }).then(function (response) {
        document.getElementById("petunjuk").innerHTML = response.data.instructions;

        $("#btn-start").click(function () {
            $('#soal').show()
            $('#btn-submit').show()
            $('#petunjuk').hide()
            $('#btn-start').hide()
        });

        $("#btn-submit").click(function () {
            $('#soal').hide()
            $('#btn-submit').hide()
            $('#petunjuk').hide()
            $('#btn-start').hide()
            $('#answer').show()
        });

        $scope.try = 0;
        $scope.nottry = 0;
        $scope.rightAnswer = 0;
        $scope.wrongAnswer = 0;
        $scope.truefalse = response.data;
        console.log(response);

        var answered = []

        $scope.truefalse.data.forEach((element, index) => {
            answered[index] = false
        });

        $scope.answered = [...answered]
        var rightAnswer = []
        var wrongAnswer = []
        var hint = []
        $scope.checkAnswer = function (answer, answerid, index, ind) {
            if (answer == answerid) {
                rightAnswer.push(true)
                $('.ans-' + index + ind).removeClass('btn-primary')
                $('.ans-' + index + ind).addClass('btn-success')
            } else {
                wrongAnswer.push(false)
                $('.ans-' + index + ind).removeClass('btn-primary')
                $('.ans-' + index + ind).addClass('btn-danger')
            }
            hint.push(true)
            $scope.try = hint.length
            $scope.nottry = $scope.truefalse.data.length - hint.length
            $scope.answered[index] = true
            if ((rightAnswer.length + wrongAnswer.length) != $scope.truefalse.data.length) {
                $scope.rightAnswer = rightAnswer.length
                $scope.wrongAnswer = $scope.truefalse.data.length - rightAnswer.length
            }
        }

        $scope.submit = function () {
            // console.log($scope.wrongAnswer)
            $scope.percentageRight = ($scope.rightAnswer / $scope.truefalse.data.length) * 100
            $scope.percentageWrong = ($scope.wrongAnswer / $scope.truefalse.data.length) * 100
            $scope.labelsChart = ["Benar (%)", "Salah (%)"];
            $scope.dataChart = [$scope.percentageRight, $scope.percentageWrong];
            $scope.colours = ["#04A334","#E41208"]
        }
    });
});