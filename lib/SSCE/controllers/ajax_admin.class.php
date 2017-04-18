<?php
namespace SSCE\Controllers;

class Ajax_Admin extends Base {
	
	protected $_sLayout     = 'ajax_layout_json.php';	
	
	private $user;
   
	public function tagAction() {
		$this->__checkRole();
		$oTags = new \SSCE\Models\Tags($this->options);
		
		if (isset($_POST['action']) && $_POST['action'] === 'add' && isset($_POST['articleId']) && isset($_POST['tag'])) {
			$oTags->add($_POST['tag'], (int)$_POST['articleId']);
		}
		
		if (isset($_POST['action']) && $_POST['action'] === 'remove' && isset($_POST['articleId']) && isset($_POST['tagId'])) {
			$oTags->remove($_POST['tagId'], (int)$_POST['articleId']);
		}
		
		$this->view->assign('sRequest', true);
	}
	
	public function commentAction() {
		$this->__checkRole();
		$oComments = new \SSCE\Models\Comments($this->options);
		
		if (isset($_POST['commentId']) && isset($_POST['state'])) {
			$oComments->isDeleted((int)$_POST['commentId'], (int)$_POST['state']);
		}		
		$this->view->assign('sRequest', true);
	}
	
	private function __checkRole() {
		$this->user = new \SSCE\Models\User($this->options);
		if (!$this->user->isLogged() || $this->user->role !== 'admin') {
			header('HTTP/1.0 403 Forbidden');
			die();
		}
	}
}
