@extends('layouts.angular')

@section('content')
<div class="container" ng-app="employeeRecords" ng-controller="trueController">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @{{truefalse.designParamiter.title}}
                </div>
                <div class="card-body" style="background-image: url('http://dev.id.extramarks.com/template/emAssessment/image/bg_new.jpg'); background-size: cover;">
                    <div class="row">
                        <div class="col-12">
                            <div id="petunjuk" class="text-left">
                            </div>
                        </div>
    
                        <div class="col-12" style="text-align: center">
                            <a href="#" id="btn-start" class="btn btn-raised btn-primary mb-3">
                                @{{truefalse.language.start}}
                            </a>
                        </div>
                    </div>

                    <div id="soal" class="row">
                        <div class="col-12">
                            <div class="card mb-1" ng-repeat="(index, quest) in truefalse.data">
                                <div class="card-header">
                                    <span class="badge badge-primary">@{{quest.questiondata.questionid}}/@{{quest.questiondata.numQuestions}}</span> @{{quest.questiondata.question}}
                                </div>
                                <div class="card-body" ng-repeat="(ind, ans) in quest.optiondata.options">
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="button" class="btn btn-primary" ng-disabled="answered[index]" ng-class="['ans-' + index + ind]" ng-click="checkAnswer(ans.optionid, quest.rightanswerdata.rightanswer[0].answerid, index, ind)">
                                                @{{ans.optiontext}}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <!-- <div class="col-4">
                                    &nbsp;
                                </div> -->
                                <div class="col-12" style="text-align: center">
                                    <a href="#" id="btn-submit" ng-click="submit()" class="btn btn-raised btn-primary">
                                        @{{truefalse.language.submit}}
                                    </a>
                                </div>
                                <!-- <div class="col-4">
                                    &nbsp;
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div id="answer" class="row">
                        <div class="col-12 mb-1">
                            <div class="card">
                                <div class="card-header">
                                    @{{truefalse.language.shortreport}}
                                </div>
                                <div class="card-body">
                                    <div class="col-6">
                                        <div class="row">
                                            <span class="badge badge-secondary col-12 py-2 mb-2">
                                                <div class="row">
                                                    <span class="col-6" style="text-align: left">
                                                    @{{truefalse.language.totalQuestions}}
                                                    </span>
                                                    <span class="col-6" style="text-align: right">
                                                        @{{truefalse.data.length}}
                                                    </span>
                                                </div>
                                            </span>
                                            <span class="badge badge-secondary col-12 py-2 mb-2">
                                                <div class="row">
                                                    <span class="col-6" style="text-align: left">
                                                    @{{truefalse.language.totalAttempted}}
                                                    </span>
                                                    <span class="col-6" style="text-align: right">
                                                        @{{try}}
                                                    </span>
                                                </div>
                                            </span>
                                            <span class="badge badge-secondary col-12 py-2 mb-2">
                                                <div class="row">
                                                    <span class="col-6" style="text-align: left">
                                                    @{{truefalse.language.totalSkippedAnswers}}
                                                    </span>
                                                    <span class="col-6" style="text-align: right">
                                                        @{{nottry}}
                                                    </span>
                                                </div>
                                            </span>
                                            <span class="badge badge-secondary col-12 py-2 mb-2">
                                                <div class="row">
                                                    <span class="col-6" style="text-align: left">
                                                    @{{truefalse.language.totalRightAnswers}}
                                                    </span>
                                                    <span class="col-6" style="text-align: right">
                                                        @{{rightAnswer}}
                                                    </span>
                                                </div>
                                            </span>
                                            <span class="badge badge-secondary col-12 py-2 mb-2">
                                                <div class="row">
                                                    <span class="col-6" style="text-align: left">
                                                    @{{truefalse.language.totalwrong}}
                                                    </span>
                                                    <span class="col-6" style="text-align: right">
                                                        @{{wrongAnswer}}
                                                    </span>
                                                </div>
                                            </span>
                                            <span class="badge badge-secondary col-12 py-2 mb-2">
                                                <div class="row">
                                                    <span class="col-6" style="text-align: left">
                                                    @{{truefalse.language.percentage}}
                                                    </span>
                                                    <span class="col-6" style="text-align: right">
                                                        @{{percentageRight | number:2}}%
                                                    </span>
                                                </div>
                                            </span>

                                        </div>
                                    </div>
                                    <div class="col-6">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-1">
                            <div class="card">
                                <div class="card-header">
                                    @{{truefalse.language.detailreport}}
                                </div>
                                <div class="card-body">
                                    <div class="row"  ng-repeat="(index, quest) in truefalse.data">
                                        <div class="card-body mb-1" style="background-color: darkgrey; border-radius: .25rem">
                                            <div class="row" >
                                                <div class="col-6 mb-2">
                                                    Pertanyaanmu
                                                </div>
                                                <div class="col-6 mb-2">
                                                    @{{quest.questiondata.question}}
                                                </div>
                                                <div class="col-6 mb-2">
                                                    Jawabanmu
                                                </div>
                                                <div class="col-6 mb-2" ng-class="['my-' + index]">
                                                    @{{myAnswer[index]}}
                                                </div>
                                                <div class="col-6 mb-2">
                                                    jawaban yang benar
                                                </div>
                                                <div class="col-6 mb-2" style="color: yellow">
                                                    @{{quest.rightanswerdata.rightanswer[0].answer}}
                                                </div>
                                            </div>

                                        </div>
                                        <!-- <span class="badge badge-secondary col-12 py-2 mb-2" style="text-align: left">
                                        </span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection