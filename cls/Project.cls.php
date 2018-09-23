<?php

class Praetor{

	var $db;

	//建構函式
	public function Project(){
		$this->db = new WADB(SYSTEM_DBHOST, SYSTEM_DBNAME_PRAETOR, SYSTEM_DBUSER, SYSTEM_DBPWD);
		return true;
	}
	public function custosql($sql){
		$retStr = $this->db->selectRecords($sql);
		return $retStr;php
	}
	public function custoupdate($sql){
		$retStr = $this->db->updateRecords($sql);
	}
	public function custodelete($sql){
		$retStr = $this->db->deleteRecords($sql);
	}
	public function custoinsert($sql){
		$retStr = $this->db->insertRecords($sql);
	}
}
?>