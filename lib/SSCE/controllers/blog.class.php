<?php
namespace SSCE\Controllers;

class Blog extends Base {
    
    protected $_sTemplate   = 'home.tpl.php';
    
    public function allAction(){
        $aData  = $this->db->select("SELECT * FROM ?_articles ORDER BY date_c DESC LIMIT ?d;", $this->config->project->postsppage);
        
        $this->view->assign("aData", $aData);
    }
}