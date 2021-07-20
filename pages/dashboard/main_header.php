<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" ng-app="myApp" ng-controller="dashController">
    
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{eventcount}}</h3>

              <p>Events</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="/pages/events/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{templatecount}}</h3>

              <p>Templates</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/pages/templates/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{studentcount}}</h3>

              <p>Students</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="/pages/students/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{certcount}}</h3>

              <p>Certificates</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="/pages/certificates/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
      
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
        <div cg-busy="myPromise"></div>
        <h2>Welcome to Eduskills Certification Management Portal</h2>
        <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Summary Sheet</h3>
                    <div cg-busy="myPromise"></div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="cert-table" class="table table-bordered table-striped dataTable" datatable="ng"
                        dt-options="dtOptions" dt-instance="dtInstance">
                        <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Event Name</th>
                                <th>Total Students</th>
                                <th>Certificates Issued</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr ng-repeat="event in events track by $index" repeat-done="initDataTable">
                                <td>{{$index+1}}</td>
                                <td>{{event.eventname}}</td>
                                <td>{{event.studentcount}}</td>
                                <td>{{event.certcount}}</td>
                            </tr>
                        </tbody>

                    </table>
                   
                                    
                </div>
            </div>

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
    <script>
var app = angular.module('myApp', ['datatables', 'ngResource', 'ckeditor', 'datatables.buttons', 'cgBusy']);
app.controller('dashController', function($scope, $http, $resource, DTOptionsBuilder) {
  $scope.eventcount = "";
  $scope.templatecount = "";
  $scope.studentcount = "";
  $scope.certcount = "";
  $http.get('/pages/dashboard/getdashboard.php')
        .then(function(response) {
         
            $scope.eventcount = response.data.eventcount;
            $scope.templatecount = response.data.templatecount;
            $scope.studentcount = response.data.studentcount;
            $scope.certcount = response.data.certcount;
           // $scope.$digest();
        });
    $scope.myPromise= $http.get('/pages/dashboard/getsummary.php')
        .then(function(response) {
         
            $scope.events= response.data;
            //$scope.$digest();
        });
});
</script>