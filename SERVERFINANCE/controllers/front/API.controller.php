<?php 
require_once("models/front/API.manager.php");
class APIController {

    private $apiManager;

    public function __construct() {
        $this->apiManager = new APIManager();
    }
    public function getUserTransaction(){
        $transaction = $this->apiManager->getTransaction();
        // echo "Envoi des information sur les transaction";
        var_dump($transaction);
        // echo json_encode($transaction);
    }

    public function getTransactionByCategory(string $category) {
        echo "Envoi des information des transaction par la categorie , $category";
    }

}