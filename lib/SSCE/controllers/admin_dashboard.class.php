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
            $aRes	= $this->db->select("SELECT 
												c.*,
												a.name AS article_name
											FROM 
												?_comments c,
												?_articles a
											WHERE 
												c.post_id = a.id
											ORDER BY 
												c.id DESC 
											LIMIT 10;");
            $this->view->assign('sRequest', $aRes);
            return;
        }
		
        if (isset($_POST['toggleCommentDelete'])){
            $this->db->select("UPDATE LOW_PRIORITY 
									?_comments c
								SET
									c.is_deleted = !c.is_deleted
								WHERE 
									c.id = ?d
								LIMIT 1;", $_POST['toggleCommentDelete']);
            $this->view->assign('sRequest', true);
            return;
        }
    }
}