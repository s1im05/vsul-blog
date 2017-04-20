<?php
namespace SSCE\Models;

class Article extends Base {
	
	public function getByName($sName, $bIncrement = false) {
		$aPost = $this->db->selectRow("SELECT * FROM ?_articles WHERE name = ? AND draft = 0 LIMIT 1;", $sName);
		if ($aPost && $bIncrement) {
			$this->db->query("UPDATE LOW_PRIORITY ?_articles SET views = views + 1 WHERE id = ?d LIMIT 1;", $aPost['id']);
		}
		return $aPost;
	}
}
