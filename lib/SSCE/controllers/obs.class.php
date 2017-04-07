<?php
namespace SSCE\Controllers;

class Obs extends Base {
    
    protected $_sLayout     = 'ajax_layout_json.php';
    
    public function sendAction(){
		if (!isset($_POST['text']) || trim($_POST['text']) === '') {
			return;
		}
		$this->db->query("INSERT INTO ?_obs SET title = ?, text = ?", trim($_POST['title']), trim($_POST['text']));
        $this->view->assign('sRequest', true);
    }
}