<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>VVV<?=$title ? ' &ndash; '.$title : ''?></title>
	
	<link href="/dist/styles.css" rel="stylesheet">	
    
    <link href="<?=$path?>/img/favicon.ico" type="image/x-icon" rel="icon" />
    <link href="<?=$path?>/img/favicon.ico" type="image/x-icon" rel="shortcut icon" />
    
    <script type="text/javascript" src="/dist/bundle.js"></script>
    <script type="text/javascript" src="//loginza.ru/js/widget.js"></script>
</head>
<body data-chapter="<?=$sMenuActive?>">
<nav class="c-nav">
    <div class="container">
        <a class="c-nav__logo <?=$sMenuActive === 'all' ? 'c-nav__logo-active' : ''?>" href="/">VSul</a>

		<span class="hidden-xs">
			<a class="c-nav__link <?=$sMenuActive === 'work' ? 'c-nav__link-active' : ''?>" href="/work"><i class="fa fa-desktop"></i>Работа</a>
			<a class="c-nav__link <?=$sMenuActive === 'games' ? 'c-nav__link-active' : ''?>" href="/games"><i class="fa fa-gamepad"></i>Игры</a>
			<a class="c-nav__link <?=$sMenuActive === 'travel' ? 'c-nav__link-active' : ''?>" href="/travel"><i class="fa fa-plane"></i>Путешествия</a>

			<span class="c-nav__right">
				<a class="c-nav__link"><i class="fa fa-user-circle"></i></a>
			</span>
			<span class="c-nav__search pull-right">
				<input type="text" class="form-control pull-right" placeholder="Поиск...">
			</span>			
		</span>
		<div class="visible-xs c-nav-xs">
			<input type="text" class="form-control" placeholder="Поиск...">
		</div>
		<button class="btn btn-default pull-right visible-xs" id="navBtn">
			<i class="fa fa-bars"></i>
		</button>
    </div>
	
	<ul class="dropdown-menu c-nav__menu-xs" id="navMenu">
		<li><a href="/work"><i class="fa fa-desktop"></i>Работа</a></li>
		<li><a href="/games"><i class="fa fa-gamepad"></i>Игры</a></li>
		<li><a href="/travel"><i class="fa fa-plane"></i>Путешествия</a></li>
		<li class="divider"></li>
		<li><a><i class="fa fa-user-circle"></i>Войти</a></li>
	</ul>
</nav>

<div class="c-jumbotron jumbotron" id="jumbo">
    <div class="container"></div>
</div>

<main class="c-main">
    <div class="c-main__container container">
        <? include $template;?>
    </div>
</main>

<footer class="c-footer">
    <div class="container">
        <hr>
        <p>
			VSul &copy; 2017
			<span class="pull-right">
				<a href="/rss"><i class="fa fa-rss-square"></i></a>
			</span>
		</p>
    </div>
</footer>

</body>
</html>