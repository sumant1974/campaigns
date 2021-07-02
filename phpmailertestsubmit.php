<?php
ini_set( 'session.cookie_secure', 1 );
//Import PHPMailer classes into the global namespace
 //These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';


//include("config.php"); 
error_reporting(0);

?>

<?php 

/*if(isset($_POST['submit']))
	{
$name = mysqli_real_escape_string($con,$_POST["fname"]);
$email = mysqli_real_escape_string($con,$_POST["email"]);
$phone = mysqli_real_escape_string($con,$_POST["phone"]);
$subject = mysqli_real_escape_string($con,$_POST["subject"]);
$msg = mysqli_real_escape_string($con,$_POST["textarea-349"]);

*/

$mail = new PHPMailer();
$mail->IsSMTP(); // tell the class to use SMTP
$mail->SMTPDebug = 2; // uncomment to print debugging info

// Timezone
date_default_timezone_set('Asia/Kolkata');

// SMTPProvider Engine installation settings
$mail->Host = "dyn-t-box.collateralapps.com"; // Connect to this SMTPProvider server
$mail->SMTPAuth = true; // enables SMTP authentication. 
$mail->Port = 587; // SMTP submission port to inject mail into. Usually port 587
$mail->Username = "smtpprov-uaabaiabg"; // SMTP username
$mail->Password = "ssworks1368"; // SMTP password

// Campaign Settings
$mail_class = "transactional"; // Mail Class to use
$mail->SetFrom("noreply@eduskills.academy", "Eduskills Academy");
$mail->Subject = "PHPMailer Example";
$mail->MsgHTML("HTML body");
$mail->AltBody = "Text body";
//$mail->addAttachment('images/phpmailer_mini.png');

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);


// Individual Recipient Settings
$recipient = "sumant1974@gmail.com";
$recipient_name = "Sumanta Sahoo";

// Generate the To: and X-SMTPProvider-MailClass headers
$mail->AddAddress($recipient, $recipient_name);
$mail->addCustomHeader("X-SMTPProvider-MailClass: $mail_class");

$mail->send();
    ?>
    <script language="javascript" type="text/javascript">
						alert('Our team will get back to you in 1 business day.');
							window.location = 'contact-us.php';
						</script>
                        <?php
	//}

?>


<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

    <meta charset="utf-8" />
<link rel="shortlink" href="index.html" />
<link rel="canonical" href="index.html" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="shortcut icon" href="images/fav.png" type="image/vnd.microsoft.icon" />
<link rel="alternate" hreflang="en" href="index.html" />
<link rel="revision" href="index.html" />

    <title> Contact Us | Eduskills Academy &#8211; Learn Anytime Anywhere</title>
<link rel="stylesheet" media="all" href="assets/css/bootstrap.min50c0.css?qr4q6v" />
<link rel="stylesheet" media="all" href="assets/css/font-awesome.min50c0.css?qr4q6v" />
<link rel="stylesheet" media="all" href="assets/css/owl.carousel50c0.css?qr4q6v" />
<link rel="stylesheet" media="all" href="assets/css/owl.theme50c0.css?qr4q6v" />
<link rel="stylesheet" media="all" href="assets/css/style50c0.css?qr4q6v" />
<link rel="stylesheet" media="all" href="assets/css/responsive50c0.css?qr4q6v" />
<link rel="stylesheet" media="all" href="assets/css/nasscom50c0.css?qr4q6v" />

<script src="assets/js/jquery.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">

     

  </head>
  <body class="lod">
                
    
  <div class="dialog-off-canvas-main-canvas" data-off-canvas-main-canvas>
 
<?php include"header.php"; ?>
<main id="content"> 
   
  <div class="region region-content">
    <div data-drupal-messages-fallback class="hidden"></div>


<!-- Slider ==================================== -->
  <div id="slider" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active"> 
                <img src="images/Contact us.png" class="d-block w-100 slider-desktop-banner" alt="Contact Us"> <img src="images/Contact-Us-Final_Mobile_0.jpg" class="d-block w-100 slider-mobile-banner" alt=" Contact Us Mobile">		
        <!--<div class="marquee-overlay"></div>-->
        <div class="carousel-caption d-md-block text-left">
          <h2>

          <h1 class="text-white"></h1>
            
<!-- END OUTPUT from 'themes/contrib/bootstrap/templates/field/field.html.twig' -->

</h2>
        </div>
      </div>
    </div>
  </div>
  <!-- End Slider ==================================== --> 
  
  <!-- Content ==================================== --> 
  
  <!-- Section Contact us -->
  <section class="section bg-white">
    <div class="container"> 
      
      <!-- Section row -->
      <div class="bottom20">
 


      </div>
      <!-- Section row end/--> 
      
      <!-- Section row -->
      <div class="section-bottom">
        <div class="row">
          
          <div class="col-xl-5 col-lg-5 col-md-5 col-sm-6 col-12">
        

          <div class="our-locations-text-container text-blue">
<div class="section-title section-title-heading bottom20">
<h2 class="text-blue" style="font-family: 'source_sans_probold';">Contact Us</h2>
</div>

<div class="our-locations">
<h6>Corp. Office</h6>
<ul class="list-group"><li class="list-group-item"><i class="fa fa-map-marker" aria-hidden="true"></i>
<span class="media-body" style="font-size:17px;">2nd floor, ISTE Annex Building, IIT Delhi Campus, <br/>Shaheed Jeet Singh Marg, New Delhi– 110016, India</span></li>
<li class="list-group-item"><i class="fa fa-mobile" aria-hidden="true"></i>
	<span class="media-body" style="font-size: 17px;"><a class="text-blue" href="#">8093254919</a></span></li>	
</ul></div>

<div class="our-locations">
<h6>Head Office</h6>
<ul class="list-group"><li class="list-group-item"><i class="fa fa-map-marker" aria-hidden="true"></i>
<span class="media-body" style="font-size: 17px;">#806, DLF Cyber City, Techno Park, <br/>
Bhubaneswar-751024, Odisha, India</span></li>
	<li class="list-group-item"><i class="fa fa-envelope" aria-hidden="true"></i>
	<span class="media-body" style="font-size: 17px;"><a class="text-blue" href="mailto:info@eduskills.academy">info@eduskills.academy</a></span></li>
   <li class="list-group-item"><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:0674 2951797" style="font-family:arial;font-size:14px;line-height: 1.5;">0674 2951797</a></li>
	<li class="list-group-item"><i class="fa fa-mobile" aria-hidden="true"></i>
	<span class="media-body" style="font-size: 17px;"><a class="text-blue" href="#">8093254920, 8093254904</a></span></li>
</ul></div>
</div>

         

          </div>
		  <div class="col-xl-7 col-lg-7 col-md-7 col-sm-6 col-12"> 
<br/><br/><br/><br/><br/>
<div class="wpb_column vc_column_container vc_col-sm-8"><div class="vc_column-inner"><div class="wpb_wrapper"><h2 style="font-size: 30px;color: #002147;line-height: 1.5;text-align: justify" class="vc_custom_heading">Write to Us</h2><div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_10 vc_sep_border_width_3 vc_sep_pos_align_left vc_separator_no_text"><span class="vc_sep_holder vc_sep_holder_l"><span style="border-color:#fdc800;" class="vc_sep_line"></span></span><span class="vc_sep_holder vc_sep_holder_r"><span style="border-color:#fdc800;" class="vc_sep_line"></span></span>
</div><div role="form" class="wpcf7" id="wpcf7-f1976-p1117-o1" lang="en-US" dir="ltr">
<div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p> <ul></ul></div>
<form class="wpcf7-form init"  id="checkout-form" name="frm" method="post" action="" onSubmit="return submitUserForm();">

<div class="contact-us-form">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6">
<div class="form-group"><span class="wpcf7-form-control-wrap text-215"><input type="text" name="fname" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Name*" required></span></div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6">
<div class="form-group"><span class="wpcf7-form-control-wrap email-788"><input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form-control" aria-required="true" aria-invalid="false" placeholder="Email*" required></span></div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6">
<div class="form-group"><span class="wpcf7-form-control-wrap text-216"><input type="text" name="subject" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Subject*" required></span></div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6">
<div class="form-group"><span class="wpcf7-form-control-wrap tel-871"><input type="tel" name="phone" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-tel form-control" aria-invalid="false" placeholder="Mobile*" required></span></div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<div class="form-group"><span class="wpcf7-form-control-wrap textarea-349"><textarea name="textarea-349" cols="20" rows="7" maxlength="250" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required textarea form-control" aria-required="true" aria-invalid="false" placeholder="Message"></textarea></span></div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
 <div class="form-group" style="padding-left:15px">
                                    <div class="g-recaptcha" data-sitekey="6LcfbFAaAAAAAOiKXdP0lLAtPdGIkPB2IGa4hB4z" data-callback="verifyCaptcha"></div>
                                     <div id="g-recaptcha-error"></div>
                                </div>
                             <script src='https://www.google.com/recaptcha/api.js'></script>
                              <script>
								function submitUserForm() {
								
								 
									var response = grecaptcha.getResponse();
									if(response.length == 0) {
										document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">This field is required.</span>';
										return false;
									}
									return true;
								}
								 
								function verifyCaptcha() {
									document.getElementById('g-recaptcha-error').innerHTML = '';
								}
						</script>
                        </div>
<div class="col-lg-12 col-md-12 col-sm-12"><input type="submit" value="SUBMIT" class="load-more-btn" name="submit"><span class="ajax-loader"></span></div></div>
</div>
</form></div></div></div></div>

 </div>
		  
        </div>
      </div>
      <!-- Section row end/--> 
      
    </div>
  </section>
  <!-- Section Contact us end/--> 
  
 
  
  <!-- End Content ==================================== --> 
<!-- END OUTPUT from 'assets/templates/node/node--contact-us.html.twig' -->


  </div>

<!-- END OUTPUT from 'assets/templates/layout/region.html.twig' -->


</main>

  
 <style>
	.blink{
	    background-color: #000;
		
		text-align: center;
		
	}
	
@keyframes blink{
0%{opacity: 0;}
50%{opacity: .5;}
100%{opacity: 1;}
}
</style>
<footer id="footer">
  <section class="footer">
  
    <!--<div class="bg-red sticky-footer" id="sticky-footer">
      <div class="container">
        <div class="row">
          <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12"> 
		  <a href="student-membership.php" class="btn btn-border-white btn-border-full text-uppercase top10 bottom10" style="background-color:#ff8c00">
          <span style="color:#fff;animation: blink 1s linear infinite;background-color:#ff8c00">Student Membership</span>
		  <img src="assets/images/icons/btn-arrow-right.png" alt="digital  of arrow right" class="ml-5"> </a> </div>
        </div>
      </div>
    </div>-->
  
  

    
    
    <!-- Footer Menu -->
    <div class="container footer-menu" id="footer-menu">
    
      <div class="row justify-content-center"> 
        
       
        
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="row">
		  
		   <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
              <h5 class="footertext-large">Follow Us</h5>
             <ul class="social">
              <li><a href="https://www.facebook.com/EduSkillsFoundation/" target="_blank" title="Facebook"><img src="images/sface.png" width="35"></a></li>
              <li><a href="https://www.linkedin.com/company/eduskillsfoundation/" target="_blank" title="Linkedin"><img src="images/link.png" width="35"></a></li>
                <li><a href="https://www.youtube.com/channel/UCP0pyuUu5bqA7NTD49kfsRQ"  target="_blank" title="Twitter"><img src="images/you.png" width="35"></a></li>
                <li><a href="https://www.instagram.com/eduskillsfoundation/"  target="_blank" title="Instagram"><img src="images/insta.png" width="35"></a></li>
              </ul>
              
            </div>
		  
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
           
              <h5 class="footertext-large">Quick Links
</h5>
           
  <div class="region region-footer-navigation">
    
<section id="block-footer" class="block block-superfish block-superfishfooter clearfix">
  

<ul id="superfish-footer" class="menu sf-menu sf-footer sf-vertical sf-style-none footer-column bottom20">
 

<li id="footer-menu-link-content04b25051-0698-4ab5-b5ac-7daabaf8f34e" class="sf-depth-1 sf-no-children">
<a href="about-us.php" class="sf-depth-1 link-small">About Us</a></li>
<li id="footer-menu-link-content1ead80b0-f499-4a9f-94b3-ea6b38b945da" class="sf-depth-1 sf-no-children">
<a href="student-membership.php" class="sf-depth-1 link-small">Membership</a></li>
<li id="footer-menu-link-content9d56b6a2-7d73-493f-a23b-f0f082585a53" class="sf-depth-1 sf-no-children">
<a href="faq-details.php" class="sf-depth-1 link-small" target="_blank">FAQs</a></li>

