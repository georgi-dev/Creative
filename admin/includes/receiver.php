<?php
include_once(dirname (__FILE__) . '/init.php');
include_once(dirname (__FILE__) . '/Creatives.php');
include_once(dirname (__FILE__) . '/Admins.php');

switch ($_REQUEST["req"])
{
	case "login":
		$obj = new Admins();
		echo json_encode($obj->loginAdmin($_REQUEST));
		break;	

	case "get":
		$obj = new Creatives();
		echo json_encode($obj->get($_REQUEST));
		break;

	case "add":
		$obj = new Creatives();
		echo json_encode($obj->add($_REQUEST));
		break;
	case "get_one":
		$obj = new Creatives();
		echo json_encode($obj->get_one($_REQUEST));
		break;
	case "update":
		$obj = new Creatives();
		echo json_encode($obj->update($_REQUEST));
		break;
	case "remove":
		$obj = new Creatives();
		echo json_encode($obj->remove($_REQUEST));
		break;
	}
?>
