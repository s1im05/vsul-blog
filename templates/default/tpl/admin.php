<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Панель управления</title>
	
	<link href="/dist/admin-styles.css" rel="stylesheet">	
    <script type="text/javascript" src="/dist/admin-bundle.js"></script>
</head>
<body class="b-adminbody">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button id="admPanelXsMenu" class="navbar-toggle collapsed" type="button">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
                <a href="/adm_panel" class="navbar-brand">Панель управления</a>
            </div>
            <div class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
                <ul class="nav navbar-nav xs-menu">
                    <li <?=$sMenuActive == 'articles' ? 'class="active"':''?>><a href="/adm_panel/articles">Статьи</a></li>
                    <li class="visible-xs"><a href="/adm_panel/logout">Выйти</a></li>
                </ul>
				<div class="btn-group pull-right hidden-xs">
					<a class="btn btn-md b-btnpadded btn-default" href="/" target="_blank"><i class="fa fa-fw fa-home"></i></a>
					<a class="btn btn-md b-btnpadded btn-default" href="/adm_panel/logout"><i class="fa fa-fw fa-sign-out"></i></a>
				</div>
            </div>
        </nav>
        
        <? if ($sSuccess) :?>
            <div class="alert alert-success" role="alert"><?=$sSuccess?></div>
        <? endif;?>
        <? if ($sError) :?>
            <div class="alert alert-danger" role="alert"><?=$sError?></div>
        <? endif;?>
        
        <div class="panel">
            <div class="panel-body">
                <? include $template;?>
            </div>
        </div>
    </div>
</body>
</html>