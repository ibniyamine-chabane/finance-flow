<?php 
require_once("models/DATABASE.connect.php");

class APIManager extends DataBaseConnect {
    
    public function getTransaction() {
        $req = "SELECT * FROM transaction";
        $stmt = $this->getDatabase()->prepare($req);
        $stmt->execute();
        $transaction = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $transaction;
    }

}
