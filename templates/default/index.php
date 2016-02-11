<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>VVV<?=$title ? ' &ndash; '.$title : ''?></title>
    
    <link rel="stylesheet" type="text/css" href="<?=$path?>/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?=$path?>/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?=$path?>/css/common.css?v=00" />
    
    <link href="<?=$path?>/img/favicon.ico" type="image/x-icon" rel="icon" />
    <link href="<?=$path?>/img/favicon.ico" type="image/x-icon" rel="shortcut icon" />
    
    <script type="text/javascript" src="<?=$path?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?=$path?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=$path?>/js/common.js?v=00"></script>
    
    <script type="text/javascript" src="//loginza.ru/js/widget.js"></script>
    <script type="text/javascript" src="//vk.com/js/api/openapi.js?115"></script>
</head>
<body>
    <header>
        Header
    </header>
    
    <nav>
        Hardcoded Nav
    </nav>
    
    <main>
        Main <?include $template;?>
    </main>
    
    <aside>
        Aside
    </aside>
    
    <footer>
        <?=date('Y')?> &copy;</strong> VVV
    </footer>
</body>
</html>