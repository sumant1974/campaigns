<?php
   include_once "./iheader.php";
   ?>
<div ng-app="myApp">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Certificates
            <small>Manage</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/pages/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Certificates</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content" ng-controller="certCtrl" id="certCtrl">
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
                        <h3><?php echo $dashboard->certcount; ?></h3>
                        <p>Certificates</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-calendar-plus"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="box box-default box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Search Certificates</h3>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="">
                        <form id="form_select" name="form_event_filter" class="appnitro" role="form" method="post"
                            ng-submit="showCerts()">
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
                            <input type="submit" class="btn btn-primary" value="Show Certificates"></input>
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
                    <h3 class="box-title">Certificates</h3>
                    <div cg-busy="myPromise"></div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="cert-table" class="table table-bordered table-striped dataTable" datatable="ng"
                        dt-options="dtOptions" dt-instance="dtInstance">
                        <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Certificate ID</th>
                                <th>Issue Date</th>
                                <th>cert Name</th>
                                <th>Institute</th>
                                <th>State</th>
                                <th>Email</th>
                                <th>Registration ID</th>
                                <th>Course Name</th>
                                <th>Course Duration</th>
                                <th>Event Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr ng-repeat="cert in certs" repeat-done="initDataTable">
                                <td>{{$index+1}}</td>
                                <td>{{cert.certid}}</td>
                                <td>{{cert.certissuedate}}</td>
                                <td>{{cert.studentname}}</td>
                                <td>{{cert.institute}}</td>
                                <td>{{cert.state}}</td>
                                <td>{{cert.email}}</td>
                                <td>{{cert.regdid}}</td>
                                <td>{{cert.coursename}}</td>
                                <td>{{cert.duration}}</td>
                                <td>{{cert.eventname}}</td>
                                <td>
                                    <div class="btn-group">
                                    <form action="https://certportal.eduskillsfoundation.org/Certificate/pdfcrtallllllllllllll.jsp"
                                        method="post" target="tpreview">
                                        <input type="hidden" ng-value="cert.certdetails" id="tjson" name="tjson">
                                        <button type="submit" class="btn btn-default" data-toggle="modal"
                                            data-target="#modal-view">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </form>
                                    
                                    </div>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                   
                                    
                </div>
            </div>
        </div>
</div>
<div class="modal fade" id="modal-view" style="display: none;"
                                        class="box box-primary">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header box-header with-border">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title">View Certificate</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <iframe id="tpreview" name="tpreview" src="" width="100%"
                                                        height="500px"></iframe>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default pull-left"
                                                        data-dismiss="modal">Close</button>

                                                </div>
                                            </div>
                                            <!-- /.modal-content -->

                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
</section>
<!-- script -->
<script>
var app = angular.module('myApp', ['datatables', 'ngResource', 'ckeditor', 'datatables.buttons', 'cgBusy']);
app.controller('certCtrl', function($scope, $http, $resource, DTOptionsBuilder) {
    $scope.class = [];
    $scope.showCerts = function() {
        $scope.certs = {};
        if (!$scope.selecteventid == "") {

            $scope.myPromise = $resource('getcerts.php?eventid=' + $scope.selecteventid).query().$promise
                .then(function(response) {
                    $scope.certs = response;
                });
            //$scope.dtInstance.rerender();
        }
    }
    /* $scope.myPromise = $resource('getcerts.php').query().$promise
         .then(function(response) {
             $scope.certs = response;
         });*/

    //$scope.loading='';
    $http.get("/pages/events/getevents.php")
        .then(function(response) {
            $scope.events = response.data;
        });

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
</script>