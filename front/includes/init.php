<?php
error_reporting (E_ERROR);

include_once (dirname (__FILE__) . '/config.php');
include_once (dirname (__FILE__) . '/General.php');
include_once (dirname (__FILE__) . '/Db.php');
include_once (dirname (__FILE__) . '/Debug.php');
include_once (dirname (__FILE__) . '/Creatives.php');
include_once (dirname (__FILE__) . '/Tags.php');
include_once (dirname (__FILE__) . '/pq/pq.php');
include_once (dirname (__FILE__) . '/Scraper_creative.php');


$request_uri = explode("/", $_SERVER["REQUEST_URI"]);
$script_name = explode("/",$_SERVER["SCRIPT_NAME"]);

$main_url = "//" . $_SERVER["HTTP_HOST"] . "/";

for($i= 0;$i < sizeof($script_name);$i++)
{
    if ($request_uri[$i] == $script_name[$i])
    {
        $main_url .= $request_uri[$i] == "" ? "" : $request_uri[$i] . "/";
        unset($request_uri[$i]);
    }
}
$request_uri = array_values($request_uri);
//print_r($request_uri);
define("MAIN_URL", $main_url);
define("MAIN_PATH", dirname(dirname(__FILE__)) . "/");
define("CONTENT_PAGE", $request_uri[0] == "" ? "home" : $request_uri[0]);
define("CONTENT_SUBPAGE", $request_uri[1]);
define("CONTENT_PAGE_C", $request_uri[2]);
define("CONTENT_PAGE_D", $request_uri[3]);

ini_set("session.cookie_domain", "." . PUBLIC_DOMAIN);
session_start ();
?>
