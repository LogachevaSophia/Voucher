<?php
if (isset($_POST['done'])) {
    if (($_POST['pass']=='123')&&($_POST['login']=='admin')){
        setcookie("logged", "1", time()+60*15);//15 мин
        echo 'Helo';
        header('Location: '.$_SERVER['REQUEST_URI']);
        session_start();
    }
    
}
?>