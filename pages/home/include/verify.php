<div class="register-box" ng-app="myApp" ng-controller="certController">
  

  <div class="register-box-body">
    <h3 class="login-box-msg">Welcome to <br/>Eduskills Certification Portal</h3>
    <div cg-busy="myPromise"></div>
    <div style="color:red"><p>{{errmsg}}</p></div>
    <div ng-show="cert">
    <h4>Certificate ID: {{cert.certid}}</h4>
    <h4>Issued On: {{cert.certissuedate}}</h4>
    <h4>Issued To: {{cert.studentname}}</h4>
    <h4>Institute: {{cert.institute}}</h4>
    </div>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
<script>
var app = angular.module('myApp', ['datatables', 'ngResource', 'ckeditor', 'datatables.buttons', 'cgBusy']);
app.controller('certController', function($scope, $http, $resource, DTOptionsBuilder) {
        $scope.certid="<?php echo $certid ?>";
            $scope.myPromise= $http.get('getcert.php?certid='+$scope.certid)
        .then(function(response) {
            // alert(response.data);
            if(response.data == "null")
                {
                        $scope.errmsg="Sorry this certificate details could not be found";
                }
                else
                {
                        errmsg="";
                        $scope.cert=response.data;
                }
        })

});
</script>