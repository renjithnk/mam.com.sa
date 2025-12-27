<?php
  include("templates/header.php");
	$sql = "SELECT * FROM slider where status=0";
	$result = $db->query($sql);
?>

<div class="site-content">
    <div class="site-content__section swiper1">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <?php
		if(@$result->num_rows > 0) 
		{
				$sliderPath="";
				while ($row = $result->fetch_array()) 
				{
						 if($row["image"] != "")
						 {
						 	$sliderPath=$clientPath . "/admin/uploads/slider/" . $row["image"];
						 }
				?>
            <div class="swiper-slide">
                <img src="<?php echo $sliderPath;?>" alt="<?php echo $row["alt"]; ?>" class="img swiper1__image"
                    width="1360" height="690">
                <div class="swiper1__content">
                    <h2 class="swiper1__heading"><?php echo $row["caption"]; ?></h2>
                </div>
            </div>
            <?php
			   }
	    }
		?>


        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination1"></div>

        <!-- If we need navigation buttons -->
        <!-- <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div> -->

        <!-- If we need scrollbar -->
        <!-- <div class="swiper-scrollbar"></div> -->
    </div>


    <?php	
	$sql = "SELECT * FROM about_brief where id=1 and status=0";
	$abtResult = $db->query($sql);
	$abtResultRow = $abtResult->fetch_array();
?>

    <div class="aegis-header-static-box">
        <div class="aegis-header-static-box__col1">
            <div class="aegis-header-static-box__col1-box">
                <img src="../logistics/assets/images/safe-and-affordable-icon.svg" alt="safe-and-affordable"
                    class="aegis-header-static-box__col1-box-icon" loading="lazy" width="65" height="57">
                <div class="aegis-header-static-box__col1-box-text"><?php echo $aegisSettingsResultRow['caption'];?>
                </div>
            </div>
        </div>
        <div class="aegis-header-static-box__col2">
            <div class="aegis-header-static-box__col2-emails">
                <div class="aegis-header-static-box__col2-emails-label">
                    <img src="../logistics/assets/images/email-icon-white.svg" alt="email-icon"
                        class="aegis-header-static-box__col2-emails-label-icon" width="22" height="18" loading="lazy">
                    E-mail Us at
                </div>
                <div class="aegis-header-static-box__col2-emails-container">
                    <a href="mailto:<?php echo $aegisSettingsResultRow['email1'];?>"
                        class="aegis-header-static-box__col2-emails-links"><?php echo $aegisSettingsResultRow['email1'];?></a>
                    <span class="aegis-header-static-box__col2-emails-splitter"></span>
                    <!-- <a href="mailto:<?php echo $aegisSettingsResultRow['email2'];?>"
                        class="aegis-header-static-box__col2-emails-links"><?php echo $aegisSettingsResultRow['email2'];?></a> -->
                </div>
            </div>
            <div class="aegis-header-static-box__col2-telno">
                <div class="aegis-header-static-box__col2-telno-label">
                    <img src="../logistics/assets/images/tel-icon-white.svg" alt="tel-icon"
                        class="aegis-header-static-box__col2-emails-label-icon" loading="lazy" width="16" height="16">
                    For Enquiries Call
                </div>
                <?php
				$contactno1=str_replace(" ","",$aegisSettingsResultRow['contactno1']);
			?>
                <a href="tel:<?php echo $contactno1;?>"
                    class="aegis-header-static-box__col2-telno-link"><?php echo $aegisSettingsResultRow['contactno2'];?></a>
            </div>
        </div>
    </div>

    <div class="site-content__section aegis-provision">
        <div class="container-fluid aegis-provision__container">
            <div class="aegis-provision__col1">
                <ul class="aegis-provision__col1-listbox">
                    <li class="aegis-provision__col1-listbox-li">
                        <img src="../logistics/assets/images/packing-moving-icon.svg" alt="packing-moving-icon"
                            class="aegis-provision__col1-listbox-icon" width="46" height="41" loading="lazy">
                        Packing & Moving
                    </li>
                    <li class="aegis-provision__col1-listbox-li">
                        <img src="<?php echo $clientPath . "/admin/uploads/aboutbrief/" . $abtResultRow['icon_image1']; ?>"
                            alt="<?php echo $abtResultRow['icon_image1_alt']; ?>"
                            class="aegis-provision__col1-listbox-icon" width="41" height="33" loading="lazy">
                        <?php echo $abtResultRow['icon_image1_description']; ?>
                    </li>
                    <li class="aegis-provision__col1-listbox-li">
                        <img src="<?php echo $clientPath . "/admin/uploads/aboutbrief/" . $abtResultRow['icon_image2']; ?>"
                            alt="<?php echo $abtResultRow['icon_image2_alt']; ?>"
                            class="aegis-provision__col1-listbox-icon" width="44" height="36" loading="lazy">
                        <?php echo $abtResultRow['icon_image2_description']; ?>
                    </li>
                    <li class="aegis-provision__col1-listbox-li">
                        <img src="<?php echo $clientPath . "/admin/uploads/aboutbrief/" . $abtResultRow['icon_image3']; ?>"
                            alt="<?php echo $abtResultRow['icon_image3_alt']; ?>"
                            class="aegis-provision__col1-listbox-icon" width="38" height="38" loading="lazy">
                        <?php echo $abtResultRow['icon_image3_description']; ?>
                    </li>
                </ul>
            </div>
            <div class="aegis-provision__col2">
                <h2 class="aegis-provision__col2-heading"><?php echo $abtResultRow['caption']; ?></h2>
                <p class="aegis-provision__col2-p"><?php echo $abtResultRow['description']; ?></p>
                <a href="about-us.php" class="btn1">More</a>
            </div>
            <div class="aegis-provision__col3">
                <img src="../logistics/assets/images/aegis-provision-img.webp" alt="aegis-provision"
                    class="aegis-provision__col3-img" width="350" height="530" loading="lazy">
            </div>
        </div>
    </div>



    <?php	
	$sql = "SELECT * FROM logistics_brief where id=1 and status=0";
	$logisticsResult = $db->query($sql);
	$logisticsResultRow = $logisticsResult->fetch_array();
