<?php
namespace SSCE\Controllers;

class Admin_Articles extends Admin {
    
    protected $_sTemplate   = 'admin_articles.tpl.php';
    
    public function articlesAction(){
        parent::checkAdminLogin();
        
        if (isset($_POST['id']) && $_POST['id'] > 0){ // edit
            $this->db->query("UPDATE LOW_PRIORITY
                    ?_articles
                SET
                    name    = ?,
                    title   = ?,
                    text    = ?,
                    text_short  = ?,
                    text_goto   = ?
                WHERE
                    id  = ?d
                LIMIT 1;",
                trim($_POST['name']),
                trim($_POST['title']),
                trim($_POST['text']),
                trim($_POST['text_short']),
                trim($_POST['text_goto']),
                $_POST['id']);
            
        } elseif (isset($_POST['id']) && $_POST['id'] == 0){ // add
            $this->db->query("INSERT INTO
                    ?_articles
                SET
                    name    = ?,
                    title   = ?,
                    text    = ?,
                    text_short  = ?,
                    text_goto   = ?;",
                trim($_POST['name']),
                trim($_POST['title']),
                trim($_POST['text']),
                trim($_POST['text_short']),
                trim($_POST['text_goto']));
        }
        
        
        $aData  = $this->db->select("SELECT * FROM ?_articles ORDER BY id DESC;");
        
        $this->view->assign('aData', $aData);
        $this->view->assign('sMenuActive', 'articles');
    }
    
    public function ajaxAction(){
        parent::checkAdminLogin();
        
        $this->setLayout('ajax_layout_json.php');
        
        if (isset($_GET['isUnique'])){
            $iCell  = $this->db->selectCell("SELECT COUNT(*) FROM ?_articles WHERE name = ?;", $_GET['isUnique']);
            $this->view->assign('sRequest', ($iCell == 0));
            return;
        }

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