<div class="register-box" ng-app="myApp" ng-controller="certController">
  

  <div class="register-box-body">
    <h3 class="login-box-msg">Welcome to <br/>Eduskills Certificate Portal</h3>
    <p>Note: <br/>1. Please enter your registered email id and search for events. <br/>2. Select the event and click on Generate Certificate button to download your certificate.</p>
    <form ng-submit="getevents()" method="post" id="form_search">
      <div class="form-group has-feedback">
      
        <label>Please enter your Email ID:</label>
        <input type="email" class="form-control" placeholder="Email" id="email" name="email" ng-model="email" ng-change="resetevents()" required>
        
        
        <button type="submit" class="btn btn-block btn-primary">Search for Events</button>
        
      <span style="color:red" ng-show="form_search.email.$dirty && form_search.email.$invalid">
                            <span ng-show="form_search.email.$error.required">Enter Email to
                                Continue</span>
                            <span ng-show="form_search.email.$error.email">Enter a valid email</span>
                        </span>
                        <span style="color:red" id="error">{{errmsg}}</span>            
      </div>
      <div cg-busy="myPromise"></div>
      </form>
      <form ng-submit="generatecert()" method="post" id="form_generate" ng-show="dispevform">
      <div class="form-group">
      
                        <label for="Event Name">Event Name</label>
                        <Select type="text" class="form-control" id="eventid" placeholder="Event Name" name="eventid"
                            ng-model="eventid" ng-change="resetevent()" required>
                            <option value="">==Select an Event==</option>
                            <option ng-repeat="event in events" value="{{event.eventid}}">{{event.eventname}}
                            </option>
                        </Select>
                        <span style="color:red" ng-show="form_generate.eventid.$dirty && form_generate.eventid.$invalid">
                            <span ng-show="form_generate.eventid.$error.required">Event selection is
                                required.</span>
                        </span>


                    </div>
        <div>
        <input type="hidden" ng-value="email" id="email" name="email">
          <button type="submit" class="btn btn-warning btn-block btn-flat">Generate Certificate</button>
          
        </div>
        <!-- /.col -->
      
    </form>
    <form id="form_download" method="post" action="https://certportal.eduskillsfoundation.org/Certificate/pdfcrtallllllllllllll.jsp" target="_blank">
          <input type="hidden" ng-value="tjson" id="tjson" name="tjson">
          <button type="submit" class="btn btn-danger btn-block btn-flat" ng-show="tjson">Download</button>
    </form>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
<script>
var app = angular.module('myApp', ['datatables', 'ngResource', 'ckeditor', 'datatables.buttons', 'cgBusy']);
app.controller('certController', function($scope, $http, $resource, DTOptionsBuilder) {

  $scope.getevents = function(){
    $scope.events={};
    $scope.myPromise= $http.get("/pages/home/include/getevents.php?email="+$scope.email)
        .then(function(response) {
            // alert(response.data);
            if(response.data == "null")
          {
            $scope.errmsg="Sorry your email was not found, please check and try again..."
          }
          else
          {
            $scope.events=response.data;
            $scope.dispevform=1;
          }
        });
        
  }

  $scope.resetevents = function() {
    $scope.events={};
    $scope.errmsg="";
    $scope.tjson="";
    $scope.dispevform=0;
  }

  $scope.resetevent = function() {
    $scope.tjson="";
  }

  $scope.generatecert = function() {
                var fd = new FormData();
                fd.append('email', $scope.email);
                fd.append('eventid', $scope.eventid);
                $scope.myPromise=$http({
                    method: 'post',
                    url: '/pages/home/include/generatecert.php',
                    data: fd,
                    headers: {
                        'Content-Type': undefined
                    },
                }).then(function successCallback(response) {

                 // alert(JSON.stringify(response.data));
                  $scope.tjson=JSON.stringify(response.data);
                });
  }

});
</script>