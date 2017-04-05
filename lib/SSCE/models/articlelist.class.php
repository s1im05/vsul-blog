<?php
namespace SSCE\Models;

class ArticleList extends Base {
     
	public function getPage($iPage) {
		if (!$iPage) {
			$iPage = 1;
		}
		$iPPP = $this->config->project->postsppage;
        $aData  = $this->db->selectPage($iTotal, "SELECT * FROM ?_articles ORDER BY date_c DESC LIMIT ?d, ?d;", ((int)$iPage - 1) * $iPPP, $iPPP);
		
		return array(
			'page' => $aData,
			'total' => (int)ceil($iTotal / $iPPP)
		);
	}
	
	public function getChapterPage($sChapter, $iPage) {
		if (!$iPage) {
			$iPage = 1;
		}
		$iPPP = $this->config->project->postsppage;
        $aData  = $this->db->selectPage($iTotal, "SELECT * FROM ?_articles WHERE chapter = ? ORDER BY date_c DESC LIMIT ?d, ?d;", $sChapter, ((int)$iPage - 1) * $iPPP, $iPPP);
		
		return array(
			'page' => $aData,
			'total' => (int)ceil($iTotal / $iPPP)
		);
	}
}
