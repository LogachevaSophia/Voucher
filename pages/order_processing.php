<?php 
 $arr = array(
    array('type' => 'круиз', 'price' => 2000, 'desc' => 'На большом теплоходе  ...'),
    array('type' => 'сафари', 'price' => 3000, 'desc' => 'В жаркой пустыне  ...'),
    array('type' => 'гастротур', 'price' => 1000, 'desc' => 'Этнические рестораны  ...'),
);

$eat = array(
    array('type' => 'завтрак', 'price' => 10, 'desc' => 'с 8-00 до 10-00'),
    array('type' => 'ужин', 'price' => 20, 'desc' => 'с 19-00 до 22-00'),
    array('type' => 'пансион ', 'price' => 50, 'desc' => 'добавляется обед с 13-00 до 15-00'),
);
if (isset($_POST['first'])) {

   $_SESSION['taskOption'] = $_POST['taskOption'];
   $_SESSION['eat_type'] = $_POST['eat_type'];
   $_SESSION['name'] = $_POST['name'];
   $_SESSION['telephone'] = $_POST['telephone'];
   $_SESSION['email'] = $_POST['email'];
   header('Location: '.$_SERVER['PHP_SELF']);  
   
}
?>