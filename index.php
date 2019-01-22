<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="/images/favicon.ico" type="icon">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Оценка сайтов по критериям">
	<meta name="author" content="Кристина Чердынцева">
	<link rel="stylesheet" href="/css/style.css" />
	<link rel="stylesheet" href="/css/bootstrap.css" />
	<script src="/js/scripts.js"></script>
	<script src="/js/jquery-3.3.1.slim.min.js"></script>
	<script src="/js/bootstrap.js"></script>
	<title>Сервис сбора вебметрических данных</title>
</head>
<body>
    <div class="content">
    	<div class="box">
    		<div class="box-title">
    			<h1>Анализ сайта</h1>
    		</div>
    		<div class="box-content">
    			<p>
    				В данном сервисе Вы можете проверить в автоматическом режиме сайт по вебметрическим показателям, таким как: количество страниц на сайте, количество ссылок, количество публикаций и количество файлов. Также можно посмотреть количество посещений. Все показания записываются в базу, в дальнейшем можно вывести график. Показания можно вносить вручную
    			</p>
    			<hr>
                <div id="pop"></div>
                <div class="but">
                    <button type="submit" class="btn btn-primary pull-right" id="auto">Автоматический расчет</button>
                    <button type="submit" class="btn btn-primary pull-right" id="work">Расчет вручную</button>
                    <button type="submit" class="btn btn-primary pull-right" id="pose">График посещений</button>
                </div>
    			<input name="url" type="text" class="form-control" autofocus="autofocus" style="width:50%;" placeholder="Введите сайт..." id="site">
    		</div>
    	</div>
    </div>
    <script type="text/javascript">
        $("#auto").on('click',function(){
        site = $("#site").val();
        if (site == ''){
            fos();
        }
        else{
            window.location='/auto.php';
        }
    });

    $("#work").on('click',function(){
        site = $("#site").val();
        if (site == ''){
            fos();
        }
        else{
            window.location='/work.php';
        }
    }); 

    $("#pose").on('click',function(){
        site = $("#site").val();
        if (site == ''){
            fos();
        }
        else{
            window.location='/pose.php';
        }
    });  
    </script>
</body>
</html>