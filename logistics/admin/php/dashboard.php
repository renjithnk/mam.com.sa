<?php
global $adminPath;
// error_reporting(E_ALL);
 // ini_set('display_errors', 1);
include '../templates/header.php'; 
include '../templates/sidebar.php';
?>
<div class="admin-main-section dashboard">
    <h1 class="admin-main-section__heading">Dashboard</h1>
    <div class="admin-main-section__content">
        <div class="dashboard__contents">
            <a class="dashboard__contents-items" href="../enquiry/list.php">
                <div class="dashboard__contents-icon">
                    <img src="<?php echo $adminPath;?>assets/images/enquiry-icon.svg" alt=""
                        class="dashboard__contents-icon-img">
                </div>
                <h2 class="dashboard__contents-items-label">Enquiry</h2>
            </a>
            <a class="dashboard__contents-items" href="../quoterequests/list.php">
                <div class="dashboard__contents-icon">
                    <img src="<?php echo $adminPath;?>assets/images/quotations-icon.svg" alt=""
                        class="dashboard__contents-icon-img">
                </div>
                <h2 class="dashboard__contents-items-label">Quotations</h2>
            </a>
            <a class="dashboard__contents-items" href="../seo_settings/list.php">
                <div class="dashboard__contents-icon">
                    <img src="<?php echo $adminPath;?>assets/images/seo-icon.svg" alt=""
                        class="dashboard__contents-icon-img">
                </div>
                <h2 class="dashboard__contents-items-label">SEO</h2>
            </a>
            <a class="dashboard__contents-items" href="../aegis_settings/list.php">
                <div class="dashboard__contents-icon">
                    <img src="<?php echo $adminPath;?>assets/images/profile-icon.svg" alt=""
                        class="dashboard__contents-icon-img">
                </div>
                <h2 class="dashboard__contents-items-label">Settings</h2>
            </a>
        </div>
    </div>
</div>
<?php include '../templates/footer.php'; ?>