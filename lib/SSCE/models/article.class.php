<?php
namespace SSCE\Models;

class Article extends Base {
	
	public function getByName($sName) {
		return $this->db->selectRow("SELECT * FROM ?_articles WHERE name = ? AND draft = 0 LIMIT 1;", $sName);
	}
}
