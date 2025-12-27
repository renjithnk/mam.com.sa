<?php
global $adminPath;
global $db;
$adminPath=$_SESSION['adminPath'];
if(!isset($db))
{
  require_once '../includes/database.php';
}
$db = new Database();
$sql = "SELECT * FROM aegis_settings where id=1 and status=0";
$aegisSettingsResult = $db->query($sql);
$aegisSettingsResultRow = $aegisSettingsResult->fetch_array();
$logoImgPath=$adminPath . "/uploads/aegissettings/" . $aegisSettingsResultRow['logo'];
?>
<body>
    <div class="admin-header">
        <div class="admin-header__container">
            <div class="admin-header__logo">
                <a href="<?php echo $adminPath;?>php/dashboard.php"><img src="<?php echo $logoImgPath; ?>" alt=""></a>
            </div>
            <div class="admin-header__navigation">
                <div class="admin-header__navigation-trigger">Submenus</div>
                <div class="admin-header__navigation-content">
                    <!--<ul class="admin-header__navigation-ul">
                        <li class="admin-header__navigation-li"><a href=""
                                class="admin-header__navigation-link">Settings</a></li>
                        <li class="admin-header__navigation-li"><a href="" class="admin-header__navigation-link">User
                                Accounts</a></li>
                    </ul>-->
                </div>
            </div>
            
            <div class="admin-sidebar__trigger">Menus</div>
        </div>
    </div>
    <div class="admin-content">
        <div class="admin-sidebar">
            <div class="admin-sidebar__navigation">
                <div class="admin-sidebar__section">
                <h2 class="admin-sidebar__navigation-heading ">Main Pages</h2>

				<div class="accordion">
        <ul>
            <li>
                <div class="accordion-trigger">Home</div>
                <ul class="admin-sidebar__navigation-ul accordion-content">
                    <li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>slider/list.php"
                            class="admin-sidebar__navigation-link">Slider</a>
                    </li>
					<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>aboutbrief/list.php"
                            class="admin-sidebar__navigation-link">About Brief</a>
                    </li>
					<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>logisticsbrief/list.php"
                            class="admin-sidebar__navigation-link">Logistics Brief</a>
                    </li>
					<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>servicesbrief/list.php"
                            class="admin-sidebar__navigation-link">Services Brief</a>
                    </li>
					<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>service/list.php"
								class="admin-sidebar__navigation-link">Service</a></li>
					<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>gcctransportbrief/list.php"
                            class="admin-sidebar__navigation-link">GCC Transport Brief</a>
                    </li>
					<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>cards/list.php"
                            class="admin-sidebar__navigation-link">Cards</a>
                    </li>
					<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>movingandrelocationbrief/list.php"
                            class="admin-sidebar__navigation-link">Moving and Relocation Brief</a>
                    </li>
					<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>logisticssolutions/list.php"
                            class="admin-sidebar__navigation-link">Logistics Solutions</a>
                    </li>
					<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>seafreightbrief/list.php"
                            class="admin-sidebar__navigation-link">Sea Freight Brief</a>
                    </li>
					<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>testimonial/list.php"
                            class="admin-sidebar__navigation-link">Testimonials</a>
                    </li>
					<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>members_in/list.php"
                            class="admin-sidebar__navigation-link">Members In</a>
                    </li>
				</ul>
            </li>
			 <li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>aboutus/list.php"
								class="admin-sidebar__navigation-link">About Us</a>
						</li>
			 <li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>ourservice/edit.php?id=1"
								class="admin-sidebar__navigation-link">Our Service</a>
						</li>
			
            <li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>service/list.php"
								class="admin-sidebar__navigation-link">Service Detail Page</a>
						</li>
			<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>servicetestimonial/list.php"
								class="admin-sidebar__navigation-link">Service Pages Testimonial</a>
						</li>
			<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>gallery/list.php"
								class="admin-sidebar__navigation-link">Gallery</a>
						</li>
			
			<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>aegis_settings/list.php"
								class="admin-sidebar__navigation-link">Contact</a>
						</li>
			
						
			
		
			<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>videos/list.php"
								class="admin-sidebar__navigation-link">Videos</a>
								
			
			<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>faq/list.php"
								class="admin-sidebar__navigation-link">Services FAQ</a>
						</li>
			
			
			
			
			<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>enquiry/list.php"
								class="admin-sidebar__navigation-link">Enquiries Received</a>
						</li>
			
			
			<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>quoterequests/list.php"
								class="admin-sidebar__navigation-link">Quotations Received</a>
			</li>
			
			<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>movinttoukquoterequests/list.php"
								class="admin-sidebar__navigation-link">Moving To UK Quotations</a>
			</li>

			<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>internationalmovers/list.php"
								class="admin-sidebar__navigation-link">International Movers Quotations</a>
			</li>
        </ul>
    </div>
