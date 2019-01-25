<?php 

function connect_db($db_param)
{
    $conn = mysqli_connect($db_param["server"], $db_param["user"], $db_param["pass"], $db_param["base"]);
    if ($conn)
      mysqli_set_charset($conn, "utf8");
    return $conn;
}

class myClass {

function getdat($json)
{
    global $db_param;
    $conn = connect_db($db_param);

    if ($conn != null) {
		if(!($stmt=$conn->prepare("SELECT pokaz, sees FROM views where domen=?"))) {
            echo "Не удалось подготовить запрос: (" . $conn->errno . ") " . $conn->error;
        }
		if(!$stmt->bind_param('s',$l)) {
            echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
        }
		$l=$json->da;
		if(!$stmt->execute()) {
            echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
        }
		if(!($res=$stmt->get_result())) {
            echo "Не удалось получить результат: (" . $stmt->errno . ") " . $stmt->error;
        } else {
            if($res>0){
                $gradInfo=array();
				while($bi=mysqli_fetch_array($res))
					$gradInfo[]=$bi;				
            } else {
                return null;
            }
        }
		$stmt->close();
		return json_encode($gradInfo);
    }
}

function putpose($json){
    global $db_param;
    $conn = connect_db($db_param);
    $l=$json->domen;
    $la = 'https://a.pr-cy.ru/' . $l;
    $text = file_get_contents( 'https://a.pr-cy.ru/' . $l );
    preg_match( '/<td class="text-right">(.*?)<\\/td>/is' , $text , $title );
    $pos = $title[1];
    $pos = str_replace('&nbsp;', '', $pos);
    $today = date("Y-m-d");
    if ($conn != null) {
        if(!($stmt=$conn->prepare("INSERT into views (domen,pokaz,sees) values($l,$today,$pos)"))) {
            echo "Не удалось подготовить запрос: (" . $conn->errno . ") " . $conn->error;
        } 
        $res =  $stmt->execute();       
        $stmt->close();
    }
    return $today;
}

}