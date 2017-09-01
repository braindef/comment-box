<?php
class DBController {
	//private $host = "marcland.mysql.db.internal";
	private $host = "localhost";
	private $user = "pasquale";
	private $password = "12345";  //bitte das produktive Passwort nicht öffentlich auf dem Github Server speichern.
	private $database = "pasquale";
	private $db;

	function __construct() {
		$this->db = $this->connectDB();
	}

	function connectDB() {
		$db = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8mb4',$this->user, $this->password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		return $db;
	}

	function runQuery($query) {
		$pdoStatement = $this->db->query($query);
		$resultset = $pdoStatement->fetchAll();

		if(!empty($resultset)) {
		return $resultset;
        }
	}


    function executeInsert($query) {
            $stmt = $this->db->prepare($query);
            $stmt->execute();
    }


}
?>
