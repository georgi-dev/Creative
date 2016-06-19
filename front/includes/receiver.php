<?php
include_once(dirname (__FILE__) . '/init.php');
include_once(dirname (__FILE__) . '/Creatives.php');
include_once(dirname (__FILE__) . '/Scraper_creative.php');
switch ($_REQUEST["req"])
{	
	case "get":
		$obj = new Creatives();
		echo json_encode($obj->get($_REQUEST));
		break;
	case "show_home_products":
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
	case "show_image":
		$obj = new Scraper_creative();
		echo json_encode($obj->get_name_products($_REQUEST));
		break;
	case "get_author_products":
		$obj = new Scraper_creative();
		echo json_encode($obj->get_author_products($_REQUEST));
		break;	
/*CLASS TAGS*/
	case "get_products_by_tags":
		$obj = new Tags();
		echo json_encode($obj->get_products_by_tags($_REQUEST));
		break;	
	}
?>
