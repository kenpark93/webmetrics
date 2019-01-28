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
                <button id="back" type="button" class="btn btn-primary" onclick="window.location='http://webmetric.ru'">На главную</button>
    		</div>
    	</div>
        <br><br><br>
        <h2 align="center">Ввод параметров</h2>
        <div class="content">
            <div class="param">
                <form>
                    <div>
                        <label><input type="text" id="str"/> Количество страниц</label>
                    </div>
                </form>
            </div>
            <div class="param">
                <form>
                    <div>
                        <label><input type="text" id="link"/> Количество внешних входящих ссылок</label>
                    </div>
                </form>
            </div>
            <div class="param">
                <form>
                    <div>
                        <label><input type="text" id="pub"/> Количество публикаций</label>
                    </div>
                </form>
            </div>
            <div class="param">
                <form>
                    <div>
                        <label><input type="text" id="file"/> Колличество файлов</label>
                    </div>
                </form>
            </div>
        </div>
        <div id="pop"></div>
        <button id="autoras" type="button" class="btn btn-success btn-block">Расчет показателей</button>
    </div>
    <script type="text/javascript">
        let prov = /^\d+$/;
        let flag = true;
        $("#autoras").on('click',function(){
            str = $("#str").val();
            link = $("#link").val();
            pub = $("#pub").val();
            file = $("#file").val();
        if (str != ''){
            if(!prov.test(str)) {
            foss();
            flag = false;
        }
        }
        else{
            str = 0;
        }
        if (link != ''){
            if(!prov.test(link)) {
            foss();
            flag = false;
        }
        }
        else{
            link = 0;
        }
        if (pub != ''){
            if(!prov.test(pub)) {
            foss();
            flag = false;
        }
        }
        else{
            pub = 0;
        }
        if (file != ''){
            if(!prov.test(file)) {
            foss();
            flag = false;
        }
        }
        else{
            file = 0;
        }
        if (str == 0 && link == 0 && pub == 0 && file == 0){
            ale();
            flag = false;
        }
        if (flag){
            window.location='/rate.php';
        }
        flag = true;
    }); 
    </script>
</body>
</html>