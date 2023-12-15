<?php 
class APIControler {
    public function getUserTransaction(){
        echo "Envoi des information sur les transaction";
    }

    public function getTransactionByCategory(string $category) {
        echo "Envoi des information des transaction par la categorie , $category";
    }

}