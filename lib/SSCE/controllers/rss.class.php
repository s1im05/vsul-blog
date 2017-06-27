<?php
namespace SSCE\Controllers;

class Rss extends Base {
    
    protected $_sLayout     = 'rss.php';

    public function rssAction(){
        $aRss   = array(
            'title'         => $this->config->project->title,
            'description'   => $this->config->project->description,
            'items'         => $this->db->select("SELECT
                                                            id,
                                                            title,
                                                            name,
                                                            text_short AS description,
                                                            date_c AS date
                                                        FROM
                                                            ?_articles
                                                        WHERE
                                                            date_c < NOW() and
															draft = 0
                                                        ORDER BY
                                                            date_c DESC
                                                        LIMIT 50;"));
        if ( !empty( $aRss['items'] ) ) {
            foreach ( $aRss['items'] as $iKey => $aVal ) {
                $aRss['items'][$iKey]['description']    = str_replace( '<img','<img style="max-width: 570px;"', $aVal['description']);
            }
        }
        $this->view->assign('aRss', $aRss);
    }
}