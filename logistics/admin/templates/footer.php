<?php
global $adminPath;
$adminPath=$_SESSION['adminPath'];
$sql = "SELECT * FROM aegis_settings where id=1 and status=0";
$aegisSettingsResult = $db->query($sql);
$aegisSettingsResultRow = $aegisSettingsResult->fetch_array();
?>
 </div>
 <div class="admin-footer">
        <div class="admin-footer__container">
            <div class="admin-footer__copyright">Copyright @ <span id="copyright_year"></span>.<?php echo $aegisSettingsResultRow['copyright'];?></div>
        </div>
    </div>
    <script src="<?php echo $adminPath; ?>assets/js/admin-script.js"></script>
</body>

</html>