<?php 
include("templates/header.php");
$sql = "SELECT * FROM aboutus where id=1 and status=0";
$db = new Database();
$result = $db->query($sql);
if(@$result->num_rows > 0) 
{
  $row = $result->fetch_array();
}
?>

<div class="site-content subpage-content about-us">

    <div class="site-content__section subpage-banner">
        <img src="<?php echo $clientPath . "/admin/uploads/aboutus/" . $row['image']; ?>"
            alt="<?php echo $row['alt'];?>" class="subpage-banner__img">
        <h1 class="subpage-banner__heading"><?php echo $row['caption'];?></h1>
    </div>
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
                    <a href="mailto:<?php echo $aegisSettingsResultRow['email2'];?>"
                        class="aegis-header-static-box__col2-emails-links"><?php echo $aegisSettingsResultRow['email2'];?></a>
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
    <div class="site-content__section subpage-main-content">
        <div class="subpage-content__section subpage-main-content__double-column-container container-fluid">
            <div class="subpage-main-content__col1">
                <?php 
		$row['description']=str_replace("../uploads/",$clientPath . "/admin/uploads/",$row['description']);
		echo $row['description'];?>
            </div>
            <div class="subpage-main-content__col2">
                <!-- <img src="../logistics/assets/images/about-ad.webp" alt=""> -->
                <?php include('templates/sidebar-services.php') ?>
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
                        class="aegis-solution__listbox-items-icon">
                    <span
                        class="aegis-solution__listbox-items-text"><?php echo $logisticssolutionsResultRow["icon_image1_description"]; ?></span>
                </div>
                <div class="aegis-solution__listbox-items">
                    <img src="<?php echo $clientPath . "/admin/uploads/logisticssolutions/" . $logisticssolutionsResultRow['icon_image2']; ?>"
                        alt="<?php echo $logisticssolutionsResultRow["icon_image2_alt"]; ?>"
                        class="aegis-solution__listbox-items-icon">
                    <span
                        class="aegis-solution__listbox-items-text"><?php echo $logisticssolutionsResultRow["icon_image2_description"]; ?></span>
                </div>
                <div class="aegis-solution__listbox-items">
                    <img src="<?php echo $clientPath . "/admin/uploads/logisticssolutions/" . $logisticssolutionsResultRow['icon_image3']; ?>"
                        alt="<?php echo $logisticssolutionsResultRow["icon_image3_alt"]; ?>"
                        class="aegis-solution__listbox-items-icon">
                    <span
                        class="aegis-solution__listbox-items-text"><?php echo $logisticssolutionsResultRow["icon_image3_description"]; ?></span>
                </div>
                <div class="aegis-solution__listbox-items">
                    <img src="<?php echo $clientPath . "/admin/uploads/logisticssolutions/" . $logisticssolutionsResultRow['icon_image4']; ?>"
                        alt="<?php echo $logisticssolutionsResultRow["icon_image4_alt"]; ?>"
                        class="aegis-solution__listbox-items-icon">
                    <span
                        class="aegis-solution__listbox-items-text"><?php echo $logisticssolutionsResultRow["icon_image4_description"]; ?></span>
                </div>
            </div>
            <p class="aegis-solution__description">
                <?php echo $logisticssolutionsResultRow["description"]; ?>
            </p>
        </div>
    </div>
    <!-- <div class="site-content__section no-padding-top advertisement-horizontal">
  <div class="advertisement-horizontal__container container-fluid">
    <a href="http://alimarabia.com/tours-and-travels" target="_blank">
    <img src="../logistics/assets/images/ad-hotels.jpg" alt="">
    </a>
  </div>
</div> -->

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



</div>

<?php include("templates/footer.php") ?>