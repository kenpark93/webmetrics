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
        if ($b == 0){
            $que = "SELECT MAX(str) FROM pokaz where domain = $a";
            $b = mysqli_query($conn, $que);
        }  
        $c=$json->pub;
        if ($c == 0){
            $que = "SELECT MAX(pub) FROM pokaz where domain = $a";
            $c = mysqli_query($conn, $que);
        }
        $d=$json->link;
        if ($d == 0){
            $que = "SELECT MAX(link) FROM pokaz where domain = $a";
            $d = mysqli_query($conn, $que);
        }
        $e=$json->file;
        if ($e == 0){
            $que = "SELECT MAX(file) FROM pokaz where domain = $a";
            $e = mysqli_query($conn, $que);
        }
        $res =  $stmt->execute();       
        $stmt->close();
    }
    //$que = "SELECT id FROM views where pokaz = $today AND domen = $l";
    //$result = mysqli_query($conn, $que);
    //$main = $b + $c + $d + $e;
    //if ($conn != null) {
    //    if(!($stmt=$conn->prepare("insert into pokaz (domain,str,pub,link,file) values(?,?,?,?,?)"))) {
     //       echo "Не удалось подготовить запрос: (" . $conn->errno . ") " . $conn->error;
     //   }
       // if(!$stmt->bind_param('sssss',$a,$b,$c,$d,$e)) {
      //      echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
       // }
       // $res =  $stmt->execute();       
      //  $stmt->close();
    //}
    return $que;
}



function avto($json){
    $a=$json->domen;
    $b=$json->str;  
    $c=$json->pub;
    $d=$json->link;
    $e=$json->file;
    $la = 'https://www.google.com/search?rlz=1C1GCEA_enRU774RU774&ei=jbVRXLv0JciyswGxlYjgAw&q=site%3A' . $a . '+filetype%3Apdf+OR+filetype%3Appt+OR+filetype%3Adoc&oq=site%3A' . $a . '+filetype%3Apdf+OR+filetype%3Appt+OR+filetype%3Adoc&gs_l=psy-ab.3...6311.39771..40939...0.0..0.147.488.9j1......0....2j1..gws-wiz.b1U7i4a0yHM';
    if ($b == 1){
        $text = file_get_contents( 'https://www.google.com/search?q=site:' . $a );
        preg_match('/\s[\d]{0,}\s[\d]{3}/', $text, $page );
        $pos = $page[0];
        $str=preg_replace("/[^x\d|*\.]/","",$pos);
        if ($str == 0){
            $que = "SELECT MAX(str) FROM pokaz where domain = $a";
            $str = mysqli_query($conn, $que);
        }
    }
    if ($c == 1){
        $text = file_get_contents( 'https://scholar.google.ru/scholar?hl=ru&as_sdt=0%2C5&q=' . $a );
        preg_match('/\s[\d]{0,}\s[\d]{3}/', $text, $page );
        $pos = $page[0];
        $pub=preg_replace("/[^x\d|*\.]/","",$pos);
        if ($pub == 0){
            $que = "SELECT MAX(pub) FROM pokaz where domain = $a";
            $pub = mysqli_query($conn, $que);
        }
    }
    if ($d == 1){
        $text = file_get_contents( 'https://www.google.com/search?q=link:' . $a );
        preg_match('/\s[\d]{0,}\s[\d]{3}/', $text, $page );
        $pos = $page[0];
        $link=preg_replace("/[^x\d|*\.]/","",$pos);
        if ($link == 0){
            $que = "SELECT MAX(link) FROM pokaz where domain = $a";
            $link = mysqli_query($conn, $que);
        }
    }
    if ($e == 1){
        $text = file_get_contents( 'https://www.google.com/search?rlz=1C1GCEA_enRU774RU774&ei=jbVRXLv0JciyswGxlYjgAw&q=site%3A' . $a . '+filetype%3Apdf+OR+filetype%3Appt+OR+filetype%3Adoc&oq=site%3A' . $a . '+filetype%3Apdf+OR+filetype%3Appt+OR+filetype%3Adoc&gs_l=psy-ab.3...6311.39771..40939...0.0..0.147.488.9j1......0....2j1..gws-wiz.b1U7i4a0yHM');
        preg_match('/\s[\d]{0,}\s[\d]{3}/', $text, $page );
        $pos = $page[0];
        $file=preg_replace("/[^x\d|*\.]/","",$pos);
        if ($file == 0){
            $que = "SELECT MAX(file) FROM pokaz where domain = $a";
            $file = mysqli_query($conn, $que);
        }
    }
    global $db_param;
    $conn = connect_db($db_param);
        if ($conn != null) {
        if(!($stmt=$conn->prepare("insert into pokaz (domain,str,pub,link,file) values(?,?,?,?,?)"))) {
            echo "Не удалось подготовить запрос: (" . $conn->errno . ") " . $conn->error;
        }
        if(!$stmt->bind_param('sssss',$a,$str,$pub,$link,$file)) {
            echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
        }
        $res =  $stmt->execute();       
        $stmt->close();
    }
    
    return $str;
}

function data()
{
    global $db_param;
    $conn = connect_db($db_param);

    if ($conn != null) {
        if(!($stmt=$conn->prepare("SELECT rate, domen, str, pub, link, file FROM rating, pokaz WHERE pokaz.id IN (SELECT MAX(pokaz.id) FROM pokaz GROUP BY pokaz.domain) AND pokaz.domain = rating.domen ORDER BY rating.rate"))) {
            echo "Не удалось подготовить запрос: (" . $conn->errno . ") " . $conn->error;
        }
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

}
