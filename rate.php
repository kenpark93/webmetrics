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
    <script src="/js/loader.js"></script>
	<script src="/js/jquery-3.3.1.slim.min.js"></script>
	<script src="/js/bootstrap.js"></script>
	<title>Сервис сбора вебметрических данных</title>
</head>
<body>
    <div class="content">
    	<div class="box">
    		<div class="box-title">
    			<h1>Расчет показателей</h1>
                <button id="back" type="button" class="btn btn-primary" onclick="window.location='http://webmetric.ru'">На главную</button>
    		</div>
    	</div>
      <br><br><br>
      <table class="table table-inverse" id="table1">
  <thead>
    <tr>
      <th>Место</th>
      <th>Сайт ВУЗа</th>
      <th>Количество страниц</th>
      <th>Количество публикаций</th>
      <th>Количество входящих внешних ссылок</th>
      <th>Количество файлов</th>
    </tr>
  </thead>
  <tbody>

  </tbody>
</table>
<br><br><br>
      <button id="autoras" type="button" class="btn btn-success btn-block">Визуализации рейтинга</button>
    </div>
    <script type="text/javascript">
        let a = localStorage.getItem("site");
        const rate = () => {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
        if (xhttp.readyState==4 && xhttp.status==200) {
            var response = $.parseJSON(xhttp.responseText);
            if(response!="") {
              console.log(response);
              for (var iter = 0; iter < response.length; iter++) {
                var newElem = document.getElementById('table1');
                var newRow=newElem.insertRow(0);
                var newCell0 = newRow.insertCell(0);
                var newCell1 = newRow.insertCell(1);
                var newCell2 = newRow.insertCell(2);
                var newCell3 = newRow.insertCell(3);
                var newCell4 = newRow.insertCell(4);
                var newCell5 = newRow.insertCell(5);
                newCell0.innerHTML=response[iter]['rate'];
                newCell1.innerHTML=response[iter]['domen'];
                newCell2.innerHTML=response[iter]['str'];
                newCell3.innerHTML=response[iter]['pub'];
                newCell4.innerHTML=response[iter]['link'];
                newCell5.innerHTML=response[iter]['file'];

                newElem.appendChild(newRow);
              }
            } else {
              console.log(0);
            }        
        }
        };
        obj = JSON.stringify({action:"data"});
        xhttp.open("POST", 'ajax.php', true);
        xhttp.setRequestHeader("Content-Type","application/json");
        xhttp.send(obj);
    };
    rate();
    </script>
</body>
</html>