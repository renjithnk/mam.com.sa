<?php

?>
<?php
	require_once 'includes/database.php'; 
	include 'includes/config.php'; 
	$db = new Database();
    // URL Detection for Delivering Minified CSS & JS Assets
    $url =  $_SERVER['SERVER_NAME'];
//	echo $url;
?>
<?php	
	$sql = "SELECT * FROM aegis_settings where id=1 and status=0";
	$aegisSettingsResult = $db->query($sql);
	$aegisSettingsResultRow = $aegisSettingsResult->fetch_array();
	
	$pageName=basename($_SERVER['PHP_SELF']);
	$sql = "SELECT * FROM seo_settings where page_url='$pageName' and status=0";
	$seoSettingsResult = $db->query($sql);
	$seoSettingsResultRow = $seoSettingsResult->fetch_array();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=yes">
    <!-- Author -->
    <meta name="author" content="mam.com.sa">
    <!-- SEO Tags -->
    <meta name="robots" content="index">
    <meta name="description" content="<?php echo @$seoSettingsResultRow['meta_description'];?>">
    <meta name="keywords" content="<?php echo @$seoSettingsResultRow['meta_keywords'];?>">
    <!-- OG Tags -->
    <meta property="og:title" content="<?php echo @$seoSettingsResultRow['og_title'];?>">
    <meta property="og:url" content="<?php echo @$seoSettingsResultRow['og_url'];?>">
    <meta property="og:type" content="<?php echo @$seoSettingsResultRow['og_type'];?>">
    <meta property="og:description" content="<?php echo @$seoSettingsResultRow['og_description'];?>">
    <meta property="og:image" content="<?php echo @$seoSettingsResultRow['og_image'];?>">
    <!-- Webpage Title -->
    <title><?php echo @$seoSettingsResultRow['page_title'];?></title>
    <link rel="canonical" href="<?php echo @$seoSettingsResultRow['canonical_link'];?>">
    <!-- Main CSS -->

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>





    <?php 
    if($url === "localhost.mam.com.sa"){
    echo '<link href="assets/css/styles.css" type="text/css" rel="stylesheet" >';
    }
	else if($url === "localhost"){
    echo '<link href="assets/css/styles.css" type="text/css" rel="stylesheet" >';
    }
    else 
	{
		if(($url === "mam.com.sa") || ($url === "www.mam.com.sa"))
		{
			echo '<link href="assets/css/styles.min.css" type="text/css" rel="stylesheet" >';
		}
	}
    ?>
    <!-- Google Tag Manager -->
    <!-- <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-TDGSW8Q3');
    </script>End Google Tag Manager -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <!-- Google tag (gtag.js) -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11377362875"></script> -->
    <!-- <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'AW-11377362875');
    </script> -->

</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TDGSW8Q3" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <header class="aegis-site-header" style="position:relative;z-index:10">
        <div class="aegis-site-header__container">
            <div class="aegis-site-header__logo">
                <a href="index.php" class="aegis-site-header__logo-link">
                    <?php
			   $logoImgPath=$clientPath . "/admin/uploads/aegissettings/" . $aegisSettingsResultRow['logo'];
			?>
                    <img src="<?php echo $logoImgPath; ?>" alt="<?php echo $aegisSettingsResultRow['logo_alt'];?>"
                        class="site-header__logo-img" width="256" height="60" loading="lazy"></a>

            </div>
            <div class="main-nav main-nav--one">
                <div class="main-nav__trigger">
                    <div class="main-nav__trigger-item"></div>
                </div>
                <div class="main-nav__content">
                    <ul class="main-nav__ul">
                        <li class="main-nav__item">
                            <a href="index.php" class="main-nav__link">Home</a>
                        </li>
                        <li class="main-nav__item">
                            <a href="about-us.php" class="main-nav__link">About</a>
                        </li>
                        <li class="main-nav__item">
                            <a href="our-services.php" class="main-nav__link submenu-trigger">Services</a>
                            <ul class="main-nav__submenu-content">


                                <?php
					   $servicesMenuSql="select * from service where status = 0";
					   $servicesMenuResult = $db->query($servicesMenuSql);
					  /* while(@$servicesMenuRow = $servicesMenuResult->fetch_array()) 
					   {*/
					?>

                                <li class="main-nav__item">
                                    <a href="moving-and-relocation.php"
                                        class="main-nav__link submenu-trigger mobile-trigger">Moving & Relocation</a>
                                    <ul class="main-nav__submenu-content">
                                        <li class="main-nav__item">
                                            <a href="movers-in-al-bustan.php" class="main-nav__link">Movers in
                                                Al-Bustan</a>
                                        </li>
                                        <li class="main-nav__item">
                                            <a href="movers-in-jeddah.php" class="main-nav__link">Movers in Jeddah</a>
                                        </li>
                                        <li class="main-nav__item">
                                            <a href="movers-in-khobar.php" class="main-nav__link">Movers in Khobar</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="main-nav__item">
                                    <a href="international-relocation.php" class="main-nav__link">International
                                        Relocation</a>
                                </li>
                                <li class="main-nav__item">
                                    <a href="warehousing.php" class="main-nav__link">Warehousing</a>
                                </li>
                                <li class="main-nav__item">
                                    <a href="logistics.php" class="main-nav__link submenu-trigger">Logistics</a>
                                </li>
                                <li class="main-nav__item">
                                    <a href="customs-clearance.php" class="main-nav__link submenu-trigger">Customs
                                        Clearance</a>
                                </li>
                                <li class="main-nav__item">
                                    <a href="office-and-industrial-moving.php"
                                        class="main-nav__link submenu-trigger">Office & Industrial
                                        Moving</a>
                                </li>
                                <li class="main-nav__item">
                                    <a href="furniture-fixtures-and-equipments-moving.php"
                                        class="main-nav__link submenu-trigger">Furniture,
                                        Fixtures & Equipments</a>
                                </li>
                                <li class="main-nav__item">
                                    <a href="sea-freight.php" class="main-nav__link submenu-trigger">Sea Freight</a>
                                </li>
                                <li class="main-nav__item">
                                    <a href="air-freight.php" class="main-nav__link submenu-trigger">Air Freight</a>
                                </li>
                                <li class="main-nav__item">
                                    <a href="gcc-transport.php" class="main-nav__link submenu-trigger">GCC Transport</a>
                                </li>
                                <li class="main-nav__item">
                                    <a href="pet-relocation.php" class="main-nav__link submenu-trigger">Pet
                                        Relocation</a>
                                </li>
                                <li class="main-nav__item">
                                    <a href="heavy-equipment-rental-in-saudi-arabia.php"
                                        class="main-nav__link submenu-trigger">Heavy Equipment Rental In Saudi
                                        Arabia</a>
                                </li>
                                <?php
				//	}
					?>
                            </ul>
                        </li>
                        <li class="main-nav__item">
                            <a href="gallery.php" class="main-nav__link">Gallery</a>
                        </li>
                        <!-- <li class="main-nav__item">
                            <a href="blog" class="main-nav__link">Blog</a>
                        </li> -->
                        <li class="main-nav__item">
                            <a href="contact-us.php" class="main-nav__link">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="request-quote-and-badge-wrapper">
                <div class="request-a-quote-btn">
                    <a href="request-a-quote.php" class="btn1-text request-a-quote-btn__link">
                        <img src="../logistics/assets/images/request-a-quote-icon.svg" alt="request-a-quote-icon"
                            class="request-a-quote-btn__icon">
                        Request A Quote</a>
                </div>
                <!-- <div class="parent-company-badge">
                    <img src="../logistics/assets/images/al-manar-group-icon.svg" alt="al-manar-group"
                        class="parent-company-badge__logo" loading="lazy" width="55" height="41">
                    <div class="parent-company-badge__label">
                        <div class="parent-company-badge__label-line1">Member of</div>
                        <div class="parent-company-badge__label-line2">Morooj Al Manar Group</div>
                    </div>
                </div> -->
            </div>
            <div class="social-media">
                <div class="social-media__link-block">
                    <a href="<?php echo $aegisSettingsResultRow['insta_link'];?>" target="_blank"
                        class="social-media__link">
                        <img src="../logistics/assets/images/instagram-logo.svg" alt="instagram-logo"
                            class="social-media__link-img" loading="lazy">
                        <img src="../logistics/assets/images/instagram-logo-white.svg" alt="instagram-logo-white"
                            class="social-media__link-img-white" loading="lazy">
                    </a>
                    <a href="<?php echo $aegisSettingsResultRow['fb_link'];?>" target="_blank"
                        class="social-media__link">
                        <img src="../logistics/assets/images/facebook-logo.svg" alt="facebook-logo"
                            class="social-media__link-img" loading="lazy">
                        <img src="../logistics/assets/images/facebook-logo-white.svg" alt="facebook-logo-white"
                            class="social-media__link-img-white" loading="lazy">
                    </a>
                    <a href="<?php echo $aegisSettingsResultRow['linkedin_link'];?>" target="_blank"
                        class="social-media__link">
                        <img src="../logistics/assets/images/linkedin-logo.svg" alt="linked-in-logo"
                            class="social-media__link-img" loading="lazy">
                        <img src="../logistics/assets/images/linkedin-logo-white.svg" alt="linked-in-logo-white"
                            class="social-media__link-img-white" loading="lazy">
                    </a>

                </div>
                <div class="social-media__label">Follow us on</div>
            </div>
        </div>

        <div class="floating-buttons">
            <a href="https://wa.me/+966555881748/?text=Hi&nbsp;Aegis&nbsp;Team,&nbsp;I&nbsp;want&nbsp;a&nbsp;moving&nbsp;quote?"
                class="floating-buttons__links whatsapp">
                <img src="../logistics/assets/images/floating-whatsapp-icon.svg" alt="floating-button1"
                    class="floating-buttons__icon whatsapp__icon">
            </a>
            <a href="tel:+966555881748" class="floating-buttons__links telecall">
                <img src="../logistics/assets/images/telecall-icon.svg" alt="floating-button2"
                    class="floating-buttons__icon telecall__icon">
            </a>
            <a href="https://maps.app.goo.gl/jjEkyxZqYm6gA4HGA" target="_blank"
                class="floating-buttons__links gmblocation">
                <img src="../logistics/assets/images/gmblocation-icon.svg" alt="floating-button3"
                    class="floating-buttons__icon gmblocation__icon">
            </a>
        </div>

    </header>