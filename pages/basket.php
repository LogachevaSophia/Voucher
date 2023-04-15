<html>

<?php session_start();

//taskOption - тип путевки
//eat_type -тип питания
//name -имя
//email - пота
//telephone - телефон
//country - страна
//servie - массив выбранных сервисов

$name = "";
$eat_type = "";
$taskOption = "";
$email = "";
$telephone = "";
$country = "";
$service = array();

if (isset($_SESSION['name'])){
    $name = $_SESSION['name'];
}


if (isset($_SESSION['eat_type'])){
    $eat_type = $_SESSION['eat_type'];
}

if (isset($_SESSION['taskOption'])){
    $taskOption = $_SESSION['taskOption'];
}

if (isset($_SESSION['email'])){
    $email = $_SESSION['email'];
}

if (isset($_SESSION['telephone'])){
    $telephone = $_SESSION['telephone'];
}
if (isset($_SESSION['country'])){
    $country = $_SESSION['country'];
}





require 'bill_processing.php';
$ser = "";
$dop_price = 0;
if (isset($_POST['country'])) {
    $_SESSION['country'] = $_POST['country'];
    $country = $_POST['country'];
}
if (isset($_POST['service'])) {
    $_SESSION['service'] = $_POST['service'];
    $service = $_POST['service'];
    for ($i = 0; $i < count($_SESSION['service']); $i++) {
        $ser = $ser . $_SESSION['service'][$i];
        $dop_price += $prices[$_SESSION['service'][$i]];
        if ($i != count($_SESSION['service']) - 1) {
            $ser = $ser . ', ';
        }
    }
}
if (isset($_POST['sendme'])) {
    if (isset($_SESSION['service'])) {
        $ser = "";
        for ($i = 0; $i < count($_SESSION['service']); $i++) {
            $ser = $ser . $_SESSION['service'][$i];
            $dop_price += $prices[$_SESSION['service'][$i]];
            if ($i != count($_SESSION['service']) - 1) {
                $ser = $ser . ', ';
            }
        }
    }
    save_file($_SESSION['name'], $_SESSION['email'], $_SESSION['telephone'], $_SESSION['country'], $ser, $_SESSION['taskOption'], $_SESSION['eat_type']);
    send($_SESSION['email']);
}


if ((isset($_SESSION['taskOption'])) && (isset($_SESSION['eat_type'])) && (isset($_SESSION['country']))) {

    $all_price = $prices[$_SESSION['taskOption']] + $prices[$_SESSION['eat_type']] + $prices[$_SESSION['country']];
} else {
    $all_price = 0;
}

if (isset($_SESSION['service'])) {
    foreach ($_SESSION['service'] as $value) {
        $all_price += $prices[$value];
    }
}

?>

<head>
    <title>Работа</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
</head>