?>


    <div class="aegis-quick">
        <div class="aegis-quick__container container-fluid">
            <h2 class="aegis-quick__heading"><?php echo $logisticsResultRow['title']; ?></h2>
            <p class="aegis-quick__description"><?php echo $logisticsResultRow['description']; ?></p>
            <div class="aegis-quick__img-container">
                <img src="<?php echo $clientPath . "/admin/uploads/logisticsbrief/" . $logisticsResultRow['image']; ?>"
                    alt="<?php echo $logisticsResultRow['alt']; ?>" class="aegis-quick__img" width="1360" height="540"
                    loading="lazy">
            </div>
            <div class="aegis-quick__box">
                <div class="aegis-quick__box-col1">
                    <div class="aegis-quick__box-col1-caption">
                        <h3 class="aegis-quick__box-col1-caption-heading">
                            <?php echo $logisticsResultRow['short_title']; ?></h3>
                    </div>
                </div>
                <div class="aegis-quick__box-col2">
                    <div class="aegis-quick__box-description">
                        <p class="aegis-quick__box-description-p">
                            <?php echo $logisticsResultRow['short_description']; ?></p>
                        <a href="logistics.php" class="btn2">More</a>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <?php	
	$service_sql="SELECT caption,page_url FROM service";
    $service_result = $db->query($service_sql);
	$sql = "SELECT * FROM services_brief where id=1 and status=0";
	$servicesResult = $db->query($sql);
	$servicesResultRow = $servicesResult->fetch_array();
