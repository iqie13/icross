@extends('layouts.angular')

@section('content')
<div class="container" ng-app="employeeRecords" ng-controller="icrossController">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @{{icross.designParamiter.title}}
                </div>
                <div id="memorycard" class="card-body">
                    <div id="petunjuk" class="memorybox text-left">
                    </div>

                    <div style="text-align: center">
                    <a href="#" id="btn-start" class="btn btn-raised btn-success mb-3">
                        @{{icross.language.start}}
                    </a>
                    </div>

                    <div id="soal" class="row">
                        <div class="col-5" style="text-align: right">
                            <div ng-repeat="(index, quest) in question" class="mb-1">
                                <a href="#" class="btn btn-raised btn-light" ng-click="clickQuestion(quest, index)">
                                    @{{quest.question}}
                                </a>
                            </div>
                        </div>
                        <div class="col-3"></div>
                        <div class="col-4">
                            <div class="mb-1" ng-repeat="(index, answ) in answer">
                                <a href="#" class="btn btn-raised btn-light" ng-click="clickAnswer(answ, index)">
                                    @{{answ.answertext}}
                                </a>
                                <img ng-class="['r-' + index]" class="right-answer" src="http://dev.id.extramarks.com/template/emAssessment/image/tick.png" style="display: none">
                                <img ng-class="['w-' + index]" class="wrong-answer" src="http://dev.id.extramarks.com/template/emAssessment/image/wrong.png" style="display: none">
                            </div>
                        </div>
                    </div>
                    <div style="text-align: center">
                        <a href="#" id="btn-submit" class="btn btn-raised btn-success mb-3" ng-click="submit()" style="display: none">
                            @{{icross.language.submit}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection