<?php
namespace SSCE\Controllers;

class Blog extends Base {
    
    protected $_sTemplate  = 'blog.tpl.php';
	
    public function allAction($sPageUrl, $iPage){
		
		$oArticleList = new \SSCE\Models\ArticleList($this->options);
		$aRes = $oArticleList->getPage((int)$iPage);
		
        $this->view->assign('aData', $aRes['page']);
        $this->view->assign('sMenuActive', 'all');
        $this->view->assign('iPageActive', (int)$iPage ? (int)$iPage : 1);
        $this->view->assign('iPagesCount', $aRes['total']);
    }
	
    public function chapterAction($sChapter, $sPageUrl, $iPage){
		
		$oArticleList = new \SSCE\Models\ArticleList($this->options);
		$aRes = $oArticleList->getChapterPage($sChapter, (int)$iPage);
		
        $this->view->assign('aData', $aRes['page']);
        $this->view->assign('sPgPrefix', "/{$sChapter}");
        $this->view->assign('sMenuActive', $sChapter);
        $this->view->assign('iPageActive', (int)$iPage ? (int)$iPage : 1);
        $this->view->assign('iPagesCount', $aRes['total']);
    }
    
    public function byNameAction($sName){
		$oArticle = new \SSCE\Models\Article($this->options);
        if ($aPost  = $oArticle->getByName($sName, true)){
            
			$oTags = new \SSCE\Models\Tags($this->options);
            $oUser   = new \SSCE\Models\User($this->options);
            $this->_getComments($aPost['id'], $oUser);
            
			$aPost['tags'] = $oTags->getList((int)$aPost['id']);
			
			$this->setTitle($aPost['title']);
            $this->view->assign('aPost', $aPost);
            $this->view->assign('aTags', $oTags->getList((int)$aPost['id']));
			$this->view->assign('sMenuActive', $aPost['chapter']);
            $this->setTemplate('article.tpl.php');
        } else {
            $this->request->go404();
        }
    }
    
    private function _getComments($iPostId, $oUser){
		$oComments = new \SSCE\Models\Comments($this->options);
		
        if ($oUser->isLogged() && isset($_POST['comment']) && trim($_POST['comment'])){
			$oComments->addComment($_POST['comment'], $iPostId, $oUser->id);
			$this->request->refresh();
        }
        $this->view->assign('aCommentList', $oComments->getCommentList((int)$iPostId));
    }
}