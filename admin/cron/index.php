<?php
date_default_timezone_set('Europe/London');
set_time_limit(10000);

include_once(dirname(dirname(__FILE__)) . '/includes/config.php');
include_once(dirname(dirname(__FILE__)) . '/includes/pq/pq.php');
include_once(dirname(dirname(__FILE__)) . '/includes/Debug.php');
include_once(dirname(dirname(__FILE__)) . '/includes/Scraper_creative.php');
set_time_limit(20000);
error_reporting(0);
 $scraper = new Scraper_creative();
													//Записване на урл-тата на страниците // Start

// $time_start = microtime(true);

// 	$url = "https://creativemarket.com/templates/popular/1";
// 	$first = "https://creativemarket.com/templates/popular/";
// 	$hd_links = fopen("files/template_url_page.txt","a");

   
// 	$pages_links = $scraper->get_page_number($url,$first);
	
// 		for ($i = 0; $i < 1523 ; $i++) { 
// 			//print_r($pages_links[$i]);
// 			fwrite($hd_links, $pages_links[$i]);

// 		}
// 		//Записване на урл-тата на страниците//
// $time_end = microtime(true);
// $time = $time_end - $time_start;

// echo "Не направих нищо за $time секунди\n";

												//Записване на урл-тата на страниците // End ===== Done

												//взимане на линковете на всички продукти  //Start
// $time_start = microtime(true);


// 	$urls = file(__DIR__ . "/files/template_url_page.txt", FILE_IGNORE_NEW_LINES);
// 	 	$hd = fopen("products_template_url.txt", "a");
// 	 	//print_r($urls);
// 	 	for ($f=0 , $g = count($urls);$i < $g ;$f++) { 
// 	 		$pr = $scraper->get_products_links($urls[$f]);
// 	 	sleep(1);
// 		 	for ($i = 0; $i < 30; $i++) { 
// 		 		fwrite($hd, $pr[$i]."\n");

// 		 	}
// 		}
// $time_end = microtime(true);
// $time = $time_end - $time_start;

// echo "Не направих нищо за $time секунди\n";
 	
											//взимане на линковете на всички продукти  	//End ===== Done
$urls = file(__DIR__ . "/files/products_fonts_url.txt", FILE_IGNORE_NEW_LINES);
//print_r($urls[0]);

 $time_start = microtime(true);
	 for ($p = 0 ; $p < 4 ;$p ++) { 

		



		sleep(1);
		 $object_product = $scraper->get_products($urls[$p]);
		list($product[],$pr_info[],$auth[],$cat[],$tags[],$fonts[]) = $object_product;

		//print_r($pr);
		// Debug::var_debug($pr);

	}
	//print_r($pr[0][0]);die;
	//print_r($rr);
		$scraper->save_products($product);
		$scraper->save_products_info($pr_info);
		$scraper->save_authors($auth);
		$scraper->save_categories($cat);
		$scraper->save_tags($tags);
		$scraper->save_fonts($fonts);
	$time_end = microtime(true);
		$time = $time_end - $time_start;
echo "Не направих нищо за $time секунди\n";

		//$scraper->get_shorten_url($url,$text);
	
		
		// 	print_r($pr);
		// }
	
	// $img_url = array("https://d3ui957tjb5bqd.cloudfront.net/images/screenshots/products/3/38/38755/t0000_05-90x60.jpg?1378951050","https://d3ui957tjb5bqd.cloudfront.net/images/screenshots/products/3/38/38751/t0000_1-f.jpg?1378951050");

	// $scraper->download_pics($img_url);//сваляме images на сървъра - optional
	
// 		$products_author = trim($products_obj[0]['children'][1]['children'][0]['children'][0]['text']);//autro
// 		$products_link_author = trim($url_site.$products_obj[0]['children'][1]['children'][0]['children'][0]['attributes']['href']);//link_autor

// 		$products_cat = trim($products_obj[0]['children'][1]['children'][0]['children'][1]['text']);//category
// 		// print_r($products_cat);die();
// 		$products_link_cat = trim($url_site.$products_obj[0]['children'][1]['children'][0]['children'][1]['attributes']['href']);//link_category

// 		$products_sub_cat = trim($products_obj[0]['children'][1]['children'][0]['children'][2]['text']);//sub_cat
// 		$products_link_sub_cat = trim($url_site.$products_obj[0]['children'][1]['children'][0]['children'][2]['attributes']['href']);//link_sub_category
// 		$text = trim($products_obj[2]['text']);

// 		$products_desc = $scraper->make_links_clickable($text);
// //Debug::var_debug($products_desc);
// 		$count_img = $products_obj[1];
// 		//print_r($product_description."///////////////////"."\n");
		
// 		//print_r($text);
// 		//print_r($products_desc);
// 		//print_r($text);
// 		for ($c = 0 , $t = count($count_img);$c < $t; $c++) { 
// 			$image_link[] = $products_obj[1]['children'][$c]['children'][0]['children'][0]['children'][0]['attributes']['data-src-retina'];
// 			$images = $image_link;
// 		}
// 		// 	//print_r($image_link."\n");
// 			// echo "<img src=\"{$images[0]}\"/>";
// 			// echo "<img src=\"{$images[1]}\"/>";
// 			// echo "<img src=\"{$images[2]}\"/>";
// 			// echo "<img src=\"{$images[3]}\"/>";
// 			// echo "<div style='width:50%;border:1px solid #000'>".$products_desc."</div>";
		
// 			// if($images){

// 			// 	print_r("Name :".$products_name.";"."Author :".$products_author.";"."Author_link :".$products_link_author.";".
// 		 // "Category :".$products_cat.";"."Category_link :".$products_link_cat.";"."Sub_category :".$products_sub_cat.";"."Sub_category_link :".$products_link_sub_cat.";".$products_desc .";"."Image_link :".$images[0]."/*/*/*".$images[1]."/*/*/*".$images[2]."/*/*/*".$images[3]."</br>");
// 			// }


// $pr_info = $id.";".$products_name.";".$products_author.";".$products_link_author.";".$products_cat.";".$products_link_cat.";".$products_sub_cat.";".$products_link_sub_cat.";".$products_desc .";".$images[0].",".$images[1].",".$images[2].",".$images[3]."\n";
// 			// }
// //print_r($pr_info);

// 		 //fwrite($info, $pr_info."///////////////////////////////////////");
		 

// 		//print_r($products_autor);
// 		//echo "<a href=".$products_link_sub_cat.">".$products_sub_cat."</a>";
// 	}
	



// function curl_request($request_data)
// {	
// 	$ch = curl_init();	
// 	curl_setopt($ch, CURLOPT_URL, "https://creativemarket.com/fonts/popular/1");
// 	curl_setopt($ch, CURLOPT_HEADER, 0);
// 	curl_setopt($ch, CURLOPT_POST, 1);
// 	curl_setopt($ch, CURLOPT_POSTFIELDS,$request_data);
// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
// 	$result = curl_exec($ch);
// 	curl_close($ch);
	
// 	return $result;
// }
//print_r($obj_names);
//$url = file(__DIR__ . "/links.txt", FILE_IGNORE_NEW_LINES);
// sleep(1);
?>