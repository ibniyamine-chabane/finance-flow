<?php 

// creation system route 
// http://localhost/.. on https://www.website.com/ 
define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]")); 

try {
    if(empty($_GET['page'])) { // if the page doesnt exist 
        throw new Exception("La page n'existe pas");
    } else {
        $url = explode("/",filter_var($_GET['page'], FILTER_SANITIZE_URL)); // filter that add a security on the url
        // var_dump($url);
        // echo "La page demandé est : ".$_GET['page'];
        if(empty($url[0]) || empty($url[1])) throw new Exception("La page n'existe pas");
        
    }
} catch (Exception $e){ // error gestion 
    $msg = $e->getmessage();
    echo $msg;
}
 


