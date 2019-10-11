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
        var no = 0;
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
            // console.log(data, index)
            myAnswerRight = data.rightanswerId
            document.getElementById("btnQuest"+data.index).disabled = true;
            $('.answer').prop({disabled:false})
            $('#btnQuest'+data.index).addClass("btn-primary")
            $('#btnQuest'+data.index).removeClass("btn-light")

        }

        $scope.clickAnswer = function (data, index) {
            // if (data.rightanswerId == myAnswerRight) {
                // var index = myAnswer.question.indexOf(myAnswerRight);
                console.log(myAnswer)
                $('#numQuest'+data.index).html(" ("+myAnswerRight+")")
                $('#btn'+data.index).addClass("btn-primary")
                $('#btn'+data.index).removeClass("btn-light")
                $('.answer').prop({disabled:true})
                myAnswer.push({'question': myAnswerRight,'answer':data.rightanswerId})
            // } else {
            //     myAnswer.push({index: 0})
            // }

            console.log(myAnswer)
        }

        $scope.submit = function () {
            // console.log(myAnswer)
            if(myAnswer.length < 5) {
                alert('Please complete your task.')
            } else {
                myAnswer.forEach((element, index) => {
                    console.log(element)
                    if (element.question != element.answer) {
                        $('.r-' + element.answer).hide()
                        $('.w-' + element.answer).show()
                    } else {
                        $('.r-' + element.answer).show()
                        $('.w-' + element.answer).hide()
                    }
                })
            }
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
