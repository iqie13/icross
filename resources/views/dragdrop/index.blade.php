@extends('layouts.angular')

@section('content')
<div class="container" ng-app="employeeRecords" ng-controller="dragdropController">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @{{dragdrop.designParamiter.title}}
                </div>
                <div id="dragdropcard" class="card-body">
                    <div id="opening" class="row">
                        <div id="petunjuk" class="memorybox text-left">
                        </div>
                    </div>
                    <div id="btn-opening" class="row">
                        <div class="" style="position: relative; left: 45%;">
                            <a href="#" id="btn-start" class="btn btn-raised btn-success mb-3">
                                @{{dragdrop.language.start}}
                            </a>
                        </div>
                    </div>
                    <div id="contentbody" class="row">
                        <div class="col-4" ng-repeat="(index, quest) in dragdrop.data">
                            <div class="card mb-1">
                                <div class="card-header">
                                    @{{quest.questiondata.question}}
                                </div>
                                <div class="card-body">
                                </div>
                            </div>
                        </div>
                        <div class="" ng-repeat="(index, ans) in answerDataCustom">
                            <div class="btn btn-info btn-draggable" data-drag="true" data-jqyoui-options="{revert: 'invalid'}" ng-model="list5">@{{ans.answer}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection