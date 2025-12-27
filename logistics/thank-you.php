<?php
   include 'includes/config.php'; 
   $url =  $_SERVER['SERVER_NAME'];
?>
<!DOCTYPE html>
<html lang="en" class='ty-html-tag'>
<head>
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TDGSW8Q3');</script>
<!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=yes">
    <title>Thank You</title>
    <link href="assets/css/aegis.css" type="text/css" rel="stylesheet" >
</head>
<script>
document.onreadystatechange = function () {
 /* var state = document.readyState
  if (state == 'interactive') {
         document.getElementById('thankyoucontents').style.visibility="hidden";
  } else if (state == 'complete') {
      setTimeout(function(){
         document.getElementById('interactive');
         document.getElementById('loading').style.visibility="hidden";
         document.getElementById('thankyoucontents').style.visibility="visible";
      },1000);
  }*/
}
</script>
<body class='ty-body-tag'>
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TDGSW8Q3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!--<div class="form-loading" id="loading">loading</div>-->
	  <div id="thankyoucontents">
			<div class="ty-header">
				<img src="<?php echo $clientPath . '/assets/images/aegis-main-logo.svg';?>" alt="logo" class="ty-header__logo">
			</div>
			<div class="ty-body">
				<img src="<?php echo $clientPath . '/assets/images/aegis-containers-img1.webp';?>" alt="" class="ty-body__bg-image">
				<div class="ty-content">
					<img src="<?php echo $clientPath . '/assets/images/ty-success-icon.svg';?>" alt="" class="ty-content__icon">
					<h2 class="ty-content__heading">Thank You</h2>
					<p class="ty-content__description">Your request for the Quote has been successfully submitted. Our Team will get back to you shortly</p>
					<a href="<?php echo $clientPath;?>/index.php" class="ty-content__btn">
						<img src="<?php echo $clientPath . '/assets/images/ty-home-icon.svg';?>" alt="" class="ty-content__btn-icon">
						<span class="ty-content__btn-text">Go Back to Home Page</span>
					</a>
				</div>
			</div>
	   </div>
</body>
</html>