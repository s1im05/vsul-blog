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
														a.*,
														t1.name AS tag_name,
														t1.id AS tag_id
													FROM 
														?_articles a
													LEFT JOIN
														(
															SELECT 
																	t2.*, 
																	at.article_id, 
																	t2.id ARRAY_KEY 
																FROM 
																	?_tags t2, 
																	?_articles_tags at 
																WHERE 
																	t2.id = at.tag_id
																ORDER BY
																	t2.weight DESC
														) t1
													ON
														t1.article_id = a.id
													WHERE
														a.draft = 0
													{$sWhere}
													ORDER BY 
														a.date_c DESC 
													LIMIT ?d, ?d;", ((int)$iPage - 1) * $iPPP, $iPPP);
		$aRes = array();
		foreach($aData as $aVal) {
			$id = (int)$aVal['id'];
			if (!isset($aRes[$id])) {
				$aRes[$id] = $aVal;
				$aRes[$id]['tags'] = array();
				unset($aRes[$id]['tag_name']);
				unset($aRes[$id]['tag_id']);
			}
			if ($aVal['tag_name'] !== NULL) {
				$aRes[$id]['tags'][(int)$aVal['tag_id']] = $aVal['tag_name'];
			}
		}
				
		return array(
			'page' => $aRes,
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