?>

    <div class="site-content__section aegis-services-brief">
        <div class="aegis-services-brief__container container-fluid">
            <div class="aegis-services-brief__wrapper">
                <div class="aegis-services-brief__col1">
                    <ul class="aegis-services-brief__listbox">
                        <li class="aegis-services-brief__listbox-li">
                            <img src="<?php echo $clientPath . "/admin/uploads/servicesbrief/" . $servicesResultRow['icon_image1']; ?>"
                                alt="<?php echo $servicesResultRow['icon_image1_alt']; ?>" width="40" height="45"
                                loading="lazy">
                            <?php echo $servicesResultRow['icon_image1_description']; ?>
                        </li>
                        <li class="aegis-services-brief__listbox-li">
                            <img src="<?php echo $clientPath . "/admin/uploads/servicesbrief/" . $servicesResultRow['icon_image2']; ?>"
                                alt="<?php echo $servicesResultRow['icon_image2_alt']; ?>" width="41" height="43"
                                loading="lazy">
                            <?php echo $servicesResultRow['icon_image2_description']; ?>
                        </li>
                        <li class="aegis-services-brief__listbox-li">
                            <img src="<?php echo $clientPath . "/admin/uploads/servicesbrief/" . $servicesResultRow['icon_image3']; ?>"
                                alt="<?php echo $servicesResultRow['icon_image3_alt']; ?>" width="45" height="28"
                                loading="lazy">
                            <?php echo $servicesResultRow['icon_image3_description']; ?>
                        </li>
                    </ul>
                </div>
                <div class="aegis-services-brief__col2">
                    <h2 class="aegis-services-brief__col2-heading"><?php echo @$servicesResultRow['caption']; ?></h2>
                    <p class="aegis-services-brief__col2-description"><?php echo @$servicesResultRow['description']; ?>
                    </p>
                    <div class="aegis-services-brief__col2-bullet-box">
                        <?php
		   if(@$service_result->num_rows > 0) 
			{
		?>
                        <ul class="aegis-services-brief__col2-bullet-box-ul">
                            <?php  
				while($row = $service_result->fetch_array()) 
				{
		 ?>
                            <li class="aegis-services-brief__col2-bullet-box-li"><?php echo $row['caption'];?></li>
                            <?php
		 		}
			}
		 ?>
                        </ul>
                    </div>
                    <a href="our-services.php" class="btn1">More</a>
                </div>
            </div>
        </div>
    </div>



    <?php	
	$sql = "SELECT * FROM gcctransport_brief where id=1 and status=0";
	$gcctransportResult = $db->query($sql);
	$gcctransportResultRow = $gcctransportResult->fetch_array();
?>

    <div class="aegis-trucks">
        <div class="aegis-trucks__container container-fluid">
            <!-- <h2 class="aegis-trucks__heading">Quick & Powerful Solution for your all Logistic Requirements</h2> -->
            <!-- <p class="aegis-trucks__description">Transportation is among the more vital economic activities for a business. By moving goods from locations where they are sourced to locations </p> -->
            <div class="aegis-trucks__img-container">
                <img src="../logistics/assets/images/aegis-trucks-image.webp" alt="aegis-trucks"
                    class="aegis-trucks__img" width="1280" height="473" loading="lazy">
                <div class="aegis-trucks__caption-box">
                    <h3 class="aegis-trucks__caption-box-heading"><?php echo $gcctransportResultRow["title"]; ?></h3>
                </div>
            </div>
            <div class="aegis-trucks__box">
                <div class="aegis-trucks__box-col1">
                    <div class="aegis-trucks__box-description">
                        <p class="aegis-trucks__box-description-p"><?php echo $gcctransportResultRow["description"]; ?>
                        </p>
                        <a href="gcc-transport.php" class="btn1">More</a>
                    </div>
                </div>
                <div class="aegis-trucks__box-col2">
                    <div class="aegis-trucks__box-col2-caption">
                        <img src="<?php echo $clientPath . "/admin/uploads/gcctransportbrief/" . $gcctransportResultRow['icon_image1']; ?>"
                            alt="<?php echo $gcctransportResultRow['icon_image1_alt']; ?>"
                            class="aegis-trucks__box-col2-caption-img" width="53" height="47" loading="lazy">
                        <p class="aegis-trucks__box-col2-caption-text">
                            <?php echo $gcctransportResultRow["icon_image1_description"]; ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <?php	
	$sql = "SELECT * FROM cards where status=0 and id=1";
	$cardsResult = $db->query($sql);
	$cardsResultRow = $cardsResult->fetch_array();
