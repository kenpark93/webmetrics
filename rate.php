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
    			<h1>Расчет рейтинга</h1>
                <button id="back" type="button" class="btn btn-primary" onclick="window.location='http://webmetrics.ru'">На главную</button>
    		</div>
    	</div>
      <br><br><br>
      <table class="table table-inverse">
  <thead>
    <tr>
      <th>#</th>
      <th>Учебные заведения</th>
      <th>Количество страниц</th>
      <th>Количество публикаций</th>
      <th>Количество входящих внешних ссылок</th>
      <th>Количество файлов</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>МГУ</td>
      <td>1000</td>
      <td>5000</td>
      <td>300</td>
      <td>200</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>МФТИ</td>
      <td>950</td>
      <td>4000</td>
      <td>290</td>
      <td>155</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>МИФИ</td>
      <td>875</td>
      <td>3550</td>
      <td>231</td>
      <td>149</td>
    </tr><tr>
      <th scope="row">4</th>
      <td>ВШЭ</td>
      <td>765</td>
      <td>3322</td>
      <td>222</td>
      <td>123</td>
    </tr>
    <tr>
      <th scope="row">5</th>
      <td>СПбГУ</td>
      <td>650</td>
      <td>3123</td>
      <td>200</td>
      <td>100</td>
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