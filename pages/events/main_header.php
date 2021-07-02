<?php
   include_once "./iheader.php";
   ?>
<div ng-app="myApp">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Events
            <small>Manage</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/pages/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Events</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
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
                        <h3><?php echo $dashboard->eventscount; ?></h3>
                        <p>Events</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-calendar-plus"></i>
                    </div>
                    <div align="center">
                        <a class="btn btn-app bg-green" data-toggle="modal" data-target="#modal-create">
                            <i class="fa fa-plus"></i>Add
                        </a>
                    </div>

                </div>
            </div>
            <!-- ./col 
            <div class="col-lg-4 col-xs-6">
                 small box 
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $dashboard->EducatorsCount; ?></h3>
                        <p>Educators</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <a href="/pages/educators" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
             ./col 
            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $dashboard->StudentsCount; ?></h3>
                        <p>Students</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <a href="/pages/students" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
             ./col -->
        </div>
        <!-- /.row -->
        <div class="row" ng-controller="eventCtrl" id="eventCtrl">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Events</h3>
                    <div cg-busy="myPromise"></div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="event-table" class="table table-bordered table-striped dataTable" datatable="ng"
                        dt-options="dtOptions">
                        <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Event ID</th>
                                <th>Event Name</th>
                                <th>Event Website</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr ng-repeat="event in events" repeat-done="initDataTable">
                                <td>{{$index+1}}</td>
                                <td>{{event.eventid}}</td>
                                <td>{{event.eventname}}</td>
                                <td><a href={{event.website}} target="_blank">{{event.website}}</a></td>
                                <td>
                                    <div class="btn-group-vertical">
                                        <button class="btn btn-default" ng-click="event_edit($index)" data-toggle="modal"
                                            data-target="#modal-edit">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn btn-default" ng-click="event_delete($index)"
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
                        action="/pages/events/update.php">
                        <input type="hidden" ng-value="event_id" name="event_id" id="event_id">
                        <div class="modal-content">
                            <div class="modal-header box-header with-border">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Edit Event Details</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="Event Name">Event Name</label>
                                    <input type="text" class="form-control" id="event_name"
                                        placeholder="Enter name of the event" name="event_name" ng-model="event_name"
                                        required>

                                    <span style="color:red"
                                        ng-show="form_edit.event_name.$dirty && form_edit.event_name.$invalid">
                                        <span ng-show="form_edit.event_name.$error.required">Enter Event Name to
                                            Continue</span>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="Event Website">Event Website</label>
                                    <input type="text" class="form-control" id="event_website"
                                        placeholder="Enter website of the event" name="event_website"
                                        ng-model="event_website" required>
                                    <span style="color:red"
                                        ng-show="form_edit.event_website.$dirty && form_edit.event_website.$invalid">
                                        <span ng-show="form_edit.event_website.$error.required">Event Website is
                                            required.</span>
                                    </span>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left"
                                    data-dismiss="modal">Close</button>
                                <input type="submit" ng-disabled="form_edit.event_name.$dirty && form_edit.event_name.$invalid ||  
                  form_edit.event_website.$dirty && form_edit.event_website.$invalid" class="btn btn-primary"
                                    value="Save Changes"></input>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </form>
                </div>
                <!-- /.modal-dialog -->
            </div>
            <div class="modal modal-danger fade" id="modal-delete" style="display: none;" class="box box-primary">
                <div class="modal-dialog">
                    <form id="form_delete" name="form_delete" class="appnitro" role="form" method="post"
                        action="/pages/events/delete.php">
                        <input type="hidden" name="event_id" id="event_id" ng-value="event_id">
                        <div class="modal-content">
                            <div class="modal-header box-header with-border">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Delete Event Details</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="Partner Name">Please Confirm Deletion of Event<br /><span
                                            class="box-warning">Event Name: {{event_name}}</span></label>
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
                action="/pages/events/create.php" ng-controller="createCtrl">
                <div class="modal-content">
                    <div class="modal-header box-header with-border">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Add New Event</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Event Name">Event Name</label>
                            <input type="text" class="form-control" id="event_name"
                                placeholder="Enter name of the event" name="event_name" ng-model="event_name"
                                required>

                            <span style="color:red" ng-show="form_add.event_name.$dirty && form_add.event_name.$invalid">
                                <span ng-show="form_add.event_name.$error.required">Enter Event Name to
                                    Continue</span>
                            </span>
                        </div>
                        
                        <div class="form-group">
                            <label for="Event website">Event Website</label>
                            <input type="text" class="form-control" id="event_website"
                                placeholder="Enter Event website" name="event_website" ng-model="event_website"
                                required>
                            <span style="color:red"
                                ng-show="form_add.event_website.$dirty && form_add.event_website.$invalid">
                                <span ng-show="form_add.event_website.$error.required">Event Website is
                                    Required</span>
                            </span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <input type="submit" ng-disabled="form_add.event_name.$dirty && form_add.event_name.$invalid ||  
                  form_add.event_website.$dirty && form_add.event_website.$invalid" class="btn btn-primary"
                            value="Save Changes"></input>
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
    //$scope.loading='<b>Loading Data.. Please wait..</b><i class="fas fa-sync fa-spin"></i>';
    $scope.myPromise = $resource('getevents.php').query().$promise
        .then(function(response) {
            $scope.events = response;
        });
        //$scope.loading='';
   /* $http.get("/lib/states.json")
        .then(function(response) {
            $scope.states = response.data;
        });*/

    $scope.event_edit = function(index) {
        $scope.event_id = $scope.events[index].eventid;
        $scope.event_name = $scope.events[index].eventname;
        $scope.event_website = $scope.events[index].website;
        //outlineeditor.insertHtml($scope.course_outline);
    }
    $scope.event_delete = function(index) {
        $scope.event_id = $scope.events[index].eventid;
        $scope.event_name = $scope.events[index].eventname;
    };

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

    
});
</script>