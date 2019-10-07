app.controller('employeesController', function($scope, $http, API_URL) {
    $http({
        method: 'GET',
        url: API_URL + "employees"
    }).then(function(response) {
            $scope.employees = response.data;
            console.log(response);
    });

    $scope.toggle = function (modalstate, id) {
        $scope.modalstate = modalstate;
        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Employee";
                $scope.employee = {};
                break;
            case 'edit':
                $scope.form_title = "Employee Detail";
                $scope.id = id;
                $http({
                    method: 'GET',
                    url: API_URL + 'employees/' + id
                }).then(function (response){
                        console.log(response);
                        $scope.employee = response.data;
                    });
                break;
            default:
                break;
        }
        console.log(id);
        $('#myModal').modal('show');
    };
    //save record
    $scope.save = function(modalstate, id) {
        var url = API_URL + "employees";
        if(modalstate === 'edit') {
            url += "/" + id;
        }
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.employee),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(response) {
            console.log(response);
            location.reload();
        }), function(error){
            console.log(response);
            alert('Error');
        }
    };

    //delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure?');
        if(isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'employees/' + id
            }).then(function(data){
                console.log(data);
                location.reload();
            }), function(error) {
                console.log(data);
                alert('unable to delete');
            }
        } else {
            return false;
        }
    };

    $scope.resetForm = function() {
        $scope.employee = {};
    }
});