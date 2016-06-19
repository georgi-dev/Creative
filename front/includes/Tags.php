<?php
class Tags
{   
    	public function get_products_by_tags($params) 
	{	if ($params["field_product_tags"] != "") {
	        $where_array[] = "tags.product_tags LIKE :field_product_tags";
	        $binds[":field_product_tags"] = "%" . $params["field_product_tags"] . "%";
			}

			$offset = ((int) $params["page"] - 1) * PAGE_SIZE;

		$pdo = new PDO(DB_CONN_STRING, DB_USER, DB_PASSWORD);

			
        $rst = $pdo->prepare('
		SELECT
			creative_images,
			
			creative_products_slug AS field_item_name,
			creative_images AS field_item_image,
			creative_products_slug AS field_item_slug,
            creative_category AS field_item_category,
			product_likes AS field_item_likes
		FROM 
			creative AS cr
			LEFT JOIN product_info AS pinfo ON pinfo.product_id = cr.creative_id
            LEFT JOIN categories AS cat ON cat.ID = cr.creative_id
            LEFT JOIN authors ON cr.creative_id = authors.ID
            LEFT JOIN tags ON cr.creative_id = tags.ID
		WHERE 

		' . implode(" AND ", $where_array) . '
		LIMIT ' . PAGE_SIZE . '

            OFFSET ' . $offset . '

       ');
         $rst_counter = $pdo->prepare('
            SELECT FOUND_ROWS() AS cter
        ');

        $rst->execute($binds);
        $rows = $rst->fetchAll(PDO::FETCH_ASSOC);

        $rst_counter->execute();
        $cter = $rst_counter->fetch(PDO::FETCH_ASSOC);

        return array(
            "tages" => $rows,
            "pages" => ceil($cter["cter"] / PAGE_SIZE)
        );
		
	}



    public function get($params)
    {
        $where_array[] = "1=1";

        if ($params["field_id"] != "") {
            $where_array[] = "creative_id=:field_id";
            $binds[":field_id"] = $params["field_id"];
        }
        if ($params["field_products_name"] != "") {
            $where_array[] = "creative_products_name LIKE :field_products_name";
            $binds[":field_products_name"] = "%" . $params["field_products_name"] . "%";
        }
        if ($params["field_products_slug"] != "") {
            $where_array[] = "creative_products_slug LIKE :field_products_slug";
            $binds[":field_products_slug"] = "%" . $params["field_products_slug"] . "%";
        }
        if ($params["field_products_cat"] != "") {
            $where_array[] = "creative_category=:field_products_cat";
            $binds[":field_products_cat"] = $params["field_products_cat"];
        }
        if ($params["field_products_link_cat"] != "") {
            $where_array[] = "creative_category_link=:field_products_link_cat";
            $binds[":field_products_link_cat"] = $params["field_products_link_cat"];
        }
        if ($params["field_products_sub_cat"] != "") {
            $where_array[] = "creative_sub_category=:field_products_sub_cat";
            $binds[":field_products_sub_cat"] = $params["field_products_sub_cat"];
        }
        if ($params["field_products_link_sub_cat"] != "") {
            $where_array[] = "creative_sub_category_link=:field_products_link_sub_cat";
            $binds[":field_products_link_sub_cat"] = $params["field_products_link_sub_cat"];
        }
        if ($params["field_products_desc"] != "") {
            $where_array[] = "creative_products_desc LIKE :field_products_desc";
            $binds[":field_products_desc"] = "%" . $params["field_products_desc"] . "%";
        }
        if ($params["field_images"] != "") {
            $where_array[] = "creative_images=:field_images";
            $binds[":field_images"] = $params["field_images"];
        }
        if ($params["field_created"] != "") {
            $where_array[] = "creative_created LIKE :field_created";
            $binds[":field_created"] = "%" . $params["field_created"] . "%";
        }
        $offset = ((int) $params["page"] - 1) * PAGE_SIZE;

        $pdo = new PDO(DB_CONN_STRING, DB_USER, DB_PASSWORD);
        $rst = $pdo->prepare('
        SELECT
            product_id AS field_product_id,

            product_price AS field_products_price, 

            product_likes AS field_products_likes,

            product_date AS field_products_date ,

            product_tags AS field_product_tags,

            product_license AS field_products_license,

            product_file_type AS field_products_type, 

            product_file_size AS field_products_size,

            product_vector AS field_products_vector,

            product_web_font AS field_products_web_font,

            product_requirements AS field_products_requirements,

            product_layered AS field_products_layered,

            product_dpi AS field_products_dpi,

            product_dimensions AS field_products_dimensions,

            creative_id AS field_id,

            creative_products_name AS field_products_name,

            creative_products_slug AS field_products_slug,

            author_name AS field_products_author,

            author_link AS field_products_link_author,

            creative_category AS field_products_cat,

            creative_category_link AS field_products_link_cat,

            creative_sub_category  AS field_products_sub_cat,

            creative_sub_category_link AS field_products_link_sub_cat,

            creative_products_desc AS field_products_desc,

            creative_images AS field_images,

            creative_created AS field_created
        FROM
            creative AS cr
            LEFT JOIN product_info AS pinfo ON pinfo.product_id = cr.creative_id
            LEFT JOIN categories AS cat ON cat.ID = cr.creative_id
            LEFT JOIN authors ON cr.creative_id = authors.ID
            LEFT JOIN tags ON cr.creative_id = tags.ID
            WHERE
                ' . implode(" AND ", $where_array) . '
            LIMIT ' . PAGE_SIZE . '

            OFFSET ' . $offset . '
            
        
        ');

        $rst_counter = $pdo->prepare('
            SELECT FOUND_ROWS() AS cter
        ');

        $rst->execute($binds);
        $rows = $rst->fetchAll(PDO::FETCH_ASSOC);

        $rst_counter->execute();
        $cter = $rst_counter->fetch(PDO::FETCH_ASSOC);

        return array(
            "creative" => $rows,
            "pages" => ceil($cter["cter"] / PAGE_SIZE)
        );
    }

    public function get_one($params)
    {
        $pdo = new PDO(DB_CONN_STRING, DB_USER, DB_PASSWORD);
        $rst = $pdo->prepare('
        SELECT
            product_id AS field_product_id,

            product_price AS field_products_price, 

            product_likes AS field_products_likes,

            product_date AS field_products_date ,

            product_tags AS field_product_tags,

            product_license AS field_products_license,

            product_file_type AS field_products_type, 

            product_file_size AS field_products_size,

            product_vector AS field_products_vector,

            product_web_font AS field_products_web_font,

            product_requirements AS field_products_requirements,

            product_layered AS field_products_layered,

            product_dpi AS field_products_dpi,

            product_dimensions AS field_products_dimensions,

            creative_id AS field_id,

            creative_products_name AS field_products_name,

            creative_products_slug AS field_products_slug,

            author_name AS field_products_author,

            author_link AS field_products_link_author,

            creative_category AS field_products_cat,

            creative_category_link AS field_products_link_cat,

            creative_sub_category  AS field_products_sub_cat,

            creative_sub_category_link AS field_products_link_sub_cat,

            creative_products_desc AS field_products_desc,

            creative_images AS field_images,

            creative_created AS field_created
        FROM
            creative AS cr
            LEFT JOIN product_info AS pinfo ON pinfo.product_id = cr.creative_id
            LEFT JOIN categories AS cat ON cat.ID = cr.creative_id
            LEFT JOIN authors ON cr.creative_id = authors.ID
            LEFT JOIN tags ON cr.creative_id = tags.ID
        WHERE
            creative_products_slug = :field_products_slug
        ');

        $rst->execute(array(":field_products_slug" => $params["field_products_slug"]));
        $result = $rst->fetch(PDO::FETCH_ASSOC);
//Debug::var_debug(CONTENT_SUBPAGE);
        return $result;
    }
 
}
