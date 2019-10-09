app.controller('icrossController', function ($scope, $http, API_URL) {
    $http({
        method: 'GET',
        url: API_URL + "directions"
    }).then(function (response) {
        document.getElementById("petunjuk").innerHTML = response.data.instructions;

        $('#soal').hide()

        $("#btn-start").click(function () {
            // $("#soal").toggle(function () {
            //     // Animation complete.
            //     $('#petunjuk').hide()
            // });
            $('#soal').show()
            $('#btn-submit').show()
            $('#petunjuk').hide()
            $('#btn-start').hide()
            $('#memorycard').css({
                "background-image": "url('http://dev.id.extramarks.com/template/emAssessment/image/mcPuzel-background.jpg')",
                "background-repeat": "no-repeat",
                "background-size": "cover"
            })
        });


        var forAnswer = [];
        var forQuestion = [];
        $scope.icross = response.data;
        response.data.data.forEach(element => {
            // console.log(element);
            forAnswer.push({"question":element.questiondata.question, "rightanswerId": element.rightanswerdata.rightanswer[0].answerid});
            forQuestion.push({"answerid":element.optiondata.options[0].optiontext, "answertext":element.optiondata.options[0].optiontext});
        });
        $scope.question = shuffleArray1(forAnswer);
        $scope.answer = shuffleArray2(forQuestion);
        console.log(forAnswer);
    });
});

function shuffleArray1(array){
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
    // console.log(array);
    return array;
}
function shuffleArray2(array){
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * 5);
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
    // console.log(array);
    return array;
}
