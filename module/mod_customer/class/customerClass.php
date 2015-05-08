<?php
class customerClass {
	private $login;
	private $pwd;
	private $items;
		
	public function __construct($login, $pwd, $data) {
		$this->login = $login;
		$this->pwd = $pwd;
		$this->setCustomer($data);
	}
	
	private function setCustomer($data) {
		for ($i=0; $i < $GLOBALS['customer_array']['item_count']; $i++) {
			$this->items[$i] = array(
					"sys_value" => $GLOBALS['customer_array']['item_' . $i . '_sys_value'],
					"regex" => $GLOBALS['customer_array']['item_' . $i . '_regex'],
					"nullable" => $GLOBALS['customer_array']['item_' . $i . '_nullable'] && strtolower($GLOBALS['customer_array']['item_' . $i . '_nullable']) !== "false",
					"sql_name" => $GLOBALS['customer_array']['item_' . $i . '_sql_name'],
					"value" => $data[$i]
			);
		}
	}
	
	public function controlCustomer() {
		$result = true;
		for ($i=0; $i < count($this->items); $i++) {
			if($this->items[$i]["nullable"]) {
					if($this->items[$i]["value"] !="") {
						$this->items[$i]["control"] = preg_match("#".$this->items[$i]["regex"]."#", $this->items[$i]["value"]);
					} else {
						$this->items[$i]["control"] = true;
					}
			} else {
				$this->items[$i]["control"] = preg_match("#".$this->items[$i]["regex"]."#", $this->items[$i]["value"]);
			}
			$result &= $this->items[$i]["control"];
		}
		return $result;
	}
	
	public function addToBdd() {
		$db = new dbClass();
		if($db->userExist($this->login, $this->pwd)) {
			$query = $GLOBALS['customer_array']['request_mod_customer_add'];
			
			for ($i=0; $i < count($this->items); $i++) {
				$query = str_replace($this->items[$i]["sql_name"], $this->items[$i]["value"], $query);
			}
			
			$db->insertRow($query);
		}
	}
	
	public function __destruct() {
		
	}
	
	public function printCustomer() {
		for ($i=0; $i < count($this->items); $i++) {
			if($this->items[$i]["nullable"]) {
				$nullable = "true";
			} else {
				$nullable = "false";
			}
			if($this->items[$i]["control"]) {
				$control = "true";
			} else {
				$control = "false";
			}
			echo("<p>" . $this->items[$i]["sys_value"] . " = " . $this->items[$i]["value"] . " & nullable(" . $nullable . ") & control(" . $control . ")</p>");
		}
	}
}