<li id="footer-menu-link-content9a0ac45b-c517-42e2-a6fb-6e113015929b" class="sf-depth-1 sf-no-children">
<a href="contact-us.php" class="sf-depth-1 link-small">Contact Us</a></li>
<li id="footer-menu-link-content9a0ac45b-c517-42e2-a6fb-6e113015929b" class="sf-depth-1 sf-no-children">
<a href="terms-condition.php" class="sf-depth-1 link-small">Terms &amp; Conditions</a></li>

</ul>


  </section>

  </div>



                          </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
              <h5 class="footertext-large">Contact Details</h5>
			   <h6 style="color:#fff">Corp. Office<h6>
             <ul>
             <li style="font-family:arial;font-size:14px;line-height: 1.5;color:#fff;padding-bottom:5px;font-family: 'source_sans_pro';"><i class="fa fa-paper-plane-o" aria-hidden="true" style="color:#fff"></i>&nbsp;2nd floor, ISTE Annex Building, IIT Delhi Campus, <br/>Shaheed Jeet Singh Marg, New Delhi– 110016, India</li>
             <li style="font-family:arial;font-size:14px;line-height: 1.5;color:#fff;padding-bottom:5px;font-family: 'source_sans_pro';"><i class="fa fa-phone" aria-hidden="true" style="color:#fff"></i> <a href="tel:0674 2951797" style="font-family:arial;font-size:14px;line-height: 1.5;color:#fff;margin-bottom:15px">8093254919</a></li>
			</ul>
             
			  <h6 style="color:#fff">Head Office<h6>
              <ul>
             <li style="font-family:arial;font-size:14px;line-height: 1.5;color:#fff;padding-bottom:5px;font-family: 'source_sans_pro';"><i class="fa fa-paper-plane-o" aria-hidden="true" style="color:#fff"></i>&nbsp; #806, DLF Cyber City, Techno Park, <br/>
Bhubaneswar-751024, Odisha, India
</li>
<li style="font-family:arial;font-size:14px;line-height: 1.5;color:#fff;padding-bottom:5px;font-family: 'source_sans_pro';"><i class="fa fa-phone" aria-hidden="true" style="color:#fff"></i> <a href="tel:0674 2951797" style="font-family:arial;font-size:14px;line-height: 1.5;color:#fff;margin-bottom:15px">0674 2951797</a></li>
			 <li style="font-family:arial;font-size:14px;line-height: 1.5;color:#fff;padding-bottom:5px;font-family: 'source_sans_pro';"><i class="fa fa-mobile" aria-hidden="true" style="color:#fff"></i> <a href="tel:0674 2951797" style="font-family:arial;font-size:14px;line-height: 1.5;color:#fff;margin-bottom:15px">8093254904, 8093254920</a></li>
			 <li style="font-family:arial;font-size:14px;line-height: 1.5;color:#fff;font-family: 'source_sans_pro';"><i class="fa fa-envelope-o" aria-hidden="true" style="color:#fff"></i> <a href="mailto:info@eduskills.academy" style="font-family:arial;font-size:14px;line-height: 1.5;color:#fff;font-family: 'source_sans_pro';">info@eduskills.academy</a></li> </ul>
              
            </div>
			
			
			
			
          </div>
        </div>
      </div>
    
  
     <?php include"fter-below.php"; ?>
      
    </div>
  </section>
</footer>
 
  </div>

<!-- END OUTPUT from 'core/modules/system/templates/off-canvas-page-wrapper.html.twig' -->


   
<script src="assets/bootstrap/js/drupal.bootstrap50c0.js?qr4q6v"></script>
<script src="assets/bootstrap/js/attributes50c0.js?qr4q6v"></script>
<script src="assets/bootstrap/js/theme50c0.js?qr4q6v"></script>
<script src="assets/js/jquery.min50c0.js?qr4q6v"></script>
<script src="assets/js/bootstrap.bundle.min50c0.js?qr4q6v"></script>
<script src="assets/js/owl.carousel50c0.js?qr4q6v"></script>
<script src="assets/js/bootstrap-datepicker50c0.js?qr4q6v"></script>
<script src="assets/js/main50c0.js?qr4q6v"></script>
<script src="assets/bootstrap/js/popover50c0.js?qr4q6v"></script>
<script src="assets/bootstrap/js/tooltip50c0.js?qr4q6v"></script>

       
  </body>

</html>
