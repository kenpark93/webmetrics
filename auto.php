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
    			<h1>Автоматический подсчет вебометрических показателей</h1>
                <button id="back" type="button" class="btn btn-primary" onclick="window.location='http://webmetric.ru'">На главную</button>
    		</div>
    	</div>
        <br><br><br>
        <h2 align="center">Выбор параметров</h2>
        <div class="content">
            <div class="param">
                <form>
                    <div>
                        <label><input type="checkbox" id="str"/> Количество страниц</label>
                    </div>
                </form>
            </div>
            <div class="param">
                <form>
                    <div>
                        <label><input type="checkbox" id="link"/> Количество внешних входящих ссылок</label>
                    </div>
                </form>
            </div>
            <div class="param">
                <form>
                    <div>
                        <label><input type="checkbox" id="pub"/> Количество публикаций</label>
                    </div>
                </form>
            </div>
            <div class="param">
                <form>
                    <div>
                        <label><input type="checkbox" id="file"/> Колличество файлов</label>
                    </div>
                </form>
            </div>
        </div>
        <button id="autoras" type="button" class="btn btn-success btn-block">Расчет показателей</button>
    </div>
    <script type="text/javascript">
        let a = localStorage.getItem("site");
        var str = document.getElementById("str");
        var link = document.getElementById("link");
        var pub = document.getElementById("pub");
        var file = document.getElementById("file");
        var maxrate = 0;
        var summ = 0;
        console.log(a);
        $("#autoras").on('click',function(){
        if (str.checked){
            str = 1;
        }
        else {
            str = 0;
        }
        if (link.checked){
            link = 1;
        }
        else {
            link = 0;
        }
        if (pub.checked){
            pub = 1;
        }
        else {
            pub = 0;
        }
        if (file.checked){
            file = 1;
        }
        else {
            file = 0;
        }
        console.log(str + " " + link + " " + pub + " " + file);
        auutoo(a, str, link, pub, file);
        rating();
        ratingpok(a);
        window.location='/rate.php';
    }); 
        const auutoo = (a, str, link, pub, file) => {
      console.log(a);
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function(){
        if (xhttp.readyState==4 && xhttp.status==200) {
            var response = xhttp.responseText;
            if(response!=null) {
              console.log(response);
            } else {
              console.log(0);
            }        
        }
      };
        obj = JSON.stringify({action:"avto",domen:a,str:str,pub:pub,link:link,file:file});
        xhttp.open("POST", 'ajax.php', true);
        xhttp.setRequestHeader("Content-Type","application/json");
        xhttp.send(obj);
    };
    const rating = () => {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function(){
        if (xhttp.readyState==4 && xhttp.status==200) {
            var response = $.parseJSON(xhttp.responseText);
            if(response!=null) {
              console.log(response[0][0]);
              maxrate = response[0][0] + 1;
              localStorage.setItem("maxrate", maxrate);
            } else {
              console.log(0);
            }        
        }
      };
        obj = JSON.stringify({action:"rating",domen:a});
        xhttp.open("POST", 'ajax.php', true);
        xhttp.setRequestHeader("Content-Type","application/json");
        xhttp.send(obj);
    };

    const ratingpok = (a) => {
      var xhttp = new XMLHttpRequest();
      console.log(maxrate);
      xhttp.onreadystatechange = function(){
        if (xhttp.readyState==4 && xhttp.status==200) {
            var response = $.parseJSON(xhttp.responseText);
            if(response!=null) {
              console.log(response);
              summ = 0.05 * response[0][0] + 0.35 * response[0][1] + 0.5 * response[0][2] + 0.1 * response[0][3];
              console.log(summ);
              localStorage.setItem("summ", summ);
            } else {
              console.log(0);
            }        
        }
      };
        obj = JSON.stringify({action:"ratingpok",domen:a});
        xhttp.open("POST", 'ajax.php', true);
        xhttp.setRequestHeader("Content-Type","application/json");
        xhttp.send(obj);
    };
    </script>
</body>
</html>