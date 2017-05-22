<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="yandex-verification" content="ac91410ad5460100" />
    <title>VSul<?=$title ? ' &ndash; '.$title : ''?></title>
    <link href="<?=$path?>/img/favicon.png" type="image/x-icon" rel="icon" />	
	<link href="/dist/main-styles.css" rel="stylesheet">	    
    <script type="text/javascript" src="/dist/main-bundle.js"></script>
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
				<? if (SSCE\H\logged()) :?>
					<a href="/home">
						<img class="media-object c-avatar-small" src="<?=$aUser['photo'] ? $aUser['photo'] : $path.'/img/user.jpg'?>">
					</a>
				<? else :?>
					<a href="//loginza.ru/api/widget?token_url=<?=urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'])?>&lang=ru" class="c-nav__link loginza">
						<i class="fa fa-user-circle"></i>
					</a>
				<? endif;?>
			</span>
			<span class="c-nav__search pull-right">
				<input id="search" type="text" class="form-control pull-right" placeholder="Поиск...">
			</span>			
		</span>
		<div class="visible-xs c-nav-xs">
			<input type="text" id="searchXs" class="form-control" placeholder="Поиск...">
		</div>
		<button class="btn btn-default pull-right visible-xs" id="navBtn">
			<i class="fa fa-bars"></i>
		</button>
    </div>

	<ul class="dropdown-menu c-nav__menu-xs" id="navMenu">
		<li <?=$sMenuActive === 'all' ? 'class="active"' : ''?>><a href="/"><i class="fa fa-home"></i>Главная</a></li>
		<li <?=$sMenuActive === 'work' ? 'class="active"' : ''?>><a href="/work"><i class="fa fa-desktop"></i>Работа</a></li>
		<li <?=$sMenuActive === 'games' ? 'class="active"' : ''?>><a href="/games"><i class="fa fa-gamepad"></i>Игры</a></li>
		<li <?=$sMenuActive === 'travel' ? 'class="active"' : ''?>><a href="/travel"><i class="fa fa-plane"></i>Путешествия</a></li>
		<li class="divider"></li>
		<? if (SSCE\H\logged()) :?>
			<li <?=$sMenuActive === 'home' ? 'class="active"' : ''?>><a href="/home"><i class="fa fa-user-circle"></i>Профиль</a></li>
			<li><a href="/logout"><i class="fa fa-sign-out"></i>Выйти</a></li>
		<? else :?>
			<li><a href="//loginza.ru/api/widget?token_url=<?=urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'])?>&lang=ru" class="loginza"><i class="fa fa-sign-in"></i>Войти</a></li>
		<? endif;?>			
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
				<a id="obs"><i class="fa fa-2x fa-envelope-o"></i></a>
				&nbsp;
				<a href="/rss"><i class="fa fa-2x fa-rss-square"></i></a>
			</span>
		</p>
    </div>
</footer>

<div class="modal-backdrop fade in hidden" id="modalBackdrop"></div>
<div class="modal" tabindex="-1" id="modalObs" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close modal-close"><span>&times;</span></button>
				<h4 class="modal-title">Отправить сообщение</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="hidden-xs">Тема</label>
					<div><input placeholder="Тема" class="form-control" type="text" name="title" maxlength="100"></div>
				</div>
				<div class="form-group">
					<label class="hidden-xs">Сообщение</label>
					<div><textarea placeholder="Сообщение" class="form-control" rows="5" name="text"></textarea></div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary btn-send-ajax" id="obsSend">
					<i class="fa fa-spinner fa-spin"></i>
					Отправить
				</button>
				<button type="button" class="btn btn-default modal-close">Закрыть</button>
			</div>
		</div>
	</div>
</div>

<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-26449998-10', 'auto');
	ga('send', 'pageview');
</script>

</body>
</html>