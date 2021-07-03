<?php 
include_once "../layout/functions.php";
//session_start();
//echo $_SESSION["user_id"];
///include_once '../../lib/auth.php';
//$auth=new Auth();

 
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
  <script type='text/javascript' src='https://www.google.com/recaptcha/api.js?render=6LffItwZAAAAAHNtiOLHQe4Qr2sD1EXTIz_8W3Ww&#038;ver=3.0' id='google-recaptcha-js'></script>
<script type='text/javascript' id='wpcf7-recaptcha-js-extra'>
/* <![CDATA[ */
var wpcf7_recaptcha = {"sitekey":"6LffItwZAAAAAHNtiOLHQe4Qr2sD1EXTIz_8W3Ww","actions":{"homepage":"homepage","contactform":"contactform"}};
/* ]]> */
</script>
<script type='text/javascript' src='https://eduskillsfoundation.org/wp-content/plugins/contact-form-7/modules/recaptcha/index.js?ver=5.4.1' id='wpcf7-recaptcha-js'></script>

</head>