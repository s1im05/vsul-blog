<?php
namespace SSCE\Controllers;

class Blog extends Base {
    
    protected $_sTemplate   = 'blog.tpl.php';
    
    public function allAction($iPage = 1){
        $aData  = $this->db->selectPage($iTotal, "SELECT * FROM ?_articles ORDER BY date_c DESC LIMIT ?d, ?d;", ($iPage-1)*$this->config->project->postsppage, $this->config->project->postsppage);
        if (empty($aData)){
            $this->request->go404();
        }
        
        
        $this->view->assign('aData', $aData);
        $this->view->assign('sMenuActive', 'blog');
        $this->view->assign('iPageActive', $iPage);
        $this->view->assign('iPagesCount', (int)ceil($iTotal/$this->config->project->postsppage));
    }
    
    public function byNameAction($sName){
        if ($aPost  = $this->db->selectRow("SELECT * FROM ?_articles WHERE name = ? LIMIT 1;", $sName)){
            
            $oUser   = new \SSCE\Models\User($this->options);
            $this->_getComments($aPost['id'], $oUser);
            
            $this->view->assign('aPost', $aPost);
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