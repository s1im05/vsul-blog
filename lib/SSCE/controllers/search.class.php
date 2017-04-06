<?php
namespace SSCE\Controllers;

class Search extends Base {
    
    protected $_sTemplate   = 'search.php';
    protected $_sLayout     = 'index.php';

    
    public function searchAction($sQuery, $sPage){
        $sQuery = trim($sQuery);
		$iPage = !$sPage ? 1 : (int)$sPage;
		
        $aFound = $this->_getFound($sQuery, $iPage, $bByTag);
        
        $this->view->assign('sChapter',     'all');
        $this->view->assign('aFound',       $aFound);
        $this->view->assign('sQuery',       $sQuery);
		$this->view->assign('iOlStart',     ($iPage - 1) * (int)$this->config->project->postsppage + 1);
		$this->view->assign('iPageActive',  $iPage);
		$this->view->assign('iPagesCount', 	$aFound['total']);
		$this->view->assign('sPgPrefix', 	"/search/{$sQuery}");
        $this->view->assign('bByTag',       false);
        
        $this->setTitle('Поиск по запросу &laquo;'.htmlspecialchars($sQuery).'&raquo;');
    }
    
    public function searchByTagAction($sQuery){
        $this->searchAction($sQuery, true);
        $this->setTitle('Поиск по тэгу &laquo;'.htmlspecialchars($sQuery).'&raquo;');
        $this->view->assign('bByTag', true);
    }
    
    
    private function _getFound($sQuery, $iPage, $bByTagOnly = false){
        if (isset($sQuery)){
			
            $sText  = substr(trim($sQuery), 0, 50);
            $aWords = array();
            if ($aTmp  = explode(' ', $sText)){
                foreach ($aTmp as $sWord){
                    if ((trim( $sWord ) != '') && (mb_strlen(trim( $sWord )) > 2 )){
                        $aWords[]   = mysql_real_escape_string($sWord);
                    }
                }
                $aWords = array_unique($aWords);
            } else {
                $aWords[]   = $sText;
            }
            if (!empty($aWords)){
                $iPPP = (int)$this->config->project->postsppage;
                if ($aData  = $this->db->selectPage($iTotal, 
                                                    "SELECT
                                                        a.*
													FROM 
                                                        ?_articles a
                                                    WHERE
														(
															a.title LIKE '%".implode("%' OR a.title LIKE '%", $aWords)."%'
															OR
															a.text LIKE '%".implode("%' OR a.text LIKE '%", $aWords)."%'
                                                        ) AND
                                                        a.date_c < NOW()
                                                    ORDER BY
                                                        a.id DESC
                                                    LIMIT ?d, ?d;",
                                                    ($iPage - 1) * $iPPP, 
                                                    $iPPP)){
                    return array(
                        'total' => (int)ceil($iTotal / $iPPP), 
                        'data'  => $aData
                    );
                }
            }
            return array(
                'total' => 0, 
                'data'  => array()
            );
        }
    }
}