<?php
namespace SSCE\Controllers;

class Blog extends Base {
    
    protected $_sTemplate  = 'blog.tpl.php';
    
    public function allAction($sPageUrl, $iPage){
		
		$oArticleList = new \SSCE\Models\ArticleList($this->options);
		$aRes = $oArticleList->getPage((int)$iPage);
		
        $this->view->assign('aData', $aRes['page']);
        $this->view->assign('sMenuActive', 'all');
        $this->view->assign('iPageActive', (int)$iPage);
        $this->view->assign('iPagesCount', $aRes['total']);
    }
	
    public function chapterAction($sChapter, $sPageUrl, $iPage){
		
		$oArticleList = new \SSCE\Models\ArticleList($this->options);
		$aRes = $oArticleList->getChapterPage($sChapter, (int)$iPage);
		
        $this->view->assign('aData', $aRes['page']);
        $this->view->assign('sMenuActive', $sChapter);
        $this->view->assign('iPageActive', $iPage);
        $this->view->assign('iPagesCount', $aRes['total']);
    }
    
    public function byNameAction($sName){
		$oArticle = new \SSCE\Models\Article($this->options);
        if ($aPost  = $oArticle->getByName($sName)){
            
            $oUser   = new \SSCE\Models\User($this->options);
            $this->_getComments($aPost['id'], $oUser);
            
			$this->setTitle($aPost['title']);
            $this->view->assign('aPost', $aPost);
			$this->view->assign('sMenuActive', $aPost['chapter']);
            $this->setTemplate('article.tpl.php');
        } else {
            $this->request->go404();
        }
    }
    
    private function _getComments($iPostId, $oUser){
        if ($oUser->isLogged() && isset($_POST['comment']) && trim($_POST['comment'])){
            $iId    = $this->db->query("INSERT INTO 
                                                    ?_comments 
                                                SET
                                                    post_id     = ?d,
                                                    user_id     = ?d,
                                                    text        = ?",
                                                $iPostId,
                                                $oUser->id,
                                                trim($_POST['comment']) );
            $this->db->query("UPDATE LOW_PRIORITY ?_posts SET comments = comments+1 WHERE id = ?d LIMIT 1;", $iPostId);                                    
            $this->view->assign('bCommentAdded',    true);
            $this->view->assign('iLastAdded',       $iId);
        }
        $aCommentList   = $this->db->select("SELECT 
                                                        c.*,
                                                        u.nickname,
                                                        u.gender,
                                                        u.photo
                                                    FROM 
                                                        ?_comments c,
                                                        ?_users u
                                                    WHERE
                                                        c.post_id   = ?d AND
                                                        c.user_id   = u.id
                                                    ORDER BY
                                                        c.id;",
                                                    $iPostId);
        $this->view->assign('aCommentList', $aCommentList);
    }
}