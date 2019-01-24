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
    			<h1>График посещений</h1>
                <button id="back" type="button" class="btn btn-primary" onclick="window.location='http://webmetric.ru'">На главную</button>
    		</div>
    	</div>
        <h2 align="center"></h2>
        <div id="curve_chart" style="width: 100%; height: 750px" align="center"></div>
    </div>
    <script type="text/javascript">
      let a = localStorage.getItem("site");
      let list = [];
      const dat = (a) => {
        let b = localStorage.getItem("site");
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function(){
        if (xhttp.readyState==4 && xhttp.status==200) {
            var response = xhttp.responseText;
            if(response!=null) {
              list = response;
            } else {
              console.log(0);
            }        
        }
      };
      console.log(b);
        obj = JSON.stringify({action:"getdat",da:b});
        xhttp.open("POST", 'ajax.php', true);
        xhttp.setRequestHeader("Content-Type","application/json");
        xhttp.send(obj);
    };
      dat();
      $("h2").append(a);
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      console.log(list);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Дата показаний', 'Посещения'],
          ['04.01.19',  1000],
          ['08.01.19',  1170],
          ['15.01.19',  660],
          ['16.01.19',  1030],
          ['23.01.19',  750]
        ]);

        var options = {
          title: 'Посещений в сутки',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
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