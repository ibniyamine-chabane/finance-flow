<?php 

// creation system route 
// http://localhost/.. on https://www.website.com/ 
define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]")); 

require_once "controllers/front/API.controller.php";
$apicontroller = new APIController;

try {

    if(empty($_GET['page'])) { // if the page doesnt exist 
        throw new Exception("La page n'existe pas");
    } else {

        $url = explode("/",filter_var($_GET['page'], FILTER_SANITIZE_URL)); // filter that add a security on the url
        var_dump($url);
        // echo "La page demandé est : ".$_GET['page'];
        if(empty($url[0]) || empty($url[1])) throw new Exception("La page n'existe pas"); // error if 

        switch($url[0]) {
            
            case "front" :
                switch ($url[1]) {
                    case 'profil': echo "données Json du profil de l'utilisateur connectée";
                    break;
                    case 'homepage': echo "données Json des donnés de l'utilisateur transaction et de son port monnaie";
                    break;
                    case 'transaction': $apicontroller -> getUserTransaction() ;
                    break;
                    case 'transactionCategory': $apicontroller -> getTransactionByCategory("Facture");
                    break;
                    default : throw new Exception("Error Processing Request");     
                }
            break;
            case "back" : echo "la page back end demandée ";
            break;
            default : throw new Exception("ERREUR 404"); // in cas were front and back is not written
            
        }
    }

} catch (Exception $e) { // error gestion 

    $msg = $e->getmessage();
    echo $msg;

}
 


