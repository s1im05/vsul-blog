<?php
namespace SSCE\Controllers;

class Admin_Dashboard extends Admin {
    
    protected $_sLayout     = 'ajax_layout_json.php';
    
    public function indexAction(){
        parent::checkAdminLogin();
        
        if (isset($_POST['mostPopular'])){
            $aRes	= $this->db->select("SELECT name,views,title FROM ?_articles ORDER BY views DESC LIMIT 10;");
            $this->view->assign('sRequest', $aRes);
            return;
        }
		
        if (isset($_POST['obs'])){
            $aRes	= $this->db->select("SELECT * FROM ?_obs ORDER BY id DESC LIMIT 10;");
            $this->view->assign('sRequest', $aRes);
            return;
        }
		
        if (isset($_POST['lastComments'])){
            $aRes	= $this->db->select("SELECT * FROM ?_comments WHERE is_deleted = 0 ORDER BY id DESC LIMIT 10;");
            $this->view->assign('sRequest', $aRes);
            return;
        }
    }
}