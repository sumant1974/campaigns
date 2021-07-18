<?php 

session_start();
include_once "header.php";
//echo $_SESSION["user_id"];
///include_once '../../lib/auth.php';
//$auth=new Auth();
$certid=$_GET['cert'];
 
  ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Eduskills Certification Management Portal</title>
  
  <link rel="icon" type="image/png" href="https://eduskillsfoundation.org/wp-content/uploads/2019/10/icon.png"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

  <link rel="stylesheet" href="../../dist/css/style.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/angular-busy/4.1.4/angular-busy.css" integrity="sha512-sWk/3tdIZOT5Gn+W06CASn6so+Mgym5bryHp3f4QkA/BzmktgjHBMRJoADKMLAFuNIOU9VPjvJONMTH5V+khqA==" crossorigin="anonymous" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- jQuery 2.2.3 -->
  <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip 
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
-->
  <!-- Bootstrap 3.3.6 -->
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.0/angular.js" integrity="sha512-CiKQCmN86Y1I8Ewkt2gGnSNmsiVrS9Ez5MoudCBhTiBJScg+GjA9OlKdaeI0IuxdCl43Fs5x5zpeew2hfOatOA==" crossorigin="anonymous"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ngStorage/0.3.11/ngStorage.js" integrity="sha512-c2T3C9cjX/WQscZb+Qws0CqbPujwNik3JPOzn4r/PwHDYdIVxC+LXOY51+4qAsR2wutl7iC0at47X1EIroFq5A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="/js/papaparse.js"></script>
  <script src="/js/papaparse.min.js"></script>

<style>

@media only screen and (max-width: 600px) {
  .register-box{
  width:100%;
  margin: 3% auto;
}
}

.register-box-body {
    background: #337ab7;
    color: #fff;
}
@media only screen and (min-width: 600px) {
.register-box{
  width:50%;
  margin: 3% auto;
}
}
</style>
</head>
<body class="hold-transition register-page">
<?php include_once("include/verify.php") ?>

  <!-- Slimscroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/angular-datatable/angular-datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.0.0/ui-bootstrap-tpls.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-utils/0.1.1/angular-ui-utils.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<script src="/plugins/ckeditor/ckeditor.js"></script>
<script src="https://rawgit.com/lemonde/angular-ckeditor/master/angular-ckeditor.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.5.0/jszip.min.js" integrity="sha512-y3o0Z5TJF1UsKjs/jS2CDkeHN538bWsftxO9nctODL5W40nyXIbs0Pgyu7//icrQY9m6475gLaVr39i/uh/nLA==" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script src="/angular-datatable/plugins/buttons/angular-datatables.buttons.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular-resource.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-busy/4.1.4/angular-busy.js" integrity="sha512-2PrHWUeavJCJBlI9kigBFmivpngZYIa8kvM4rI7pDVNWqKdwanTk7keJgpO8OxaxOcyitwKvn7rv3NbM20QpXg==" crossorigin="anonymous"></script>


<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script src="../../dist/js/global.js"></script>
<!-- Grunt Livereload -->
<!-- <script src="//localhost:35729/livereload.js"></script> -->
</body>
</html>