?>

    <div class="site-content__section aegis-mission">
        <div class="aegis-mission__container container-fluid">
            <h2 class="aegis-mission__heading"><?php echo $cardsResultRow["heading"]; ?></h2>
            <div class="aegis-mission__listbox">
                <?php
				if(@$cardsResultRow) 
				{
						 $cardsImgPath1="";
						 $cardsImgPath2="";
						 $cardsImgPath3="";
						
						 if($cardsResultRow["image1"] != "")
						 {
							$cardsImgPath1=$clientPath . "/admin/uploads/cards/" . $cardsResultRow["image1"];
						 }
						 if($cardsResultRow["image2"] != "")
						 {
							 $cardsImgPath2=$clientPath . "/admin/uploads/cards/" . $cardsResultRow["image2"];
						 }
						 if($cardsResultRow["image3"] != "")
						 {
							$cardsImgPath3=$clientPath . "/admin/uploads/cards/" . $cardsResultRow["image3"];
						 }
				?>
                <div class="aegis-mission__listbox-items">
                    <img src="<?php echo $cardsImgPath1;?>" alt="<?php echo $cardsResultRow["alt1"]; ?>"
                        class="aegis-mission__listbox-img" width="381" height="175" loading="lazy">
                    <div class="aegis-mission__listbox-description-box">
                        <h2 class="aegis-mission__listbox-heading"><?php echo $cardsResultRow["title1"]; ?></h2>
                        <p class="aegis-mission__listbox-p"><?php echo $cardsResultRow["description1"]; ?></p>
                    </div>
                </div>
                <div class="aegis-mission__listbox-items">
                    <img src="<?php echo $cardsImgPath2;?>" alt="<?php echo $cardsResultRow["alt2"]; ?>"
                        class="aegis-mission__listbox-img" width="381" height="175" loading="lazy">
                    <div class="aegis-mission__listbox-description-box">
                        <h2 class="aegis-mission__listbox-heading"><?php echo $cardsResultRow["title2"]; ?></h2>
                        <p class="aegis-mission__listbox-p"><?php echo $cardsResultRow["description2"]; ?></p>
                    </div>
                </div>
                <div class="aegis-mission__listbox-items">
                    <img src="<?php echo $cardsImgPath3;?>" alt="<?php echo $cardsResultRow["alt3"]; ?>"
                        class="aegis-mission__listbox-img" width="381" height="175" loading="lazy">
                    <div class="aegis-mission__listbox-description-box">
                        <h2 class="aegis-mission__listbox-heading"><?php echo $cardsResultRow["title3"]; ?></h2>
                        <p class="aegis-mission__listbox-p"><?php echo $cardsResultRow["description3"]; ?></p>
                    </div>
                </div>
                <?php
				}
		   ?>
            </div>
        </div>
    </div>



    <?php	
	$sql = "SELECT * FROM movingandrelocation_brief where id=1 and status=0";
	$movingandrelocationResult = $db->query($sql);
	$movingandrelocationResultRow = $movingandrelocationResult->fetch_array();
?>


    <div class="aegis-pack">
        <div class="aegis-pack__container container-fluid">
            <!-- <h2 class="aegis-pack__heading">Quick & Powerful Solution for your all Logistic Requirements</h2> -->
            <!-- <p class="aegis-pack__description">Transportation is among the more vital economic activities for a business. By moving goods from locations where they are sourced to locations where they are demanded, transportation provides the essential service of linking a company to its suppliers and customers.</p> -->
            <div class="aegis-pack__img-container">
                <img src="<?php echo $clientPath . "/admin/uploads/movingandrelocationbrief/" . $movingandrelocationResultRow['image']; ?>"
                    alt="<?php echo $movingandrelocationResultRow['alt']; ?>" class="aegis-pack__img" width="1360"
                    height="690" loading="lazy">
            </div>
            <div class="aegis-pack__box">
                <div class="aegis-pack__box-col1">
                    <div class="aegis-pack__box-col1-caption">
                        <h3 class="aegis-pack__box-col1-caption-heading">
                            <?php echo $movingandrelocationResultRow["title"]; ?></h3>
                    </div>
                </div>
                <div class="aegis-pack__box-col2">
                    <div class="aegis-pack__box-description">
                        <p class="aegis-pack__box-description-p">
                            <?php echo $movingandrelocationResultRow["description"]; ?></p>
                        <a href="moving-and-relocation.php" class="btn2">More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php	
	$sql = "SELECT * FROM logisticssolutions where id=1 and status=0";
	$logisticssolutionsResult = $db->query($sql);
	$logisticssolutionsResultRow = $logisticssolutionsResult->fetch_array();
