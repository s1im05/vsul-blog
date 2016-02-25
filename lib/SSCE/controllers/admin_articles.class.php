<?php
namespace SSCE\Controllers;

class Admin_Articles extends Admin {
    
    protected $_sTemplate   = 'admin_articles.tpl.php';
    
    public function articlesAction(){
        parent::indexAction();
        
        $this->view->assign('sMenuActive', 'articles');
    }
}