<?php
class dbClass {
	public $isConnected;
	protected $datab;
	public function __construct() {
		try {
			$host = $GLOBALS ['sql_array'] ['db_host'];
			$dbname = $GLOBALS ['sql_array'] ['db_dbname'];
			$username = $GLOBALS ['sql_array'] ['db_username'];
			$password = $GLOBALS ['sql_array'] ['db_password'];
			
			$options = [ ];
			
			$this->datab = new PDO ( "mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options );
			$this->datab->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$this->datab->setAttribute ( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );
			$this->isConnected = true;
		} catch ( PDOException $e ) {
			$this->isConnected = false;
			throw new Exception ( $e->getMessage () );
		}
	}
	public function Disconnect() {
		$this->datab = null;
		$this->isConnected = false;
	}
	
	public function getRow($query, $params = array()) {
		try {
			$stmt = $this->datab->prepare ( $query );
			$stmt->execute ( $params );
			return $this->sqlToXml($stmt->fetch ());
		} catch ( PDOException $e ) {
			throw new Exception ( $e->getMessage () );
		}
	}
	
	public function getRows($query, $params = array()) {
		try {
			$stmt = $this->datab->prepare ( $query );
			$stmt->execute ( $params );
			return $stmt->fetchAll ();
		} catch ( PDOException $e ) {
			throw new Exception ( $e->getMessage () );
		}
	}
	
	public function insertRow($query, $params = array()) {
		try {
			$stmt = $this->datab->prepare ( $query );
			$stmt->execute($params);
		} catch ( PDOException $e ) {
			throw new Exception ( $e->getMessage () );
		}
	}
	
	public function updateRow($query, $params = array()) {
		return $this->insertRow ($query, $params);
	}
	
	public function deleteRow($query, $params = array()) {
		return $this->insertRow ( $query, $params );
	}
	
	/**
	 *
	 */
	private function sqlToXml($queryResult) {
		
		$xmlData = "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\r";
		
		$xmlData .= "<result>\r";
		
		foreach ( $queryResult as $key => $value ) {
			$xmlData .= "<" . $key . ">";
			
			if(is_array($key[$value])) {
				$xmlData .= "\r";
				foreach ( $key[$value] as $myKey => $myValue ) {
					$xmlData .= "<" . $myKey . ">";
					$xmlData .= $myValue;
					$xmlData .= "</" . $myKey . ">";
				}
			} else {
				$xmlData .= $value;
			}
			$xmlData .= "</" . $key . ">\r";
		}
		$xmlData .= "</result>\r";
		
		return $xmlData;
	}
	
	public function userExist($login, $pwd) {
		$sqlQuery = $GLOBALS ['sql_array']['request_db_user_exist'];
		$sqlQuery = str_replace("%0", $login, $sqlQuery);
		$sqlQuery = str_replace("%1", $pwd, $sqlQuery);
		
		$resultQuery = $this->getRow($sqlQuery);
		
		preg_match("#<count>(.*)</count>#", $resultQuery, $result);
		
		return ($result[1] == '1');
	}
}
?>