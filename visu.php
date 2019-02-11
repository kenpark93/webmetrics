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
    			<h1>Визуализация изменений</h1>
                <button id="back" type="button" class="btn btn-primary" onclick="window.location='http://webmetric.ru'">На главную</button>
    		</div>
    	</div>
        <h2 align="center"></h2>
        <div id="curve_chart" style="width: 100%; height: 750px" align="center"></div>
    </div>
    <script type="text/javascript">

      let a = localStorage.getItem("site");
      $("h2").append(a);
      const dat = (a) => {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function(){
        if (xhttp.readyState==4 && xhttp.status==200) {
            var response = $.parseJSON(xhttp.responseText);
            if(response!=null) {
              console.log(response);
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);
              var count = Object.keys(response).length;
              function drawChart() {
                switch (count){
                  case 1:
                  var data = google.visualization.arrayToDataTable([
                    ['Количество', 'Страницы', 'Публикации', 'Ссылки', 'Файлы'],
                    [response[0]["date"],response[0]["str"],response[0]["pub"],response[0]["link"],response[0]["file"]]
                  ]);
                  break;
                  case 2:
                  var data = google.visualization.arrayToDataTable([
                    ['Дата', 'Страницы', 'Публикации', 'Ссылки', 'Файлы'],
                    [response[0]["date"],response[0]["str"],response[0]["pub"],response[0]["link"],response[0]["file"]],
                    [response[1]["date"],response[1]["str"],response[1]["pub"],response[1]["link"],response[1]["file"]]
                  ]);
                  break;
                  case 3:
                  var data = google.visualization.arrayToDataTable([
                    ['Дата', 'Страницы', 'Публикации', 'Ссылки', 'Файлы'],
                    [response[0]["date"],response[0]["str"],response[0]["pub"],response[0]["link"],response[0]["file"]],
                    [response[1]["date"],response[1]["str"],response[1]["pub"],response[1]["link"],response[1]["file"]],
                    [response[2]["date"],response[2]["str"],response[2]["pub"],response[2]["link"],response[2]["file"]]
                  ]);
                  break;
                  case 4:
                  var data = google.visualization.arrayToDataTable([
                    ['Дата', 'Страницы', 'Публикации', 'Ссылки', 'Файлы'],
                    [response[0]["date"],response[0]["str"],response[0]["pub"],response[0]["link"],response[0]["file"]],
                    [response[1]["date"],response[1]["str"],response[1]["pub"],response[1]["link"],response[1]["file"]],
                    [response[2]["date"],response[2]["str"],response[2]["pub"],response[2]["link"],response[2]["file"]],
                    [response[3]["date"],response[3]["str"],response[3]["pub"],response[3]["link"],response[3]["file"]]
                  ]);
                  break;
                  default:
                  var data = google.visualization.arrayToDataTable([
                    ['Дата', 'Страницы', 'Публикации', 'Ссылки', 'Файлы'],
                    [response[0]["date"],response[0]["str"],response[0]["pub"],response[0]["link"],response[0]["file"]],
                    [response[1]["date"],response[1]["str"],response[1]["pub"],response[1]["link"],response[1]["file"]],
                    [response[2]["date"],response[2]["str"],response[2]["pub"],response[2]["link"],response[2]["file"]],
                    [response[3]["date"],response[3]["str"],response[3]["pub"],response[3]["link"],response[3]["file"]],
                    [response[4]["date"],response[4]["str"],response[4]["pub"],response[4]["link"],response[4]["file"]]
                  ]);
                  break;
                }
              

        var options = {
          title: 'Показетели',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
            } else {
              console.log(0);
            }        
        }
      };
      console.log(a);
        obj = JSON.stringify({action:"putvisu",domen:a});
        xhttp.open("POST", 'ajax.php', true);
        xhttp.setRequestHeader("Content-Type","application/json");
        xhttp.send(obj);
    };
      dat(a);
    </script>
</body>
</html>