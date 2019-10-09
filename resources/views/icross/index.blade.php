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
                            <div ng-repeat = "quest in question" class="mb-1">
                                <a href="#" class="btn btn-raised btn-light">
                                    @{{quest.question}}
                                </a>
                            </div>
                        </div>
                        <div class="col-3"></div>
                        <div class="col-4">
                            <div ng-repeat = "answ in answer" class="mb-1">
                                <a href="#" class="btn btn-raised btn-light">
                                    @{{answ.answertext}}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div style="text-align: center">
                        <a href="#" id="btn-submit" class="btn btn-raised btn-success mb-3" style="display: none">
                            @{{icross.language.submit}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection