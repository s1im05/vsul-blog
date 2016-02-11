<?php
class Bootstrap_Controller extends Controller {
    
    public function run(){

        $oUser      = new User_Model($this->options);
        if (isset($_POST['token'])){
            $oUser->loginLoginza($_POST['token']);
        } elseif (!$oUser->isLogged()){
            $oUser->loginCookie();
        }
        
        if ($this->request->getPath() === '/logout'){
            $oUser->logout();
        }

        $this->view->assign('bIsLogged', $oUser->isLogged());
    }
}