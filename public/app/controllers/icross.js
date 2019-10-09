app.controller('icrossController', function ($scope, $http, API_URL) {
    $http({
        method: 'GET',
        url: API_URL + "directions"
    }).then(function (response) {
        document.getElementById("petunjuk").innerHTML = response.data.instructions;

        $('#soal').hide()
        
        $("#btn-start").click(function () {
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
        console.log(response.data)
        response.data.data.forEach((element, index) => {
            // console.log(element);
            // forAnswer.push({ "question": element.questiondata.question, "rightanswerId": element.rightanswerdata.rightanswer[0].answerid });
            // forQuestion.push({ "answerid": element.optiondata.options[0].optiontext, "answertext": element.optiondata.options[0].optiontext });
            forQuestion.push({ "question": element.questiondata.question, "questionid": element.questiondata.questionid, index: index, "rightanswerId": element.rightanswerdata.rightanswer[0].answerid });
            forAnswer.push({ "answerid": element.optiondata.options[0].optionid, "answertext": element.optiondata.options[0].optiontext, index: index, "rightanswerId": element.rightanswerdata.rightanswer[0].answerid });
        });
        $scope.question = shuffleArray1(forQuestion);
        $scope.answer = shuffleArray2(forAnswer);
        // console.log(forAnswer);
        var myAnswerRight = 0
        var myAnswer = []
        $scope.clickQuestion = function (data, index) {
            console.log(data, index)
            myAnswerRight = data.rightanswerId
        }

        $scope.clickAnswer = function (data, index) {
            myAnswer.splice(index, 1)
            if (data.rightanswerId == myAnswerRight) {
                console.log(data, index)
                myAnswer[index] = data.rightanswerId
            } else {
                myAnswer[index] = 0
            }
        }

        $scope.submit = function () {
            console.log(myAnswer)
            myAnswer.forEach((element, index) => {
                if (element == 0) {
                    $('.r-' + index).hide()
                    $('.w-' + index).show()
                } else {
                    $('.r-' + index).show()
                    $('.w-' + index).hide()
                }
            })
        }
    });
});

function shuffleArray1(array) {
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
    // console.log(array);
    return array;
}
function shuffleArray2(array) {
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * 5);
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
    // console.log(array);
    return array;
}
