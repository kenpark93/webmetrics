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
    			<h1>Расчет показалей вручную</h1>
                <button id="back" type="button" class="btn btn-primary" onclick="window.location='http://webmetrics.ru'">На главную</button>
    		</div>
    	</div>
        <br><br><br>
        <h2 align="center">Ввод параметров</h2>
        <div class="content">
            <div class="param">
                <form>
                    <div>
                        <label><input type="text" /> Количество страниц</label>
                    </div>
                </form>
            </div>
            <div class="param">
                <form>
                    <div>
                        <label><input type="text" /> Количество внешних входящих ссылок</label>
                    </div>
                </form>
            </div>
            <div class="param">
                <form>
                    <div>
                        <label><input type="text" /> Количество публикаций</label>
                    </div>
                </form>
            </div>
            <div class="param">
                <form>
                    <div>
                        <label><input type="text" /> Колличество файлов</label>
                    </div>
                </form>
            </div>
        </div>
        <button id="autoras" type="button" class="btn btn-success btn-block">Расчет рейтинга</button>
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
    </script>
</body>
</html>