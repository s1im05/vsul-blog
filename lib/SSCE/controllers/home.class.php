<?php
namespace SSCE\Controllers;

class Home extends Base {
    
    protected $_sTitle      = 'Личный кабинет';
    protected $_sTemplate   = 'home.tpl.php';
    protected $_sLayout     = 'index.php';
    

    public function indexAction(){
        $oUser   = new \SSCE\Models\User($this->options);
        if (!$oUser->isLogged()){
            $this->request->go('/');
        }
        
        if (isset($_POST['save'])){
            $this->_save();
            $this->view->assign('aUser', $oUser->data);
        }
        
        $this->view->assign('sMenuActive', 'home');
    }
    
    private function _save(){
        $sNickname  = isset($_POST['nickname']) ? trim($_POST['nickname']) : '';
        if ($sNickname){
            $_SESSION['user']['nickname'] = $sNickname;
        } else {
            $this->view->assign('sError', 'Ошибка сохранения поля "Никнейм"');
            return;
        }
        
        $cGender    = isset($_POST['gender'])?$_POST['gender']:'U';
        if (in_array($_POST['gender'], array('M','F','U'))){
            $_SESSION['user']['gender'] = $cGender;
        } else {
            $this->view->assign('sError', 'Ошибка сохранения поля "Пол"');
            return;
        }
        
        $this->db->query("UPDATE LOW_PRIORITY ?_users SET nickname = ?, gender = ? WHERE id = ?d LIMIT 1;", $sNickname, $cGender, $_SESSION['user']['id']);
        $this->view->assign('sSuccess', 'Успешно сохранено');
    }
}