?>


    <div class="site-content__section aegis-solution">
        <div class="aegis-solution__container container-fluid">
            <h2 class="aegis-solution__heading"><?php echo $logisticssolutionsResultRow["caption"]; ?></h2>
            <div class="aegis-solution__listbox">
                <div class="aegis-solution__listbox-items">
                    <img src="<?php echo $clientPath . "/admin/uploads/logisticssolutions/" . $logisticssolutionsResultRow['icon_image1']; ?>"
                        alt="<?php echo $logisticssolutionsResultRow["icon_image1_alt"]; ?>"
                        class="aegis-solution__listbox-items-icon" width="39" height="44" loading="lazy">
                    <span
                        class="aegis-solution__listbox-items-text"><?php echo $logisticssolutionsResultRow["icon_image1_description"]; ?></span>
                </div>
                <div class="aegis-solution__listbox-items">
                    <img src="<?php echo $clientPath . "/admin/uploads/logisticssolutions/" . $logisticssolutionsResultRow['icon_image2']; ?>"
                        alt="<?php echo $logisticssolutionsResultRow["icon_image2_alt"]; ?>"
                        class="aegis-solution__listbox-items-icon" width="30" height="45" loading="lazy">
                    <span
                        class="aegis-solution__listbox-items-text"><?php echo $logisticssolutionsResultRow["icon_image2_description"]; ?></span>
                </div>
                <div class="aegis-solution__listbox-items">
                    <img src="<?php echo $clientPath . "/admin/uploads/logisticssolutions/" . $logisticssolutionsResultRow['icon_image3']; ?>"
                        alt="<?php echo $logisticssolutionsResultRow["icon_image3_alt"]; ?>"
                        class="aegis-solution__listbox-items-icon" width="36" height="36" loading="lazy">
                    <span
                        class="aegis-solution__listbox-items-text"><?php echo $logisticssolutionsResultRow["icon_image3_description"]; ?></span>
                </div>
                <div class="aegis-solution__listbox-items">
                    <img src="<?php echo $clientPath . "/admin/uploads/logisticssolutions/" . $logisticssolutionsResultRow['icon_image4']; ?>"
                        alt="<?php echo $logisticssolutionsResultRow["icon_image4_alt"]; ?>"
                        class="aegis-solution__listbox-items-icon" width="33" height="36" loading="lazy">
                    <span
                        class="aegis-solution__listbox-items-text"><?php echo $logisticssolutionsResultRow["icon_image4_description"]; ?></span>
                </div>
            </div>
            <p class="aegis-solution__description">
                <?php echo $logisticssolutionsResultRow["description"]; ?>
            </p>
        </div>
    </div>


    <?php	
	$sql = "SELECT * FROM seafreight_brief where id=1 and status=0";
	$seafreightResult = $db->query($sql);
	$seafreightResultRow = $seafreightResult->fetch_array();
