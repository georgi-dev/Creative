<?php
include_once (dirname (__FILE__) . '/includes/init.php');
?>

<!DOCTYPE html>
<html>

<?php
include_once (MAIN_PATH . 'admin/static/head.php');
?>

<body>

<?php
include_once (MAIN_PATH . 'admin/content/header.php');

if (file_exists (MAIN_PATH . 'admin/content/' . CONTENT_PAGE . '.php'))
{
	include_once (MAIN_PATH . 'admin/content/' . CONTENT_PAGE . '.php');
}
else
{
	include_once (MAIN_PATH . 'admin/content/404' . '.php');
}

include_once (MAIN_PATH . 'admin/content/footer.php');
include_once (MAIN_PATH . 'admin/static/foot.php');
?>
</body>
</html>
