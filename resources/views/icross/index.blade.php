@extends('layouts.angular')

@section('content')
<div class="container" ng-app="employeeRecords" ng-controller="icrossController">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @{{icross.designParamiter.title}}
                </div>
                <div class="card-body">
                    <div id="petunjuk" class="text-left">
                    </div>

                    <a href="#" id="btn" class="btn btn-raised btn-outline-primary mb-3">
                        @{{icross.language.start}}
                    </a>

                    <div id="soal" class="row">
                        <div class="col-6">
                            <div ng-repeat = "ic in icross.data | orderBy" class="mb-1">
                                <a href="#" class="btn btn-raised btn-outline-info">
                                    @{{ic.questiondata.question}}
                                </a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div ng-repeat = "ic in icross.data | orderBy: 'optiontext'" class="mb-1">
                                <a href="#" class="btn btn-raised btn-outline-info">
                                    @{{ic.optiondata.options[0].optiontext}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection