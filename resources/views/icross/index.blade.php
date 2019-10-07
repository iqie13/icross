@extends('layouts.angular')

@section('content')
<div class="container-fluid" ng-app="employeeRecords" ng-controller="icrossController">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Playing
                </div>
                <div class="card-body">
                    <div ng-repeat = "ic in icross">
                        @{{ic.question}}<br />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection