<?php

class Admins
{   

	public function loginAdmin($params = null) {

		//Debug::var_debug($params);
		//Debug::var_debug($params['password']);
		$pdo = new PDO(DB_CONN_STRING, DB_USER, DB_PASSWORD);
		
		$rst = $pdo->prepare('
			SELECT
			   
			    admin_username,
			    admin_password,
			     COUNT(*) AS admin_exists

			FROM 
				admins
			WHERE 
				admin_username = :username 
			AND 
				admin_password = MD5(:password)

			');
		$rst->execute(array(
            ":username" => $params["username"],
            ":password" => $params["password"]
             
 
            ));
        $admin = $rst->fetch(PDO::FETCH_ASSOC);

Debug::var_debug($admin['admin_exists']);

	$response['exists'] = $admin['admin_exists'];
		if($admin['admin_exists'] > 0) {
			$response['success'] = true;
			$_SESSION['username'] = $params["username"];
			$_SESSION["logged_admin"] = true;


		} else {
			$response['success'] = false;
			$response['message'] = "Something is wrong!";
			$_SESSION["logged_admin"] = false;

		}
		Debug::var_debug($response);
		return  $response;
	}

}