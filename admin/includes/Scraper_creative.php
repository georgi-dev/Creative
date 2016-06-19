<?php
class Scraper_creative {
private $url_site = "https://creativemarket.com";


	public function get_products_info() 
	{	
		$pdo = new PDO(DB_CONN_STRING, DB_USER, DB_PASSWORD);

        $rst = $pdo->prepare('
		SELECT
			`product_id`,
			`product_price`as pprice, 
			`product_date`,
			`product_license`,
			`product_file_type`, 
			`product_file_size`,
			`product_vector`,
			`product_web_font`
		FROM 
			`product_info`
		WHERE 
		product_id = "'.CONTENT_SUBPAGE.'"

       ');
        Debug::var_debug($rst);
        $rst->execute();

        $rows = $rst->fetchAll(PDO::FETCH_ASSOC);

		return $rows;
	}

	public function get_image() 
	{	
		$pdo = new PDO(DB_CONN_STRING, DB_USER, DB_PASSWORD);
        $rst = $pdo->prepare('
		SELECT

		creative_images AS field_images
		
            FROM
                creative
            WHERE
           
            creative_id = "'.CONTENT_SUBPAGE.'"

       ');

        $rst->execute();
        $rows = $rst->fetchAll(PDO::FETCH_ASSOC);
		$img = explode(",",$rows[0]['field_images']);

		for ($i = 0; $i < count($img); $i++) { 
		
		$images = str_replace('90x60r', 'f', $img[$i]);


			echo '
			<div class="item">
			<figure>
				<img src="'.$images.'" alt="">
			</figure>
			</div>';	
		}
	}

	public function get_author_products() 
    {
        $pdo = new PDO(DB_CONN_STRING, DB_USER, DB_PASSWORD);
        $rst = $pdo->prepare('
        SELECT
        creative_id ,
        creative_products_author,
            creative_images 
        FROM
            creative
            
        WHERE
            creative_id = "'.CONTENT_SUBPAGE.'"
        ');

        $rst->execute();
        $result = $rst->fetch(PDO::FETCH_ASSOC);

        $img = explode(",",$result['creative_images']);

		for ($i = 0; $i < count($img); $i++) { 
		
		$images = str_replace('90x60r', 'f', $img[$i]);

			echo '
			<div class="item">
			<figure>
				<img src="'.$images.'" alt="">
			</figure>
			</div>';	
		}
    }

	public function get_name_products() 
    {
        $pdo = new PDO(DB_CONN_STRING, DB_USER, DB_PASSWORD);
        $rst = $pdo->prepare('
        SELECT
        
        creative_products_slug AS field_products_slug
        
        FROM
            creative
            
        WHERE
            field_products_slug = "'.CONTENT_SUBPAGE.'"
        ');
        //Debug::var_debug(CONTENT_SUBPAGE);
        $rst->execute();
        $result = $rst->fetch(PDO::FETCH_ASSOC);

         return $result;
    }

	public function get_page_number($full_url,$first_part_url) {
		$src = explode("/",$full_url);
		for ($i = 0; $i < 1523 ; $i++) { 
			$last_part_url = (int)$src[5] + $i;
			$links[] = $first_part_url.$last_part_url."\n";
		}
			return $links;
	}

	public function get_products_links($url) {
			
			$file_src = $this->fread_url($url);
			$products_links_obj = select_elements("#search-results > div > div > article > ul", $file_src);
			for ($i = 0; $i < 30; $i++) { 
				$product_url[] = $products_links_obj[0]['children'][$i]['attributes']['data-url'];
			}
		return $product_url;
	}	

	public function get_products($url) {

		$file_src = $this->fread_url($url);

		$products_obj = select_elements("#product-header,.screenshots-container ul,#product > section.product-description,#widget-properties > ul,#widget-tags", $file_src);

		$products_fonts = select_elements(".font-settings,.product-fonts", $file_src);

		 $fonts_name_obj = $products_fonts[1]['children'][0]['children'][0];
		 $fonts = $products_fonts[1]['children'][0]['children'][0]['children'][1]['text'];

		 	for ($n=0; $n < count($fonts_name_obj); $n++) { 
					 $fonts_names[] = $products_fonts[1]['children'][0]['children'][$n]['children'][0]['text'];
					$fonts_pics_obj[] = $products_fonts[1]['children'][0]['children'][$n]['children'][1]['text'];
					
				}

				$fonts_name = implode(",",$fonts_names);
		 		$fonts_picss = implode(",",$fonts_pics_obj);

		 		$fonts_pics = $this->find_url($fonts_picss);

			$fonts_text = "When zombies arrive, quickly fax judge Pat";//$products_fonts[0]['children'][0]['children'][0]['attributes']['value'];

				for ($i=0; $i < count($products_fonts[0]['children'][1]['children']); $i++) { 
					 $text_fonts_size[] = $products_fonts[0]['children'][1]['children'][$i]['text'];
				}
			$fonts_sizes = implode(",",$text_fonts_size);
		$fonts = $products_fonts[1]['children'][0]['children'][0]['children'][1]['text'];

		for ($r=0; $r < count($fonts_pics); $r++) { 
			//echo "<img src ='".$fonts_pics[$r]."'>"."</br>";
		}

			$product_tags =	preg_replace('/\s+/', ' ', $products_obj[4]['text']);	

		for ($i=0; $i < count($products_obj[2]['children']); $i++) { 

			switch ($products_obj[2]['children'][$i]['name']) {
			case 'p':
					switch ($products_obj[2]['children'][$i]['children'][0]['name']) {
						case 'strong':
							if ($products_obj[2]['children'][$i]['text'] != $products_obj[2]['children'][$i]['children'][0]['text']) {
								$desc_ps .= str_replace($products_obj[2]['children'][$i]['children'][0]['text'], '<strong>'.$products_obj[2]['children'][$i]['children'][0]['text'].'</strong>', $products_obj[2]['children'][$i]['text']);
							}
							else {
								$desc_ps .= str_replace($products_obj[2]['children'][$i]['children'][0]['text'], '<p><strong>'.$products_obj[2]['children'][$i]['children'][0]['text'].'</strong></p>', $products_obj[2]['children'][$i]['text']);
							}
							break;
						case 'em':
							if ($products_obj[2]['children'][$i]['text'] != $products_obj[2]['children'][$i]['children'][0]['text']) {
								$desc_ps .= str_replace($products_obj[2]['children'][$i]['children'][0]['text'], '<em>'.$products_obj[2]['children'][$i]['children'][0]['text'].'</em>', $products_obj[2]['children'][$i]['text']);
							}
							else {
								$desc_ps .= str_replace($products_obj[2]['children'][$i]['children'][0]['text'], '<p><em>'.$products_obj[2]['children'][$i]['children'][0]['text'].'</em></p>', $products_obj[2]['children'][$i]['text']);
							}
						break;
						default:
							$desc_ps .= '<p>'.$products_obj[2]['children'][$i]['text'].'</p>';
							break;
					}
				break;
			case 'ul':
				$desc_ps .= '<ul style="list-style: initial;">';
					for ($j=0; $j < count($products_obj[2]['children'][$i]['children']); $j++) { 
						$desc_ps .='<li>'.$products_obj[2]['children'][$i]['children'][$j]['text'].'</li>';
					}

				$desc_ps .= '</ul>';
				break;
			case 'hr':
				$desc_ps .= '<hr>';
				break;	
			default:

				break;
			}
		}
		
		$products_desc = nl2br($this->make_links_clickable($desc_ps));
	echo $products_desc;
		/*DESCRIPTION */
		$count = count($products_obj[3]['children']);
		$products_link = $url;
		$products_likes = select_elements("#widget-hoarding ul li", $file_src);
		if ($products_likes[0]['children'][0]['text'] = 'Like') {
			$likes = $products_likes[0]['children'][1]['text'];
		}else{$likes = '?';}

		for ($i = 0, $j = $count; $i < $j ; $i++) { 
		
			switch (trim($products_obj[3]['children'][$i]['children'][0]['children'][0]['text'])) {
				case 'Price':
					$price = trim($products_obj[3]['children'][$i]['children'][0]['children'][1]['text']);
				break;
				case 'Date':
					$date = trim($products_obj[3]['children'][$i]['children'][0]['children'][1]['text']);
					break;
				case 'Licenses Offered':
					$license_obj = 	trim($products_obj[3]['children'][$i]['children'][0]['children'][1]['text']);

					$pieces = preg_split('/(?=[A-Z])/',$license_obj);

					$license = $pieces[1]."</br>".$pieces[2];
					
					break;
				case 'File Types':
					$file_type = trim($products_obj[3]['children'][$i]['children'][0]['children'][1]['text']);
					break;
				case 'File Size':
					$file_size = trim($products_obj[3]['children'][$i]['children'][0]['children'][1]['text']);
					break;
				case 'Vector':
					$vector = trim($products_obj[3]['children'][$i]['children'][0]['children'][1]['text']);
					break;
				case 'Web Font':
					$web = trim($products_obj[3]['children'][$i]['children'][0]['children'][1]['text']);
					break;
				case 'Requirements':
					$requirements = trim($products_obj[3]['children'][$i]['children'][0]['children'][1]['text']);
					break;
				case 'Layered':
					$layered = trim($products_obj[3]['children'][$i]['children'][0]['children'][1]['text']);
					break;	
				case 'DPI':
					$dpi = trim($products_obj[3]['children'][$i]['children'][0]['children'][1]['text']);
					break;
				case 'Dimensions':
					$dimensions = trim($products_obj[3]['children'][$i]['children'][0]['children'][1]['text']);
					break;
				default:
					print_r($products_obj[3]['children'][$i]['children'][0]['children'][1]['text']);
				break;
			}
		}
					
			$arr_product_info = array(
				'likes' => $likes,
				'price' => $price,
				'date' => $date,
				'license' => $license,
				'file_type' => $file_type,
				'file_size' => $file_size,
				'vector' => $vector == "" ? "no" : $vector,
				'web_font' => $web == "" ? "no" : $web,
				'requirements' => $requirements,
				'layered' => $layered,
				'dpi' => $dpi,
				'dimensions' => $dimensions


			);

			$products_name = trim($products_obj[0]['children'][0]['text']);//name
			$products_slug1 = $this->clean($products_name);
			$products_slug2 = str_replace('--', '-', $products_slug1);
			$products_slug = str_replace('--', '-', $products_slug2);
			$products_author = trim($products_obj[0]['children'][1]['children'][0]['children'][0]['text']);//autro
			$products_author_slug = $this->clean($products_author);
			$products_link_author = trim($this->url_site.$products_obj[0]['children'][1]['children'][0]['children'][0]['attributes']['href']);//link_autor
			$products_cat = trim($products_obj[0]['children'][1]['children'][0]['children'][1]['text']);//category
			$products_link_cat = trim($this->url_site.$products_obj[0]['children'][1]['children'][0]['children'][1]['attributes']['href']);//link_category
			$products_sub_cat = trim($products_obj[0]['children'][1]['children'][0]['children'][2]['text']);//sub_cat
			$products_link_sub_cat = trim($this->url_site.$products_obj[0]['children'][1]['children'][0]['children'][2]['attributes']['href']);//link_sub_category

			$count_img = $products_obj[1];
			//print_r($count_img);
			for ($c = 0 , $t = count($count_img);$c < $t; $c++) { 
			$images[] = $products_obj[1]['children'][$c]['children'][0]['children'][0]['children'][0]['attributes']['data-src-retina'];

		}
		for ($i = 0; $i < count($count_img); $i++) { 
		
		$image[] = str_replace('90x60r', 'f', $images[$i]);

	}
			$arr_product = array(

				'name' => $products_name,
				'slug' => $products_slug,
				'product_link' => $products_link,
				'desc' => $products_desc,
				'images' => $images[0].",".$images[1].",".$images[2].",".$images[3]

				);
			$authors = array(
				'author' => $products_author,
				'author_slug' => $products_author_slug,
				'link_author' => $products_link_author
				);

			$categories = array(
				'category' => $products_cat,
				'link_category' => $products_link_cat,
				'sub_category' => $products_sub_cat,
				'link_sub_category' => $products_link_sub_cat
				);
			$tags = array('tags' => $product_tags);

				if ($fonts_pics[0] || $fonts_pics[1] || $fonts_pics[2] || $fonts_pics[3]) {

				$fonts = array(
					'fonts_text' => $fonts_text,
					'fonts_size' => $fonts_sizes,
					'fonts_pics' => $fonts_pics[0]."," .$fonts_pics[1].",". $fonts_pics[2].",". $fonts_pics[3],
					'fonts_name' => $fonts_name	
					
					);
			}
		return array($arr_product,$arr_product_info,$authors,$categories,$tags,$fonts);
	}

	public function save_products($params) {
		
		$pdo = new PDO(DB_CONN_STRING,DB_USER,DB_PASSWORD);
		$rst_fr = $pdo->prepare
		('
			INSERT INTO 
				`creative`
				(
					`creative_id`,
					`creative_products_name`,
					`creative_products_slug`,
					`creative_products_link`,
					`creative_products_desc`,
					`creative_images`,
					`creative_created`

				) VALUES
				 (	NULL,
				 	:name,
				 	:slug,
				 	:product_link,
					:desc,
					:images,
					NOW()
				 )
		');
			for ($i = 0,$j = count($params);$i < $j;$i++) {
			$rst_fr->execute(
				$params[$i]
			);
		}
	}
	public function save_authors($params) {
		
		$pdo = new PDO(DB_CONN_STRING,DB_USER,DB_PASSWORD);
		$rst_fr = $pdo->prepare
		('

			INSERT INTO 
				`authors`
				(
					`ID`,
					`author_name`,
					`author_slug`,
					`author_link`
				) VALUES
				 (	NULL,
				 	:author,
				 	:author_slug,
				 	:link_author
				 )
		');
			for ($i = 0,$j = count($params);$i < $j;$i++) {
			$rst_fr->execute(
				$params[$i]
			);
		}

	}
	public function save_categories($params) {
		
		$pdo = new PDO(DB_CONN_STRING,DB_USER,DB_PASSWORD);
		$rst_fr = $pdo->prepare
		('

			INSERT INTO 
				`categories`
				(
					`ID`,
					`creative_category`,
					`creative_category_link`,
					`creative_sub_category`,
					`creative_sub_category_link`
				) VALUES
				 (	NULL,
				 	:category,
				 	:link_category,
				 	:sub_category,
				 	:link_sub_category
				 )
		');
			for ($i = 0,$j = count($params);$i < $j;$i++) {
			$rst_fr->execute(
				$params[$i]

			);
		}

	}
		public function save_products_info($params) {
		
		$pdo = new PDO(DB_CONN_STRING,DB_USER,DB_PASSWORD);
		$rst_fr = $pdo->prepare
		('

			INSERT INTO
				`product_info`
				(	
					`product_id`,
					`product_price`,
					`product_likes`,
					`product_date`, 
					`product_license`,
					`product_file_type`,
					`product_file_size`,
					`product_vector`, 
					`product_web_font`,
					`product_requirements`,
					`product_layered`,
					`product_dpi`,
					`product_dimensions`

				) VALUES 

				(
				 	null,
				 	:price,
				 	:likes,
					:date,
					:license,
					:file_type,
					:file_size,
					:vector,
					:web_font,
					:requirements,
					:layered,
					:dpi,
					:dimensions
					
				 )
		');
			for ($i = 0,$j = count($params);$i < $j;$i++) {
			$rst_fr->execute(
				$params[$i]
			);
		}
	}
	public function save_tags($params) {

		$pdo = new PDO(DB_CONN_STRING,DB_USER,DB_PASSWORD);
		$rst_fr = $pdo->prepare
		('

			INSERT INTO 
				`tags`
				(
					`ID`,
					`product_tags`
					
				) VALUES
				 (	NULL,
				 	:tags
				 )
		');
			for ($i = 0,$j = count($params);$i < $j;$i++) {
			$rst_fr->execute(
				$params[$i]

			);
		}

	}
	public function save_fonts($params) {

		$pdo = new PDO(DB_CONN_STRING,DB_USER,DB_PASSWORD);
		$rst_fr = $pdo->prepare
		('

			INSERT INTO 
				`fonts`
				(
					`ID`,
					`fonts_text`,
					`fonts_size`,
					`fonts_pics`,
					`fonts_name`
				) 
			VALUES 
				(
					NULL,
					:fonts_text,
					:fonts_size,
					:fonts_pics,
					:fonts_name
				)
		');
			for ($i = 0,$j = count($params);$i < $j;$i++) {
			$rst_fr->execute(
				$params[$i]

			);
		}

	}
	public function make_links($text) {

    	return preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<a href="$1">$1</a>', $text);

	}

	public function find_url($string) {

		preg_match_all('((([A-Za-z]{3,9}:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[.\!\/\w]*))?)', $string, $matches);
		
			$all_urls = $matches[0];

		return $all_urls;

	}
	public function make_links_clickable($text) {
				

		$regex = '#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#';
	    return preg_replace_callback($regex, 

	    	function ($matches) {
	    			$headers = get_headers($matches[0], 1);
				    if ($headers !== false && isset($headers['Location'])) {
				    	$parse = parse_url($headers['Location']); 
				        return "<a href=\"".$this->url_site.$parse['path']."\">". $matches[0] ."</a>";//$headers['Location'];
				    }
				    else {
						return	"<a href=\"".$matches[0]."\">". $matches[0] ."</a>";
				    }
			},  
			$text
		);
	}
	function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
	public	function get_shorten_url($text) {
		$url = preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<a href="$1">$1</a>', $text);
		
			 $headers = get_headers($url, 1);
			 $url = $headers['Location'];
			 if (is_array($url)) {
				 foreach ($url as $url) {
				 echo $url . "\n";
				 }
				 } else {
				 echo $url;
				 }
	}

	public function download_pics($img_url) {
		for ($i = 0 ; $i < count($img_url); $i++) { 
			$content = file_get_contents($img_url[$i]);
			$pr = file_put_contents('images/picture_'.$i.'.jpg', $content);
		}
		return $true;
	}

	public function fread_url($url, $ref = "")
	{
		
			$ch = curl_init();
			$user_agent = "Mozilla/5.0 (X11; Linux x86_64; rv:40.0) Gecko/20100101 Firefox/40.0";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
			curl_setopt( $ch, CURLOPT_HTTPGET, 1 );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt( $ch, CURLOPT_FOLLOWLOCATION , true);
			curl_setopt( $ch, CURLOPT_URL, $url );
			curl_setopt( $ch, CURLOPT_REFERER, $ref );
			curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
			$html = curl_exec($ch);
			curl_close($ch);
	
		return $html;
	}

}

?>
