<?php
namespace SSCE\Controllers;

class Home extends Base {
    
    protected $_sTemplate   = 'home.tpl.php';
    protected $_sLayout     = 'index.php';
    

    public function indexAction(){
        $oUser   = new \SSCE\Models\User($this->options);
        if (!$oUser->isLogged()){
            $this->request->go('/');
        }
        
        if (isset($_POST['save'])){
            $this->_save();
        }
        
        if (isset($_POST['view_type'])){
            $sType  = $_POST['view_type'] == 'list' ? 'list':'thumb';
            setcookie('vt', $sType, strtotime('+30 days'), '/', '', false, true);
            $this->view->assign('sViewType', $sType);
        } else {
            $this->view->assign('sViewType', isset($_COOKIE['vt'])?($_COOKIE['vt']=='list' ? 'list':'thumb'):'thumb');
        }
        
        $this->setTitle('Личный кабинет');
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