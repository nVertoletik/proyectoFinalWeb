<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$username = $_POST["username"];
$password = $_POST["pwd"];
$flag = 'true';

$result = consulta('SELECT id,email,password,fname,type from users order by id asc');

if($result === FALSE){
  echo "ocurrio un error";
}

if($result){
$row = $result;
    if($row[0]['email'] == $username && $row[0]['password'] == $password) {

      $_SESSION['username'] = $username;
      $_SESSION['type'] = $row['type'];
      $_SESSION['id'] = $row[0]['id'];
      $_SESSION['fname'] = $row[0]['fname'];
      header("location:index.php");
    } else {

        if($flag === 'true'){
          redirect();
          $flag = 'false';
        }
    }
}

function redirect() {
  echo '<h1>Invalid Login! Redirecting...</h1>';
  header("Refresh: 3; url=index.php");
}


?>
