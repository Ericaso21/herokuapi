<?php
    require_once("Backend/Config/Config.php");
    require_once("Backend/Helpers/Helpers.php");
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('content-type: application/json; charset=utf-8');
    $url = !empty( $_GET['url']) ?  $_GET['url'] : 'home/home';
    $arrUrl = explode("/", $url);
    $controller = $arrUrl[0];
    $method = $arrUrl[0];
    $params = "";

    if(!empty($arrUrl[1]))
    {
        if($arrUrl[1] != "")
        {
            $method = $arrUrl[1];
        }
    }

    if(!empty($arrUrl[2]))
    {
        if($arrUrl[2] != "")
        {
            for ($i=2; $i < count($arrUrl); $i++){
                $params .= $arrUrl[$i].',';
            }
            $params = trim($params,',');
            
        }
    }
    require_once("Backend/Libraries/Core/Autoload.php");

    require_once("Backend/Libraries/Core/Load.php");


?>