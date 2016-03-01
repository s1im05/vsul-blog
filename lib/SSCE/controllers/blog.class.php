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
            $this->view->assign('aPost', $aPost);
            $this->setTemplate('article.tpl.php');
        } else {
            $this->request->go404();
        }
    }
}