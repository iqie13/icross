@extends('layouts.angular')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Employee</li>
  </ol>
</nav>
<div class="container-fluid" ng-app="employeeRecords" ng-controller="employeesController">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Employee Module
                    <button id="btn-add" class="btn btn-primary btn-sm" style="float:right" ng-click="toggle('add', 0)">Add</button>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Position</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="employee in employees">
                                <td>@{{$index}}</td>
                                <td>@{{employee.name}}</td>
                                <td>@{{employee.email}}</td>
                                <td>@{{employee.phone_number}}</td>
                                <td>@{{employee.position}}</td>
                                <td>
                                    <button id="btn-edit" class="btn btn-info btn-sm" ng-click="toggle('edit', employee.id)">Detail</button>
                                    <button id="btn-delete" class="btn btn-danger btn-sm" ng-click="confirmDelete(employee.id)">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">@{{form_title}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                    </div>
                    <div class="modal-body">
                        <form id="frmEmployee" name="frmEmployee" class="form-horizontal" novalidate="">
                            <div class="form-group row error">
                                <label for="name" class="col-sm-4 col-form-label">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" name="name" class="form-control has-error" id="name" placeholder="Name" ng-model="employee.name" ng-required="true" value="@{{name}}">
                                    <span class="help-inline" ng-show="frmEmployee.name.$invalid && frmEmployee.name.$touched">Name is required</span>
                                </div>
                            </div>

                            <div class="form-group row error">
                                <label for="email" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="text" name="email" class="form-control has-error" id="email" placeholder="Email" ng-model="employee.email" ng-required="true" value="@{{email}}">
                                    <span class="help-inline" ng-show="frmEmployee.email.$invalid && frmEmployee.email.$touched">Email is required</span>
                                </div>
                            </div>

                            <div class="form-group row error">
                                <label for="phone_number" class="col-sm-4 col-form-label">Phone Number</label>
                                <div class="col-sm-8">
                                    <input type="text" name="phone_number" class="form-control has-error" id="phone_number" placeholder="Phone Number" ng-model="employee.phone_number" ng-required="true" value="@{{phone_number}}">
                                    <span class="help-inline" ng-show="frmEmployee.phone_number.$invalid && frmEmployee.phone_number.$touched">Phone Number is required</span>
                                </div>
                            </div>

                            <div class="form-group row error">
                                <label for="position" class="col-sm-4 col-form-label">Position</label>
                                <div class="col-sm-8">
                                    <input type="text" name="position" class="form-control has-error" id="position" placeholder="Position" ng-model="employee.position" ng-required="true" value="@{{position}}">
                                    <span class="help-inline" ng-show="frmEmployee.position.$invalid && frmEmployee.position.$touched">Position is required</span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmEmployee.$invalid">Save</button>
                        <button class="btn btn-danger" id="btn-reset" ng-click="resetForm()">Reset</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection