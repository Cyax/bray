<?php 
    class dbClass {
        public $isConnected;
        protected $datab;
        protected $sqlIni;
        
        public function __construct(){
            try {
            	$this->sqlIni = parse_ini_file("../param/sql.ini");
            	$options = [];
            	
                $this->datab = new PDO("mysql:host={$this->sqlIni['db_host']};dbname={$this->sqlIni['db_dbname']};charset=utf8", $this->sqlIni['db_username'], $this->sqlIni['db_password'], $options); 
                $this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                $this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                $this->isConnected = true;
            } 
            catch(PDOException $e) { 
                $this->isConnected = false;
                throw new Exception($e->getMessage());
            }
        }
        
        public function Disconnect() {
            $this->datab = null;
            $this->isConnected = false;
        }
        
        public function getRow($query, $params=array()) {
            try {
                $stmt = $this->datab->prepare($query); 
                $stmt->execute($params);
                return $stmt->fetch();  
            } catch(PDOException $e) {
                throw new Exception($e->getMessage());
            }
        }
        
        public function getRows($query, $params=array()) {
            try{ 
                $stmt = $this->datab->prepare($query); 
                $stmt->execute($params);
                return $stmt->fetchAll();       
			} catch(PDOException $e) {
                throw new Exception($e->getMessage());
            }       
        }
        
        public function insertRow($query, $params) {
            try {
                $stmt = $this->datab->prepare($query); 
                $stmt->execute($params);
            } catch(PDOException $e) {
                throw new Exception($e->getMessage());
            }           
        }
        
        public function updateRow($query, $params) {
            return $this->insertRow($query, $params);
        }
        
        public function deleteRow($query, $params) {
            return $this->insertRow($query, $params);
        }
        
        /**
         Exemple Utilisation:
        $result = mysql_query("SELECT * from company");
        header("Content-Type: application/xml");
        echo sqlToXml($result, "companies", "company");
        */
        
        /**
         * @param mysql_resource - $queryResult - mysql query result
         * @param string - $rootElementName - root element name
         * @param string - $childElementName - child element name
         */
        function sqlToXml($queryResult, $rootElementName, $childElementName)
        {
        	$xmlData = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>\n";
        	$xmlData .= "<" . $rootElementName . ">";
        
        	while($record = mysql_fetch_object($queryResult))
        	{
        		/* Create the first child element */
        		$xmlData .= "<" . $childElementName . ">";
        
        		for ($i = 0; $i < mysql_num_fields($queryResult); $i++)
        		{
        		$fieldName = mysql_field_name($queryResult, $i);
        
        		/* The child will take the name of the table column */
        		$xmlData .= "<" . $fieldName . ">";
        
        		/* We set empty columns with NULL, or you could set
        		it to '0' or a blank. */
        		if(!empty($record->$fieldName))
        			$xmlData .= $record->$fieldName;
        		else
        			$xmlData .= "null";
        
        			$xmlData .= "</" . $fieldName . ">";
        		}
        		$xmlData .= "</" . $childElementName . ">";
        		}
        		$xmlData .= "</" . $rootElementName . ">";
        
        				return $xmlData;
        	}
    }
?>