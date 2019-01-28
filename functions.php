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
    $flag = true;
    $l=$json->domen;
    $la = 'https://a.pr-cy.ru/' . $l;
    $text = file_get_contents( 'https://a.pr-cy.ru/' . $l );
    preg_match( '/<td class="text-right">(.*?)<\\/td>/is' , $text , $title );
    $pos = $title[1];
    $pose=preg_replace("/[^x\d|*\.]/","",$pos);
    $today = date("Y-m-d");
    $que = "SELECT id FROM views where pokaz = $today AND domen = $l";
    $result = mysqli_query($conn, $que);
    if ($flag==true){
        if ($conn != null) {
        if(!($stmt=$conn->prepare("insert into views (domen,pokaz,sees) values(?,?,?)"))) {
            echo "Не удалось подготовить запрос: (" . $conn->errno . ") " . $conn->error;
        }
        if(!$stmt->bind_param('sss',$a,$b,$c)) {
            echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
        }
        $a=$l;
        $b=$today ;  
        $c=$pose;
        $res =  $stmt->execute();       
        $stmt->close();
    }
    }
    
    return $result;
}

function hand($json){
    global $db_param;
    $conn = connect_db($db_param);
        if ($conn != null) {
        if(!($stmt=$conn->prepare("insert into pokaz (domain,str,pub,link,file) values(?,?,?,?,?)"))) {
            echo "Не удалось подготовить запрос: (" . $conn->errno . ") " . $conn->error;
        }
        if(!$stmt->bind_param('sssss',$a,$b,$c,$d,$e)) {
            echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
        }
        $a=$json->domen;
        $b=$json->str;  
        $c=$json->pub;
        $d=$json->link;
        $e=$json->file;
        $res =  $stmt->execute();       
        $stmt->close();
    }
    
    return $result;
}

}