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
      const prosm = (a) => {
      console.log(a);
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function(){
        if (xhttp.readyState==4 && xhttp.status==200) {
            var response = xhttp.responseText;
            if(response!=null) {
              console.log(response);
              location.reload()
            } else {
              console.log(0);
            }        
        }
      };
        obj = JSON.stringify({action:"putpose",domen:a});
        xhttp.open("POST", 'ajax.php', true);
        xhttp.setRequestHeader("Content-Type","application/json");
        xhttp.send(obj);
    };
      const dat = (a) => {
        let b = localStorage.getItem("site");
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function(){
        if (xhttp.readyState==4 && xhttp.status==200) {
            var response = $.parseJSON(xhttp.responseText);
            if(response!=null) {
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);
              pokaz = JSON.parse(response);
              var count = Object.keys(pokaz).length;
              function drawChart() {
                switch (count){
                  case 1:
                  var data = google.visualization.arrayToDataTable([
                    ['Дата показаний', 'Посещения'],
                    [pokaz[0]["pokaz"],  pokaz[0]["sees"]]
                  ]);
                  break;
                  case 2:
                  var data = google.visualization.arrayToDataTable([
                    ['Дата показаний', 'Посещения'],
                    [pokaz[0]["pokaz"],  pokaz[0]["sees"]],
                    [pokaz[1]["pokaz"],  pokaz[1]["sees"]]
                  ]);
                  break;
                  case 3:
                  var data = google.visualization.arrayToDataTable([
                    ['Дата показаний', 'Посещения'],
                    [pokaz[0]["pokaz"],  pokaz[0]["sees"]],
                    [pokaz[1]["pokaz"],  pokaz[1]["sees"]],
                    [pokaz[2]["pokaz"],  pokaz[2]["sees"]]
                  ]);
                  break;
                  case 4:
                  var data = google.visualization.arrayToDataTable([
                    ['Дата показаний', 'Посещения'],
                    [pokaz[0]["pokaz"],  pokaz[0]["sees"]],
                    [pokaz[1]["pokaz"],  pokaz[1]["sees"]],
                    [pokaz[2]["pokaz"],  pokaz[2]["sees"]],
                    [pokaz[3]["pokaz"],  pokaz[3]["sees"]]
                  ]);
                  break;
                  case 5:
                  var data = google.visualization.arrayToDataTable([
                    ['Дата показаний', 'Посещения'],
                    [pokaz[0]["pokaz"],  pokaz[0]["sees"]],
                    [pokaz[1]["pokaz"],  pokaz[1]["sees"]],
                    [pokaz[2]["pokaz"],  pokaz[2]["sees"]],
                    [pokaz[3]["pokaz"],  pokaz[3]["sees"]],
                    [pokaz[4]["pokaz"],  pokaz[4]["sees"]]
                  ]);
                  break;
                }
              

        var options = {
          title: 'Посещений в сутки',
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
        obj = JSON.stringify({action:"getdat",da:b});
        xhttp.open("POST", 'ajax.php', true);
        xhttp.setRequestHeader("Content-Type","application/json");
        xhttp.send(obj);
    };
    prosm(a);
      dat();
      $("h2").append(a);
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