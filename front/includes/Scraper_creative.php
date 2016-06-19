<?php
class Scraper_creative {
private $url_site = "https://creativemarket.com";

	
	public function get_products_by_tags() 
	{	
		$pdo = new PDO(DB_CONN_STRING, DB_USER, DB_PASSWORD);

        $rst = $pdo->prepare('
		SELECT
			creative_images
		FROM 
			creative AS cr
			 LEFT JOIN tags ON cr.creative_id = tags.ID
		WHERE 

		tags.product_tags LIKE "%'.CONTENT_SUBPAGE.'%"

       ');
        //Debug::var_debug($rst);
        $rst->execute();

        $rows = $rst->fetchAll(PDO::FETCH_ASSOC);
        $img = explode(",",$rows[0]['creative_images']);

		for ($i = 0; $i < count($img); $i++) { 
		
		$images = str_replace('90x60r', 'f', $img[$i]);


			echo '
			<div class="item">
			<figure>
				<img src="'.$images.'" alt="">
			</figure>
			</div>';	
		}
		// $img_obj = new Scraper_creative;
		//$img_obj = $this->proba();
		
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
           
            creative_products_slug = "'.CONTENT_SUBPAGE.'"

       ');

        $rst->execute();
        $rows = $rst->fetchAll(PDO::FETCH_ASSOC);
		// $img_obj = new Scraper_creative;
		//$img_obj = $this->proba();
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

	public function get_author_products($params) 
    {
        $pdo = new PDO(DB_CONN_STRING, DB_USER, DB_PASSWORD);
        $rst = $pdo->prepare('
        SELECT
        	author_name AS field_author_name,
			creative_products_slug AS field_item_name,
			creative_images AS field_item_image,
			creative_products_slug AS field_item_slug

		FROM 
			creative
		LEFT JOIN authors AS au ON au.ID = creative.creative_id
		WHERE 
			author_name = :field_author_name

		');

        $rst->execute(array(":field_author_name" => $params['field_author_name']));
        $result = $rst->fetchAll(PDO::FETCH_ASSOC);
        //Debug::var_debug($result);
        return $result;
        
    }
     public function get_author() {
    	//echo "Groens";
    	$pdo = new PDO(DB_CONN_STRING, DB_USER, DB_PASSWORD);
        $rst = $pdo->prepare('
        SELECT
        	author_name
		FROM 
			creative AS cr
		
        LEFT JOIN categories AS cat ON cat.ID = cr.creative_id
        LEFT JOIN authors ON cr.creative_id = authors.ID
        WHERE
            creative_products_slug = "'.CONTENT_SUBPAGE.'"

		');

        $rst->execute();
        $result = $rst->fetch(PDO::FETCH_ASSOC);
        //Debug::var_debug($result);
       return $result['author_name'];
    } 




    public function echos() {
    	echo "Groens";
    } 
	// public function get_name_products() 
 //    {
 //        $pdo = new PDO(DB_CONN_STRING, DB_USER, DB_PASSWORD);
 //        $rst = $pdo->prepare('
 //        SELECT
        
 //        creative_products_slug AS field_products_slug,
 //        creative_images
 //        FROM
 //            creative
            
 //        WHERE
 //            field_products_slug = "'.CONTENT_SUBPAGE.'"
 //        ');
 //        Debug::var_debug(CONTENT_SUBPAGE);
 //        $rst->execute();
 //        $result = $rst->fetch(PDO::FETCH_ASSOC);

 //         return print_r($result);
 //    }


}
?>