?>

    <div class="site-content__section aegis-containers">
        <div class="aegis-containers__container container-fluid">
            <div class="aegis-containers__img-container">
                <img src="<?php echo $clientPath . "/admin/uploads/seafreightbrief/" . $seafreightResultRow['image']; ?>"
                    alt="aegis-containers" width="1360" height="670" class="aegis-containers__img" loading="lazy">
                <div class="aegis-containers__caption-box">
                    <h3 class="aegis-containers__caption-text"><?php echo $seafreightResultRow["title"]; ?></h3>
                </div>
            </div>
            <div class="aegis-containers__box">
                <div class="aegis-containers__box-col1">
                    <div class="aegis-containers__box-col1-content-box">
                        <img src="<?php echo $clientPath . "/admin/uploads/seafreightbrief/" . $seafreightResultRow['icon_image1']; ?>"
                            alt="aegis-containers-box" class="aegis-containers__box-col1-content-box-img" width="59"
                            height="48" loading="lazy">
                        <p class="aegis-containers__box-col1-content-box-text">
                            <?php echo $seafreightResultRow["icon_image1_description"]; ?></p>
                    </div>
                </div>
                <div class="aegis-containers__box-col2">
                    <div class="aegis-containers__box-col2-content-box">
                        <p class="aegis-containers__box-col2-content-box-description">
                            <?php echo $seafreightResultRow["description"]; ?></p>
                        <a href="sea-freight.php" class="btn2">More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-content__section aegis-testimonials no-padding-top">
        <div class="aegis-testimonials__container container-fluid">
            <h3 class="aegis-testimonials__heading">Testimonials</h3>
            <div class="swiper2 aegis-testimonials__swiper2">
                <div class="swiper-wrapper aegis-testimonials__wrapper">
                    <?php
				$sql = "SELECT * FROM testimonial where status=0 order by id desc";
				$result = $db->query($sql);
				if(@$result->num_rows > 0) 
				{
						$sliderPath="";
						while ($row = $result->fetch_array()) 
						{
			   ?>
                    <div class="swiper-slide aegis-testimonials__slide">
                        <img class="aegis-testimonials__quote" src="../logistics/assets/images/testimonials-quote.svg"
                            width="67" height="41" alt="testimonials-quote" loading="lazy">
                        <?php 
								  $row['comment']=str_replace("../uploads/",$clientPath . "/admin/uploads/",$row['comment']);
								 echo $row['comment']; ?>
                        <h4 class="aegis-testimonials__name"><?php echo $row['name']; ?></h4>
                        <p class="aegis-testimonials__service"><?php echo $row['location']; ?></p>
                    </div>
                    <?php
						}
				}
			 ?>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination2 aegis-testimonials__pagination"></div>
                <div class="leave-review no-padding-top">
                    <a href="https://g.page/r/Cd_MIk29TWozEBM/review" target='_blank' class="leave-review__link">
                        <img src="assets/images/leave-review-button.svg" alt="" class="leave-review__image"></a>
                </div>
            </div>
        </div>
    </div>


    <div class="site-content__section aegis-question">
        <div class="aegis-question__container container-fluid">
            <h2 class="aegis-question__heading">Have a Question Regarding Our Features</h2>
            <h3 class="aegis-question__subheading">Call us on this number</h3>
            <p class="aegis-question__telnumber-wrapper">
                <a href="tel:+966555881748" class="aegis-question__telnumber"><img
                        src="../logistics/assets/images/tel-icon-white.svg" alt="aegis-telenumber"
                        class="aegis-question__telnumber-icon" width="16" height="16" loading="lazy"><span
                        class="aegis-question__telnumber-digit"><?php echo $aegisSettingsResultRow['contactno2'];?></span></a>
            </p>
            <p class="aegis-question__or">or fill the following form with your queries
                and we'll get back to you</p>
            <?php include('forms/enquiry-form.php') ?>
        </div>
    </div>



    <?php	
	$sql = "SELECT * FROM members_in where id=1 and status=0";
	$members_inResult = $db->query($sql);
	$members_inResultRow = $members_inResult->fetch_array();
?>
    <div class="site-content__section aegis-member">
        <div class="aegis-member__container container-fluid">
            <div class="aegis-member__col1">
                <img src="<?php echo $clientPath . "/admin/uploads/members_in/" . $members_inResultRow['image1']; ?>"
                    alt="<?php echo @$members_inResultRow['image1_alt']; ?>" class="aegis-member__col1-img" width="630"
                    height="320" loading="lazy">
            </div>
            <div class="aegis-member__col2">
                <div class="aegis-member-box">
                    <div class="aegis-member-box__row1">
                        <h3 class="aegis-member-box__heading"><?php echo $members_inResultRow['title']; ?></h3>
                        <p class="aegis-member-box__p"><?php echo $members_inResultRow['description']; ?></p>
                    </div>
                    <div class="aegis-member-box__row2">

                        <div class="aegis-member-box__col1">
                            <img src="<?php echo $clientPath . "/admin/uploads/members_in/" . $members_inResultRow['image2']; ?>"
                                alt="<?php echo @$members_inResultRow['image2_alt']; ?>" class="aegis-member-box__logo"
                                width="224" height="74" loading="lazy">
                        </div>
                        <div class="aegis-member-box__col2">
                            <img src="assets/images/iam-logo.svg" class="aegis-member-box__logo" width="224" height="74"
                                loading="lazy">
                        </div>
                        <div class="aegis-member-box__col3">
                            <img src="assets/images/global-logistics-alliance-logo.webp" class="aegis-member-box__logo"
                                width="224" height="74" loading="lazy">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="iam">
        <div class="iam__container container">
            <div class="site-content__section no-padding-top iam-video">
                <iframe width="900" height="427" src="https://www.youtube.com/embed/M5jXK7D6EnY"
                    title="Why are IAM companies trustworthy to choose?" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<?php include("templates/footer.php") ?>