</div>




				<div class="admin-sidebar__section">
					<div class="admin-sidebar__navigation-heading">Sub Pages</div>
					 <ul class="admin-sidebar__navigation-ul">
					 
					    <li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>submenu/list.php"
								class="admin-sidebar__navigation-link">Sub Menu</a>
						</li>
					 	<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>page/list.php"
								class="admin-sidebar__navigation-link">Sub Pages</a>
						</li>
						<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>subpagesfaq/list.php"
								class="admin-sidebar__navigation-link">Sub Pages FAQ</a>
						</li>
						<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>subpagevideos/list.php"
								class="admin-sidebar__navigation-link">Sub Pages Videos</a>
						</li>	
					 	<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>subpagestestimonial/list.php"
								class="admin-sidebar__navigation-link">Sub Pages Testimonial</a>
						</li>	
					</ul>
                </div>



				<div class="admin-sidebar__section">
						<div class="admin-sidebar__navigation-heading">Landing Page</div>
						 <ul class="admin-sidebar__navigation-ul">
	
							<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>landingpageslider/list.php"
									class="admin-sidebar__navigation-link">Slider</a>
							</li>
							<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>landingpagesservice/list.php"
								class="admin-sidebar__navigation-link">Service</a>
							</li>
							<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>whychooseus/list.php"
								class="admin-sidebar__navigation-link">Why Choose Us</a>
							</li>
							<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>streefreemove/list.php"
								class="admin-sidebar__navigation-link">Stress Free move</a>
							</li>
							<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>landingpagestestimonial/list.php"
								class="admin-sidebar__navigation-link">Our Clients Say</a>
							</li>
						</ul>
				 </div>
				 
				 
				<!-- <div class="admin-sidebar__section">
						<div class="admin-sidebar__navigation-heading">Moving To UK</div>
						 <ul class="admin-sidebar__navigation-ul">
							<li class="admin-sidebar__navigation-li"><a href="<?php // echo $adminPath;?>movingtoukslider/list.php"
									class="admin-sidebar__navigation-link">Slider</a>
							</li>
							<li class="admin-sidebar__navigation-li"><a href="<?php // echo $adminPath;?>whychooseus/list.php"
								class="admin-sidebar__navigation-link">Why Choose Us</a>
							</li>
							<li class="admin-sidebar__navigation-li"><a href="<?php // echo $adminPath;?>streefreemove/list.php"
								class="admin-sidebar__navigation-link">Stress Free move</a>
							</li>
						</ul>
				 </div>-->




				<div class="admin-sidebar__section">
					<div class="admin-sidebar__navigation-heading">Blog</div>
					 <ul class="admin-sidebar__navigation-ul">	
						 <li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>blog/list.php"
								class="admin-sidebar__navigation-link">Blog</a>
						</li>
					 </ul>
				</div>

				
				<div class="admin-sidebar__section">
					<div class="admin-sidebar__navigation-heading">Settings</div>
					 <ul class="admin-sidebar__navigation-ul">	
						 <li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>seo_settings/list.php"
								class="admin-sidebar__navigation-link">SEO Settings</a>
						</li>
					 	<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>aegis_settings/list.php"
								class="admin-sidebar__navigation-link">Website Settings</a>
						</li>
						 <li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>changepassword/edit.php"
								class="admin-sidebar__navigation-link">Change Password</a>
						</li>
					</ul>
                </div>
				
				
				 <div class="admin-sidebar__section">
						<div class="admin-sidebar__navigation-heading">Logout</div>
					 <ul class="admin-sidebar__navigation-ul">	
					 	<li class="admin-sidebar__navigation-li"><a href="<?php echo $adminPath;?>php/logout.php"
								class="admin-sidebar__navigation-link"> Logout</a>
						</li>
					</ul>
				</div>
				
            </div>
        </div>
        
   