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
      <table class="table table-inverse">
  <thead>
    <tr>
      <th>Сайт ВУЗа</th>
      <th>Количество страниц</th>
      <th>Количество публикаций</th>
      <th>Количество входящих внешних ссылок</th>
      <th>Количество файлов</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>volpi.ru</td>
      <td>7216</td>
      <td>416</td>
      <td>202000</td>
      <td>3150</td>
    </tr>
  </tbody>
</table>
<br><br><br>
      <button id="autoras" type="button" class="btn btn-success btn-block">Визуализации рейтинга</button>
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