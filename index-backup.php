<?php
 include 'frontend/templates/layout/header.php'; 
 require_once 'admin/includes/database.php'; 
 $db = new Database();
?>
<div class="site-content index">

<div class="swiper-container swiper1">
    <div class="swiper-wrapper">
	<?php
		$sql = "SELECT * FROM slider where status=0";
		$sliderResult = $db->query($sql); 

		if($sliderResult->num_rows > 0) 
		{
			while($row = $sliderResult->fetch_array()) 
			{
	?>
				<div class="swiper-slide">
					<div class="caption-wrapper">
						<h2 class="h2"><?php echo $row["caption"]; ?></h2>		
						<p class="btn-wrapper"><a href="<?php echo $row["link"]; ?>" class="btn1">More</a></p>	
					</div>	
					<img src="admin/uploads/<?php echo $row["image"]; ?>" alt="Flowers" class="lozad img hero-slider-image" width="360" height="460">	
				</div>
     <?php  
	 		}
        }	
	 ?>
    </div>
<div class="swiper-pagination1"></div>
<!-- Add Arrows -->
<div class="swiper-button-next1"></div>
<div class="swiper-button-prev1"></div>
</div>



<?php
		$sql = "SELECT * FROM service where status=0";
		$sliderResult = $db->query($sql); 

		if($sliderResult->num_rows > 0) 
		{
			while($row = $sliderResult->fetch_array()) 
			{
?>

						<div class="site-content__section about-us-brief no-padding-bottom">
								<div class="about-us-brief__container container">
								<div class="about-us-brief__col1">
										<img src="admin/uploads/<?php echo $row["image"]; ?>" alt="" class="about-us-brief__col1-img">
									</div>
								<div class="about-us-brief__col2">
									<h2 class="about-us-brief__col2-heading"><?php echo $row["caption"]; ?></h2>
									<p class="about-us-brief__col2-paragraph"><?php echo $row["description"]; ?></p>
									<div class="btn-wrapper">
										<a href="about-mtfe" class="btn1">More</a>
									</div>
								</div>
								</div>
						</div>
 <?php  
		   }
	   }	
 ?>    
	
	
	
	
    <div class="site-content__section services-brief no-padding-bottom">
        <div class="services-brief__container container">
        
            <div class="services-brief__col1">
                <h2 class="services-brief__col1-heading">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</h2>
                <p class="services-brief__col1-paragraph">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor natus odio error fuga nobis deserunt odit. Voluptas blanditiis nam, nostrum, inventore atque eos quis tempora est ipsa, obcaecati quaerat quia?</p>
                <div class="btn-wrapper">
                    <a href="about-mtfe" class="btn1">More</a>
                </div>
            </div>
            <div class="services-brief__col2">
                <!-- <img src="<?php echo $frontendPath;?>assets/images/services-brief-img.webp" alt="" class="services-brief__col2-img"> -->
            </div>
            
        </div>
    </div>    
    
    
    <div class="site-content__section features-brief no-padding-bottom">
        <div class="features-brief__container container">
        <div class="features-brief__col1">
                <!-- <img src="<?php echo $frontendPath;?>assets/images/features-brief-img.webp" alt="" class="features-brief__col1-img"> -->
            </div>
        <div class="features-brief__col2">
            <h2 class="features-brief__col2-heading">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</h2>
            <p class="features-brief__col2-paragraph">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor natus odio error fuga nobis deserunt odit. Voluptas blanditiis nam, nostrum, inventore atque eos quis tempora est ipsa, obcaecati quaerat quia?</p>
            <div class="btn-wrapper">
                <a href="about-mtfe" class="btn1">More</a>
            </div>
        </div>
        </div>
    </div>

    
    
	
</div>

<?php include 'frontend/templates/layout/footer.php'; ?>