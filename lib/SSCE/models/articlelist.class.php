<?php
namespace SSCE\Models;

class ArticleList extends Base {
     
	public function getPage($iPage, $sChapter = null) {
		if (!$iPage) {
			$iPage = 1;
		}
		if ($sChapter) {
			$sWhere = "AND a.chapter = '".mysql_real_escape_string($sChapter)."'";
		} else {
			$sWhere = '';
		}
		
		$iPPP = $this->config->project->postsppage;
        $aData  = $this->db->selectPage($iTotal, "SELECT 
														a.*
													FROM 
														?_articles a
													WHERE
														a.draft = 0
													{$sWhere}
													ORDER BY 
														a.date_c DESC 
													LIMIT ?d, ?d;", ((int)$iPage - 1) * $iPPP, $iPPP);
		if ($aData) {
			$aIds = array();
			foreach($aData as $aVal) {
				$aIds[] = (int)$aVal['id'];
			}
			$aTags = $this->db->select("SELECT 
												t.name AS tag_name,
												at.article_id
											FROM 
												?_tags t, 
												?_articles_tags at 
											WHERE 
												at.article_id IN (?a) AND
												at.tag_id = t.id", $aIds);
			if ($aTags) {
				$aTagsF = array();
				foreach ($aTags as $aVal) {
					$aTagsF[(int)$aVal['article_id']][] = $aVal['tag_name'];
				}
				
				foreach($aData as &$aVal) {
					$aVal['tags'] = $aTagsF[(int)$aVal['id']];
				}
			}
		}

		return array(
			'page' => $aData,
			'total' => (int)ceil($iTotal / $iPPP)
		);
	}
	
	public function getChapterPage($sChapter, $iPage) {
		return $this->getPage($iPage, $sChapter);
	}
	
	public function getPageByTagId($iTagId, $iPage) {
		if (!$iPage) {
			$iPage = 1;
		}
		
		$iPPP = $this->config->project->postsppage;
        $aData  = $this->db->selectPage($iTotal, "SELECT 
														a.*
													FROM 
														?_articles a,
														?_articles_tags at
													WHERE
														a.draft = 0 AND
														at.article_id = a.id AND
														at.tag_id = ?d
													ORDER BY 
														a.date_c DESC 
													LIMIT ?d, ?d;", 
													$iTagId, 
													((int)$iPage - 1) * $iPPP, 
													$iPPP);

		return array(
			'page' => $aData,
			'total' => (int)ceil($iTotal / $iPPP)
		);
	}
}