<body topmargin="0" bottommargin="0" rightmargin="0" leftmargin="0" background="../images/back_main.gif">
    <table cellpadding="0" cellspacing="0" border="0" align="center" width="583" height="614">
        <tr>
            <td valign="top" width="583" height="208" background="../images/row1.gif">
                <div style="margin-left:88px; margin-top:57px ">
                    <img src="../images/w1.gif">
                    <?php

                    if (isset($_SESSION["logged"]) && ($_SESSION["logged"] == 1)) {

                        echo 'Вы авторизованы';
                    } else {

                        echo ' Вы не авторизованы';
                    }
                    ?>
                </div>
                <div style="margin-left:50px; margin-top:69px ">
                    <a href="../index.php">Главная<img src="../images/m1.gif" border="0"></a>
                    <img src="../images/spacer.gif" width="20" height="10">
                    <a href="order.php">Заказ<img src="../images/m2.gif" border="0"></a>
                    <img src="../images/spacer.gif" width="5" height="10">
                    <a href="basket.php">Корзина<img src="../images/m3.gif" border="0"></a>
                    <img src="../images/spacer.gif" width="5" height="10">
                    <a href="index-3.php">О компании<img src="../images/m4.gif" border="0"></a>
                    <img src="../images/spacer.gif" width="5" height="10">
                    <a href="index-4.php">Контакты<img src="../images/m5.gif" border="0"></a>
                    </form>
                </div>
            </td>
        </tr>
        <tr>
            <td valign="top" width="583" height="338" bgcolor="#FFFFFF">
                <table cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td valign="top" height="338" width="42"></td>
                        <td valign="top" height="338" width="492">
                            <table cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td width="492" valign="top" height="106">

                                        <div style="margin-left:1px; margin-top:2px; margin-right:10px "><br>
                                            <div style="margin-left:5px "><img src="../images/1_p1.gif" align="left"></div>
                                            <div style="margin-left:95px ">
                                                <font class="title">Название</font><br>





                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="492" valign="top" height="232">
                                        <table cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td valign="top" height="232" width="248">
                                                    <div style="margin-left:6px; margin-top:2px; "><img src="../images/hl.gif"></div>
                                                    <div style="margin-left:6px; margin-top:7px; "><img src="../images/1_w2.gif"></div>
                                                    <?PHP
                                                    if ((isset($_SESSION['logged'])) && ($_SESSION['logged'] == 1)) { ?>
                                                        <div style="font-family: Tahoma;font-size: 10px;color: #7E7E76; border: 0.2em solid #7E7E76; padding: 0.3em; margin-right: 20px; ">

                                                            <b> Контактная информация</b>
                                                            <br>
                                                            <br>

                                                            Имя: <?php echo $name ?>
                                                            <br>
                                                            Email: <?php echo $email ?>
                                                            <br>
                                                            Телефон: <?php echo $telephone ?>
                                                            <br>
                                                        <?php } ?>
                                                        </div>
                                                        <?PHP
                                                        if ((isset($_SESSION['logged'])) && ($_SESSION['logged'] == 1)) { ?>
                                                            <div style="font-family: Tahoma;font-size: 10px;color: #7E7E76; border: 0.2em solid #7E7E76; padding: 0.3em; margin-right: 20px; margin-top: 5px;">

                                                                <b> Составляющие путевки</b>
                                                                <br>
                                                                <br>
                                                                Тип путевки: <?php echo $taskOption . '  Стоимость: ' . $prices[$taskOption] ?>
                                                                <br>
                                                                Тип питания: <?php echo $eat_type . '  Стоимость: ' . $prices[$eat_type] ?>
                                                                <br>
                                                                Страна основного пребывания: <?php echo $country . '  Стоимость: ' . $prices[$country] ?>
                                                                <br>
                                                                <?php



                                                                ?>
                                                                Дополнительыне услуги: <?php echo $ser . '  Стоимость: ' . $dop_price ?>
                                                                <br>
                                                            <?php } ?>
                                                            </div>






                                                <td valign="top" height="215" width="1" background="../images/tal.gif" style="background-repeat:repeat-y"></td>
                                                <td valign="top" height="215" width="243">
                                                    <div style="margin-left:22px; margin-top:2px; "><img src="../images/hl.gif"></div>
                                                    <div style="margin-left:22px; margin-top:7px; "><img src="../images/1_w2.gif"></div>
                                                    <div style="margin-left:22px; margin-top:13px; ">

                                                        <?PHP
                                                        if ((isset($_SESSION['logged'])) && ($_SESSION['logged'] == 1)) { ?>
                                                            Общая стоимость: <?php echo $all_price ?>
                                                        <?php } ?>
                                                        <br><br><br><br>


                                                    </div>
                                                    <div style="margin-left:22px; margin-top:16px; ">
                                                        <img src="../images/hl.gif">
                                                    </div>
                                                    <div style="margin-left:22px; margin-top:7px; ">
                                                        <img src="../images/1_w4.gif">
                                                    </div>
                                                    <div style="margin-left:22px; margin-top:9px; ">



                                                    </div>


                                                    </div>


                                                    </div>
                                                    <?PHP
                                                    if ((isset($_SESSION['logged'])) && ($_SESSION['logged'] == 1)) { ?>
                                                        <form method="post" action="">
                                                            <input style=" border:none;text-decoration: none;background-color: rgb(35, 241, 241);" type='submit' value='Отправить на почту и записать в файл' name='sendme' />
                                                        </form>
                                                    <?PHP } ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td valign="top" height="338" width="49"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td valign="top" width="583" height="68" background="../images/row3.gif">
                <div style="margin-left:51px; margin-top:31px ">
                    <a href="#"><img src="../images/p1.gif" border="0"></a>
                    <img src="../images/spacer.gif" width="26" height="9">
                    <a href="#"><img src="../images/p2.gif" border="0"></a>
                    <img src="../images/spacer.gif" width="30" height="9">
                    <a href="#"><img src="../images/p3.gif" border="0"></a>
                    <img src="../images/spacer.gif" width="149" height="9">
                    <a href="index-5.php"><img src="../images/copyright.gif" border="0"></a>
                </div>
            </td>
        </tr>

    </table>
</body>

</html>