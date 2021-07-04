<?php
   include_once "./iheader.php";
   ?>
<div ng-app="myApp">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Students
            <small>Manage</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/pages/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Students</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content" ng-controller="eventCtrl" id="eventCtrl">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <!--<div class="col-lg-2 col-xs-6">
             small box 
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>150</h3>
            
                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>-->
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $dashboard->Studentscount; ?></h3>
                        <p>Students</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-calendar-plus"></i>
                    </div>

                    <div align="center" style="col-sm-6">
                        <a class="btn btn-app bg-green" data-toggle="modal" data-target="#modal-create">
                            <i class="fa fa-plus"></i>Add
                        </a>
                        <a class="btn btn-app bg-green" data-toggle="modal" data-target="#modal-upload">
                            <i class="fa fa-upload"></i>Upload
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="box box-default box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Search Students</h3>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="">
                        <form id="form_select" name="form_event_filter" class="appnitro" role="form" method="post"
                            ng-submit="showStudents()">
                            <div class="form-group">
                                <label for="Event Name">Event Name</label>
                                <Select type="text" class="form-control" id="selecteventid" placeholder="Event Name"
                                    name="selecteventid" ng-model="selecteventid">
                                    <option value="">==Select an Event==</option>
                                    <option ng-repeat="event in events" value="{{event.eventid}}">
                                        {{event.eventname}}
                                    </option>
                                </Select>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Show Students"></input>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>

        </div>
        <!-- /.row -->
        <div class="row">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Students</h3>
                    <div cg-busy="myPromise"></div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="student-table" class="table table-bordered table-striped dataTable" datatable="ng"
                        dt-options="dtOptions" dt-instance="dtInstance">
                        <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Student Name</th>
                                <th>Institute</th>
                                <th>State</th>
                                <th>Email</th>
                                <th>Event Name</th>
                                <th>Registration ID</th>
                                <th>Course Name</th>
                                <th>Course Duration</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr ng-repeat="student in students" repeat-done="initDataTable">
                                <td>{{$index+1}}</td>
                                <td>{{student.studentname}}</td>
                                <td>{{student.institute}}</td>
                                <td>{{student.state}}</td>
                                <td>{{student.email}}</td>
                                <td>{{student.eventname}}</td>
                                <td>{{student.regdid}}</td>
                                <td>{{student.coursename}}</td>
                                <td>{{student.duration}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-default" ng-click="student_edit($index)"
                                            data-toggle="modal" data-target="#modal-edit">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn btn-default" ng-click="student_delete($index)"
                                            data-toggle="modal" data-target="#modal-delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>

            <div class="modal fade" id="modal-edit" style="display: none;" class="box box-primary">
                <div class="modal-dialog">
                    <form id="form_edit" name="form_edit" class="appnitro" role="form" method="post"
                        action="/pages/students/update.php">
                        <input type="hidden" ng-value="editsid" name="editsid" id="editsid">
                        <div class="modal-content">
                            <div class="modal-header box-header with-border">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Edit Student Details</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="First Name">First Name</label>
                                    <input type="text" class="form-control" id="editfirstname"
                                        placeholder="Enter firstname of student" name="editfirstname"
                                        ng-model="editfirstname" required>

                                    <span style="color:red"
                                        ng-show="form_edit.editfirstname.$dirty && form_edit.editfirstname.$invalid">
                                        <span ng-show="form_edit.editfirstname.$error.required">Enter First Name to
                                            Continue</span>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="Last Name">Last Name</label>
                                    <input type="text" class="form-control" id="editlastname"
                                        placeholder="Enter lastname of student" name="editlastname"
                                        ng-model="editlastname" required>

                                    <span style="color:red"
                                        ng-show="form_edit.editlastname.$dirty && form_edit.editlastname.$invalid">
                                        <span ng-show="form_edit.lastname.$error.required">Enter First Name to
                                            Continue</span>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input type="text" class="form-control" id="editemail"
                                        placeholder="Enter email of student" name="editemail" ng-model="editemail"
                                        required>

                                    <span style="color:red"
                                        ng-show="form_edit.editemail.$dirty && form_edit.editemail.$invalid">
                                        <span ng-show="form_edit.editemail.$error.required">Enter Email to
                                            Continue</span>
                                        <span ng-show="form_edit.editemail.$error.email">Enter a valid email</span>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="Institute">Institute</label>
                                    <input type="text" class="form-control" id="editinstitute"
                                        placeholder="Enter institute of student" name="editinstitute"
                                        ng-model="editinstitute" required>

                                    <span style="color:red"
                                        ng-show="form_edit.editinstitute.$dirty && form_edit.editinstitute.$invalid">
                                        <span ng-show="form_edit.editinstitute.$error.required">Enter Institute to
                                            Continue</span>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="State">State</label>
                                    <Select type="text" class="form-control" id="editstate"
                                        placeholder="Select State of Student" name="editstate" ng-model="editstate"
                                        required>
                                        <option value="">==Select a State==</option>
                                        <option ng-repeat="state in states" value="{{state.name}}">{{state.name}}
                                        </option>
                                    </Select>
                                    <span style="color:red"
                                        ng-show="form_edit.editstate.$dirty && form_edit.editstate.$invalid">
                                        <span ng-show="form_edit.editstate.$error.required"> State is
                                            required.</span>
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label for="Event Name">Event Name</label>
                                    <Select type="text" class="form-control" id="editeventid" placeholder="Event Name"
                                        name="editeventid" ng-model="editeventid" required>
                                        <option value="">==Select an Event==</option>
                                        <option ng-repeat="event in events" value="{{event.eventid}}">
                                            {{event.eventname}}
                                        </option>
                                    </Select>
                                    <span style="color:red"
                                        ng-show="form_edit.editeventid.$dirty && form_edit.editeventid.$invalid">
                                        <span ng-show="form_edit.editeventid.$error.required">Event selection is
                                            required.</span>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="Registration ID">Registration ID</label>
                                    <input type="text" class="form-control" id="editregdid" placeholder="Registration ID"
                                        name="editregdid" ng-model="editregdid">
                                    </input>
                                </div>
                                <div class="form-group">
                                    <label for="Course Name">Course Name</label>
                                    <input type="text" class="form-control" id="editcoursename" placeholder="Course Name"
                                        name="editcoursename" ng-model="editcoursename">
                                    </input>
                                </div>
                                <div class="form-group">
                                    <label for="Course Duration">Course Duration</label>
                                    <input type="text" class="form-control" id="editduration" placeholder="Course Duration"
                                        name="editduration" ng-model="editduration">
                                    </input>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left"
                                        data-dismiss="modal">Close</button>
                                    <input type="submit" ng-disabled="form_edit.editfirstname.$dirty && form_edit.editfirstname.$invalid ||  
                  form_edit.editlastname.$dirty && form_edit.editlastname.$invalid" class="btn btn-primary"
                                        value="Save Changes"></input>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                    </form>
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
        <div class="modal modal-danger fade" id="modal-delete" style="display: none;" class="box box-primary">
            <div class="modal-dialog">
                <form id="form_delete" name="form_delete" class="appnitro" role="form" method="post"
                    action="/pages/students/delete.php">
                    <input type="hidden" name="deletesid" id="deletesid" ng-value="deletesid">
                    <div class="modal-content">
                        <div class="modal-header box-header with-border">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Delete Student Details</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="Partner Name">Please Confirm Deletion of Student<br /><span
                                        class="box-warning">Student Name: {{studentname}}</span></label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left"
                                    data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" value="Confirm Delete"></input>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                </form>
            </div>
            <!-- /.modal-dialog -->
        </div>
</div>
</section>

<!-- Modal Create Dialog box -->
<div class="modal fade" id="modal-create" style="display: none;" class="box box-primary">
    <div class="modal-dialog">
        <form id="form_add" name="form_add" class="appnitro" role="form" method="post"
            action="/pages/students/create.php" ng-controller="createCtrl">
            <div class="modal-content">
                <div class="modal-header box-header with-border">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Add New Student</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="First Name">First Name</label>
                        <input type="text" class="form-control" id="firstname" placeholder="Enter firstname of student"
                            name="firstname" ng-model="firstname" required>

                        <span style="color:red" ng-show="form_add.firstname.$dirty && form_add.firstname.$invalid">
                            <span ng-show="form_add.firstname.$error.required">Enter First Name to
                                Continue</span>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="Last Name">Last Name</label>
                        <input type="text" class="form-control" id="lastname" placeholder="Enter lastname of student"
                            name="Lastname" ng-model="Lastname" required>

                        <span style="color:red" ng-show="form_add.lastname.$dirty && form_add.lastname.$invalid">
                            <span ng-show="form_add.lastname.$error.required">Enter Last Name to
                                Continue</span>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="Enter email of student"
                            name="email" ng-model="email" required>

                        <span style="color:red" ng-show="form_add.email.$dirty && form_add.email.$invalid">
                            <span ng-show="form_add.email.$error.required">Enter Email to
                                Continue</span>
                            <span ng-show="form_add.email.$error.email">Enter a valid email</span>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="Institute">Institute</label>
                        <input type="text" class="form-control" id="institute" placeholder="Enter institute of student"
                            name="institute" ng-model="institute" required>

                        <span style="color:red" ng-show="form_add.institute.$dirty && form_add.institute.$invalid">
                            <span ng-show="form_add.institute.$error.required">Enter Institute to
                                Continue</span>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="State">State</label>
                        <Select type="text" class="form-control" id="state" placeholder="Select State of Student"
                            name="state" ng-model="state" required>
                            <option value="">==Select a State==</option>
                            <option ng-repeat="state in states" value="{{state.name}}">{{state.name}}</option>
                        </Select>
                        <span style="color:red" ng-show="form_add.state.$dirty && form_add.state.$invalid">
                            <span ng-show="form_add.state.$error.required"> State is
                                required.</span>
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="Event Name">Event Name</label>
                        <Select type="text" class="form-control" id="eventid" placeholder="Event Name" name="eventid"
                            ng-model="eventid" required>
                            <option value="">==Select an Event==</option>
                            <option ng-repeat="event in events" value="{{event.eventid}}">{{event.eventname}}
                            </option>
                        </Select>
                        <span style="color:red" ng-show="form_add.eventid.$dirty && form_add.eventid.$invalid">
                            <span ng-show="form_add.eventid.$error.required">Event selection is
                                required.</span>
                        </span>


                    </div>
                    <div class="form-group">
                        <label for="Registration ID">Registration ID</label>
                        <input type="text" class="form-control" id="regdid" placeholder="Registration ID" name="regdid"
                            ng-model="regdid">
                        </input>
                    </div>
                    <div class="form-group">
                        <label for="Course Name">Course Name</label>
                        <input type="text" class="form-control" id="coursename" placeholder="Course Name"
                            name="coursename" ng-model="coursename">
                        </input>
                    </div>
                    <div class="form-group">
                        <label for="Course Duration">Course Duration</label>
                        <input type="text" class="form-control" id="duration" placeholder="Course Duration"
                            name="duration" ng-model="duration">
                        </input>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <input type="submit" ng-disabled="form_add.firstname.$dirty && form_add.firstname.$invalid ||  
                  form_add.event_website.$dirty && form_add.event_website.$invalid" class="btn btn-primary"
                        value="Save Changes"></input>
                </div>
            </div>
            <!-- /.modal-content -->
        </form>
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-upload" style="display: none;" class="box box-primary">
    <div class="modal-dialog">
        <form id="form_upload" name="form_upload" class="appnitro" role="form" method="post"
            ng-Submit="importStudents()" ng-controller="uploadCtrl">
            <div class="modal-content">
                <div class="modal-header box-header with-border">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Bullk Upload Students</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Event Name">Event Name</label>
                        <Select type="text" class="form-control" id="uploadeventid" placeholder="Event Name"
                            name="uploadeventid" ng-model="uploadeventid" required>
                            <option value="">==Select an Event==</option>
                            <option ng-repeat="event in events" value="{{event.eventid}}">{{event.eventname}}
                            </option>
                        </Select>
                        <span style="color:red"
                            ng-show="form_add.uploadeventid.$dirty && form_add.uploadeventid.$invalid">
                            <span ng-show="form_add.uploadeventid.$error.required">Event selection is
                                required.</span>
                        </span>
                        <div class="form-group">
                            <label for="instruction">Instructions:</label>
                            <label for="instruction">Download the sample csv file, Fill the data and upload. Do not
                                change the column names of the csv file.</label>
                            <button id="downloadsample" name="downloadsample" ng-click="downloadSamplecsv()">Download
                                Sample csv</button>
                        </div>
                        <div class="form-group">
                            <label for="Upload csv">Upload csv file</label>
                            <input type="file" class="form-control" id="csv_file" name="csv_file" accept=".csv"
                                ng-model="csv_file" required>
                            <input type='button' value='Upload' id='upload' ng-click='csv_upload(getjsoncsv)'>
                            <input type="hidden" ng-value="file_upload_success" id="file_upload_success"
                                name="file_upload_success">
                            <label name="filename">{{filename}}</label>
                            <span style="color:red"
                                ng-show="form_add.file_upload_success.$dirty && form_add.file_upload_success.$invalid">
                                <span ng-show="form_add.file_upload_success.$error.required">Upload csv to
                                    Continue</span>
                            </span>
                        </div>
                        <div class="form-group" id="progressbar" name="progressbar" ng-show="saving">
                            <div class="progress active">
                                <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar"
                                    aria-valuenow={{progress}} aria-valuemin="0" aria-valuemax={{totalstudents}}
                                    style={{progressper}}>

                                </div>

                            </div>
                            <span>{{progresstext}}</span>
                            <div class="callout callout-warning" ng-show="errortext"
                                style="white-space: pre-line;max-height: 100px;overflow-y: scroll;">
                                <p>{{errortext}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"
                        ng-click="closeupload()">Close</button>
                    <input type="submit" ng-disabled="form_add.firstname.$dirty && form_add.firstname.$invalid ||  
                  form_add.event_website.$dirty && form_add.event_website.$invalid" class="btn btn-primary"
                        value="Import Students"></input>
                </div>
            </div>
            <!-- /.modal-content -->
        </form>
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.content -->
</div>
<!-- script -->
<script>
var app = angular.module('myApp', ['datatables', 'ngResource', 'ckeditor', 'datatables.buttons', 'cgBusy']);
app.controller('eventCtrl', function($scope, $http, $resource, DTOptionsBuilder) {
    $scope.class = [];
    $scope.outlineeditor = {
        language: 'en',
        allowedContent: true,
        entities: false
    };
    //$scope.dtInstance = {};
    //$scope.loading='<b>Loading Data.. Please wait..</b><i class="fas fa-sync fa-spin"></i>';
    $scope.showStudents = function() {
        $scope.students = {};
        if (!$scope.selecteventid == "") {

            $scope.myPromise = $resource('getstudents.php?eventid=' + $scope.selecteventid).query().$promise
                .then(function(response) {
                    $scope.students = response;
                });
            //$scope.dtInstance.rerender();
        }
    }
    /* $scope.myPromise = $resource('getstudents.php').query().$promise
         .then(function(response) {
             $scope.students = response;
         });*/

    //$scope.loading='';
    $http.get("/lib/states.json")
        .then(function(response) {
            $scope.states = response.data;
        });
    $http.get("/pages/events/getevents.php")
        .then(function(response) {
            $scope.events = response.data;
        });
    $scope.student_edit = function(index) {
        $scope.editeventid = $scope.students[index].eventid;
        $scope.editfirstname = $scope.students[index].firstname;
        $scope.editlastname = $scope.students[index].lastname;
        $scope.editemail = $scope.students[index].email;
        $scope.editinstitute = $scope.students[index].institute;
        $scope.editstate = $scope.students[index].state;
        $scope.editsid = $scope.students[index].sid;
        $scope.editregdid = $scope.students[index].editregdid;
        $scope.editcoursename = $scope.students[index].editcoursename;
        $scope.editduration = $scope.students[index].editduration;
        //outlineeditor.insertHtml($scope.course_outline);
    }
    $scope.student_delete = function(index) {
        $scope.deletesid = $scope.students[index].sid;
        $scope.studentname = $scope.students[index].studentname;
    }

    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withButtons([{
                extend: 'copy',
                text: '<i class="fa fa-files-o"></i> Copy',
                titleAttr: 'Copy'
            },
            {
                extend: 'excel',
                text: '<i class="fa fa-file-text-o"></i> Excel',
                titleAttr: 'Excel'
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print" aria-hidden="true"></i> Print',
                titleAttr: 'Print'
            }
        ]);




});
app.controller('createCtrl', function($scope, $http) {
    $http.get("/lib/states.json")
        .then(function(response) {
            $scope.states = response.data;
        });
    $http.get("/pages/events/getevents.php")
        .then(function(response) {
            $scope.events = response.data;
        });

});
app.controller('uploadCtrl', function($scope, $http, $window) {
    $scope.uploadStudents = {};
    $http.get("/pages/events/getevents.php")
        .then(function(response) {
            $scope.events = response.data;
        });
    $scope.saving = false;
    $scope.getjsoncsv = function(data) {
        $scope.uploadStudents = data;
        // alert($scope.uploadStudents.length+" "+Object.keys($scope.uploadStudents[0]).length);
        if ($scope.uploadStudents.length == 0 || Object.keys($scope.uploadStudents[0]).length != 8) {
            alert("Not a valid csv file, Check the csv file and try again");
            document.getElementById('csv_file').value = null;
            $scope.filename = "";
            $scope.uploadStudents = {};

        } else {
            $scope.filename = "The file contains " + $scope.uploadStudents.length +
                " records. Click on Import Students to start importing students.";
        }
        $scope.$apply();
    }
    $scope.csv_upload = function(callback) {
        if (document.getElementById('csv_file').value.length > 1) {

            var file = document.getElementById('csv_file').files[0];
            //$scope.filename=document.getElementById('csv_file').value;
            Papa.parse(file, {
                download: true,
                header: true,
                skipEmptyLines: true,
                error: function(err, file, inputElem, reason) {},
                complete: function(results) {
                    callback(results.data);
                }
            });

        }
    }
    $scope.closeupload = function() {
        //alert("Closing..");
        $scope.uploadeventid = "";
        document.getElementById('csv_file').value = null;
        $scope.filename = "";
        $scope.uploadStudents = {};
        $scope.saving = false;
        $scope.form_upload.$setPristine();
        $scope.totalstudents = 0;
        $scope.progress = 0;
        $window.location.reload();

    }
    $scope.downloadSamplecsv = function() {
        var a = document.createElement("a");
        var json_pre =
            '[{"firstname":"Rupali","lastname":"Sahu","email":"1234rupalisahu@gmail.com","institute":"Uma Charan Patnaik Engineering School","state":"Odisha","regdid":"","coursename":"","duration":""}]'

        var csv = Papa.unparse(json_pre);

        if (window.navigator.msSaveOrOpenBlob) {
            var blob = new Blob([decodeURIComponent(encodeURI(csv))], {
                type: "text/csv;charset=utf-8;"
            });
            navigator.msSaveBlob(blob, 'sample.csv');
        } else {

            a.href = 'data:attachment/csv;charset=utf-8,' + encodeURI(csv);
            a.target = '_blank';
            a.download = 'sample.csv';
            document.body.appendChild(a);
            a.click();
        }
    }
    $scope.importStudents = function() {
        if ($scope.uploadStudents.length != 0 || Object.keys($scope.uploadStudents[0]).length !== 5) {
            $scope.totalstudents = $scope.uploadStudents.length;
            eventid = $scope.uploadeventid;
            $scope.errortext = "";
            $scope.saving = true;
            var j = 0;
            for (i = 0; i < $scope.uploadStudents.length; i++) {
                var fd = new FormData();
                fd.append('firstname', $scope.uploadStudents[i].firstname);
                fd.append('lastname', $scope.uploadStudents[i].lastname);
                fd.append('institute', $scope.uploadStudents[i].institute);
                fd.append('email', $scope.uploadStudents[i].email);
                fd.append('state', $scope.uploadStudents[i].state);
                fd.append('regdid', $scope.uploadStudents[i].regdid);
                fd.append('coursename', $scope.uploadStudents[i].coursename);
                fd.append('duration', $scope.uploadStudents[i].duration);
                fd.append('record', i + 1);
                fd.append('eventid', eventid);
                // AJAX request
                $http({
                    method: 'post',
                    url: 'uploadstudents.php',
                    data: fd,
                    headers: {
                        'Content-Type': undefined
                    },
                }).then(function successCallback(response) {
                    // Store response data
                    $scope.fustatus = response.data;
                    //alert(JSON.stringify($scope.fustatus));
                    if ($scope.fustatus.status == 1) {
                        j = j + 1;
                        pp = (j / $scope.totalstudents) * 100;
                        $scope.progressper = "width:" + pp + "%";
                        $scope.progress = j;
                        if (j == $scope.totalstudents) {
                            $scope.progresstext =
                                "Competed importing all records, All errors during import is shown below";
                        } else {
                            $scope.progresstext = "Importing record " + $scope.progress + " of " +
                                $scope.totalstudents;
                        }
                        //alert("Record number "+$scope.fustatus.record+" successfully imported.");
                    } else {
                        j = j + 1;
                        pp = (j / $scope.totalstudents) * 100;
                        $scope.progressper = "width:" + pp + "%";
                        $scope.progress = j;
                        if (j == $scope.totalstudents) {
                            $scope.progresstext =
                                "Competed importing all records, All errors during import is shown below";
                        } else {
                            $scope.progresstext = "Importing record " + $scope.progress + " of " +
                                $scope.totalstudents;
                        }
                        $scope.errortext = $scope.errortext + "Error importing record number " +
                            $scope.fustatus.record + ", " + $scope.fustatus.message + "\n";
                        // alert("Error importing record number "+$scope.fustatus.record+","+$scope.fustatus.message);
                    }
                    // alert($scope.fustatus.msg);
                });
            }

        }
    }
});
</script>