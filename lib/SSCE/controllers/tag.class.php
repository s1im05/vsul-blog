<?php
namespace SSCE\Controllers;

class Tag extends Base {
    
    protected $_sTitle      = 'Статьи с тэгом';
    protected $_sTemplate   = 'tag.tpl.php';
    protected $_sLayout     = 'index.php';
    

    public function indexAction($sTag, $iPage) {
		
		if (!$iPage) {
			$iPage = 1;
		}
		
		$oTag = new \SSCE\Models\Tags($this->options);
		if (!($aTag = $oTag->getByName($sTag))) {
			$this->request->go404();
		}
		
		$oArticleList = new \SSCE\Models\ArticleList($this->options);
		$aRes = $oArticleList->getPageByTagId((int)$aTag['id'], (int)$iPage);
		
		$this->setTitle($this->_sTitle.' &laquo;'.htmlspecialchars($sTag).'&raquo;');
        $this->view->assign('sMenuActive', 'tag');
		$this->view->assign('aData', $aRes['page']);
        $this->view->assign('iPageActive', (int)$iPage ? (int)$iPage : 1);
        $this->view->assign('iPagesCount', $aRes['total']);
		$this->view->assign('iOlStart', ($iPage - 1) * (int)$this->config->project->postsppage + 1);
		$this->view->assign('sPgPrefix', '/tag/'.htmlspecialchars($sTag));
    }
}