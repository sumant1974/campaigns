<?php
   include_once "./iheader.php";
   ?>
<div ng-app="myApp">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Templates
            <small>Manage</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/pages/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Templates</li>
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
                        <h3><?php echo $dashboard->templatescount; ?></h3>
                        <p>Templates</p>
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
                        <h3><?php //echo $dashboard->EducatorsCount; ?></h3>
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
                        <h3><?php //echo $dashboard->StudentsCount; ?></h3>
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
        <div class="row" ng-controller="templateCtrl" id="templateCtrl">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Templates</h3>
                    <div cg-busy="myPromise"></div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="template-table" class="table table-bordered table-striped dataTable" datatable="ng"
                        dt-options="dtOptions">
                        <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Template ID</th>
                                <th>Template Name</th>
                                <th>Event Name</th>
                                <th>Template Details</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr ng-repeat="template in templates" repeat-done="initDataTable">
                                <td>{{$index+1}}</td>
                                <td>{{template.tid}}</td>
                                <td>{{template.tname}}</td>
                                <td>{{template.eventname}}</td>
                                <td><form id="custtemplate" action="/pages/templates/customise.php" role="form" method="post">
                                <input type="hidden" id= "tid" name="tid" value="{{template.tid}}">
                                
                                <input type="submit" class="btn btn-primary" value="Customise Template">
                                </form></td>
                                <td>
                                    <div class="btn-group-vertical">
                                        <button class="btn btn-default" ng-click="template_edit($index)" data-toggle="modal"
                                            data-target="#modal-edit">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn btn-default" ng-click="template_delete($index)"
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
                        action="/pages/templates/update.php">
                        <input type="hidden" ng-value="template_id" name="template_id" id="template_id">
                        <div class="modal-content">
                            <div class="modal-header box-header with-border">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Edit Template</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="template Name">Template Name</label>
                                    <input type="text" class="form-control" id="template_name"
                                        placeholder="Enter name of the template" name="template_name" ng-model="template_name"
                                        required>

                                    <span style="color:red"
                                        ng-show="form_edit.template_name.$dirty && form_edit.template_name.$invalid">
                                        <span ng-show="form_edit.template_name.$error.required">Enter Template Name to
                                            Continue</span>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="Template details">Template details</label>
                                    <input type="text" class="form-control" id="template_details"
                                        placeholder="Enter details of the template" name="template_details"
                                        ng-model="template_details" required>
                                    <span style="color:red"
                                        ng-show="form_edit.template_details.$dirty && form_edit.template_details.$invalid">
                                        <span ng-show="form_edit.template_details.$error.required">Template details is
                                            required.</span>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="Event Name">Event Name</label>
                                    <Select type="text" class="form-control" id="event_id"
                                        placeholder="Event Name" name="event_id" ng-model="event_id"
                                        required>
                                        <option value="">==Select an Event==</option>
                                        <option ng-repeat="event in events" value="{{event.eventid}}">{{event.eventname}}
                                        </option>
                                    </Select>
                                    <span style="color:red"
                                        ng-show="form_edit.event_id.$dirty && form_edit.event_id.$invalid">
                                        <span ng-show="form_edit.event_id.$error.required">Event selection is
                                            required.</span>
                                    </span>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left"
                                    data-dismiss="modal">Close</button>
                                <input type="submit" ng-disabled="form_edit.template_name.$dirty && form_edit.template_name.$invalid ||  
                  form_edit.template_details.$dirty && form_edit.template_details.$invalid" class="btn btn-primary"
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
                        action="/pages/templates/delete.php">
                        <input type="hidden" name="template_id" id="template_id" ng-value="template_id">
                        <div class="modal-content">
                            <div class="modal-header box-header with-border">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Delete template Details</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="Partner Name">Please Confirm Deletion of template<br /><span
                                            class="box-warning">template Name: {{template_name}}</span></label>
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
                action="/pages/templates/create.php" ng-controller="createCtrl">
                <div class="modal-content">
                    <div class="modal-header box-header with-border">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Add New template</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="template Name">template Name</label>
                            <input type="text" class="form-control" id="template_name"
                                placeholder="Enter name of the template" name="template_name" ng-model="template_name"
                                required>

                            <span style="color:red" ng-show="form_add.template_name.$dirty && form_add.template_name.$invalid">
                                <span ng-show="form_add.template_name.$error.required">Enter template Name to
                                    Continue</span>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="template details">template details</label>
                            <input type="text" class="form-control" id="template_details"
                                placeholder="Enter template details" name="template_details" ng-model="template_details"
                                required>
                            <span style="color:red"
                                ng-show="form_add.template_details.$dirty && form_add.template_details.$invalid">
                                <span ng-show="form_add.template_details.$error.required">template details is
                                    Required</span>
                            </span>
                        </div>
                        <div class="form-group">
                                    <label for="Event Name">Event Name</label>
                                    <Select type="text" class="form-control" id="event_id"
                                        placeholder="Event Name" name="event_id" ng-model="event_id"
                                        required>
                                        <option value="">==Select an Event==</option>
                                        <option ng-repeat="event in events" value="{{event.eventid}}">{{event.eventname}}
                                        </option>
                                    </Select>
                                    <span style="color:red"
                                        ng-show="form_add.event_id.$dirty && form_add.event_id.$invalid">
                                        <span ng-show="form_add.event_id.$error.required">Event selection is
                                            required.</span>
                                    </span>
                                </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <input type="submit" ng-disabled="form_add.template_name.$dirty && form_add.template_name.$invalid ||  
                  form_add.template_details.$dirty && form_add.template_details.$invalid" class="btn btn-primary"
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
app.controller('templateCtrl', function($scope, $http, $resource, DTOptionsBuilder) {
    $scope.class = [];
    $scope.outlineeditor = {
        language: 'en',
        allowedContent: true,
        entities: false
    };
    //$scope.loading='<b>Loading Data.. Please wait..</b><i class="fas fa-sync fa-spin"></i>';
    $scope.myPromise = $resource('/pages/templates/gettemplates.php').query().$promise
        .then(function(response) {
            $scope.templates = response;
        });
        //$scope.loading='';
    $http.get("/pages/events/getevents.php")
        .then(function(response) {
            $scope.events = response.data;
        });

    $scope.template_edit = function(index) {
        $scope.template_id = $scope.templates[index].tid;
        $scope.template_name = $scope.templates[index].tname;
        $scope.template_details = $scope.templates[index].tdetails;
        $scope.event_id= $scope.templates[index].eventid;
        //outlineeditor.insertHtml($scope.course_outline);
    }
    $scope.template_delete = function(index) {
        $scope.template_id = $scope.templates[index].tid;
        $scope.template_name = $scope.templates[index].tname;
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
    $scope.template_details='{}';
    $http.get("/pages/events/getevents.php")
        .then(function(response) {
            $scope.events = response.data;
        });
});
</script>