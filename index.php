<?php include_once (dirname (__FILE__) . '/front/includes/init.php'); ?>
<!DOCTYPE html>
<html>
<?php include_once (MAIN_PATH . 'front/static/head.php'); ?>
<body>

<?php
include_once (MAIN_PATH . 'front/static/header.php');

if (file_exists (MAIN_PATH . 'front/content/' . CONTENT_PAGE . '.php'))
{
	include_once (MAIN_PATH . 'front/content/' . CONTENT_PAGE . '.php');
}
else
{
	include_once (MAIN_PATH . 'front/content/404' . '.php');
}

include_once (MAIN_PATH . 'front/static/footer.php');
include_once (MAIN_PATH . 'front/static/foot.php');
 ?>
</body>
</html>
