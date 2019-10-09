@extends('layouts.angular')

@section('content')
<div class="container" ng-app="employeeRecords" ng-controller="trueController">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @{{truefalse.designParamiter.title}}
                </div>
                <div class="card-body" style="background-image: url('http://dev.id.extramarks.com/template/emAssessment/image/bg_new.jpg');">
                    <div id="petunjuk" class="text-left">
                    </div>

                    <a href="#" id="btn-start" class="btn btn-raised btn-outline-primary mb-3">
                        @{{truefalse.language.start}}
                    </a>

                    {{--  <div id="soal" class="row">
                        <div class="col-6">
                            <div ng-repeat = "quest in question" class="mb-1">
                                <a href="#" class="btn btn-raised btn-outline-info">
                                    @{{quest.question}}
                                </a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div ng-repeat = "answ in answer" class="mb-1">
                                <a href="#" class="btn btn-raised btn-outline-info">
                                    @{{answ.answertext}}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <a href="#" id="btn-submit" class="btn btn-raised btn-outline-success mb-3" style="display: none">
                            @{{icross.language.submit}}
                        </a>
                    </div>
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection