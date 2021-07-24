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
              <h3>{{campaigncount}}</h3>

              <p>Campaigns</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="/pages/campaigns/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{emailcount}}</h3>

              <p>Emails Sent</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/pages/templates/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
        <h2>Welcome to Eduskills Campaigns Management Portal</h2>
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
                                <th>Campaign Name</th>
                                <th>Emails Sent</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr ng-repeat="camp in camps track by $index" repeat-done="initDataTable">
                                <td>{{$index+1}}</td>
                                <td>{{camp.campaignname}}</td>
                                <td>{{camp.emailssent}}</td>
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
  $scope.campaigncount = "";
  $scope.emailcount = "";
  $http.get('/pages/dashboard/getdashboard.php')
        .then(function(response) {
         
            $scope.campaigncount = response.data.campaigncount;
            $scope.emailcount = response.data.emailcount;
           // $scope.$digest();
        });
    $scope.myPromise= $http.get('/pages/dashboard/getsummary.php')
        .then(function(response) {
         
            $scope.camps= response.data;
            //$scope.$digest();
        });
});
</script>