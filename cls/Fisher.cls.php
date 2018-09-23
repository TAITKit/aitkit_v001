<?php

class Fisher{

	var $db;

	//建構函式
	public function Fisher(){
		$this->db = new MeekroDB(SYSTEM_DBHOST, SYSTEM_DBNAME_FISHER, SYSTEM_DBUSER, SYSTEM_DBPWD);
		return true;
	}
	public function custosql($sql, $dataArray){
		$retStr = $this->db->query($sql, $dataArray);
		return $retStr;
	}
	public function custoupdate($table, $dataArray){
		$retStr = $this->db->updateRecords($table, $dataArray);
	}
	public function custodelete($sql, $input1, $input2){
		$retStr = $this->db->delete($sql, $input1, $input2);
	}
	public function custoinsert($table, $dataArray){
		$retStr = $this->db->insert($table, $dataArray);
	}
}
?>