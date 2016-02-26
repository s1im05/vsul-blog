<?php
namespace SSCE\Controllers;

class Admin_Articles extends Admin {
    
    protected $_sTemplate   = 'admin_articles.tpl.php';
    
    public function articlesAction(){
        parent::checkAdminLogin();
        
        $aData  = $this->db->select("SELECT * FROM ?_articles ORDER BY id DESC;");
        
        $this->view->assign('aData', $aData);
        $this->view->assign('sMenuActive', 'articles');
    }
    
    public function ajaxAction(){
        parent::checkAdminLogin();
        
        $this->setLayout('ajax_layout_json.php');
        
        if (isset($_GET['id'])){
            $aData  = $this->db->selectRow("SELECT * FROM ?_articles WHERE id = ?d LIMIT 1;", $_GET['id']);
            $this->view->assign('sRequest', $aData);
            return;
        }

        if (isset($_POST['delete'])){
            $this->db->query("DELETE FROM ?_articles WHERE id = ?d LIMIT 1;", $_POST['id']);
            $this->view->assign('sRequest', true);
            return;
        }        
    }
}