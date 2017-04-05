<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Необходима авторизация</title>
    
	<link href="/dist/admin-styles.css" rel="stylesheet">	
    <script type="text/javascript" src="/dist/admin-bundle.js"></script>
</head>
<body class="b-loginbody">
    <div class="container">
        <div class="col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
            <div class="panel">
                <form method="post" class="b-loginform">
                    <h3>Введите свой логин и пароль</h3>
                    <? if ($sError) :?>
                        <p class="text-danger"><?=$sError?></p>
                    <? endif;?>
                    <div class="form-group">
                        <input type="text"      autofocus="autofocus" required="required" placeholder="Логин" class="form-control" name="login">
                    </div>
                    <div class="form-group">                    
                        <input type="password"  autofocus="autofocus" required="required" placeholder="Пароль" class="form-control" name="pass">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Войти</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>