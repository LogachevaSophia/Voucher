﻿<html>
<?php session_start(); ?>

<head>
    <title>Работа</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
</head>

<body topmargin="0" bottommargin="0" rightmargin="0" leftmargin="0" background="../images/back_main.gif">

    <?php
    require 'order_processing.php';



    $price_name =  isset($_SESSION['taskOption']) ? $_SESSION['taskOption'] : "noset";
    $desc_name =  isset($_SESSION['taskOption']) ? "isset" : "noset";
    // foreach ($arr as $value){
    for ($i = 0; $i < count($arr); $i++) {
        $key = array_search($price_name, $arr[$i]);
        if (isset($key)) {
            break;
        }
    }
    //$json = json_encode($arr);
    ?>


    <table cellpadding="0" cellspacing="0" border="0" align="center" width="583" height="614">
        <tr>
            <td valign="top" width="583" height="208" background="../images/row1.gif">
                <div style="margin-left:88px; margin-top:57px ">
                    <img src="../images/w1.gif">
                    <?php

                    if (isset($_SESSION["logged"])&&($_SESSION["logged"]==1)) {

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

                </div>
            </td>
        </tr>
        <tr>
            <td valign="top" width="583" height="338" bgcolor="#FFFFFF">
                <table cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <form method="post" action="bill.php">
                            <td valign="top" height="338" width="42"></td>
                            <td valign="top" height="338" width="492">
                                <table cellpadding="0" cellspacing="0" border="0">
                                    <tr>
                                        <td width="492" valign="top" height="106">

                                            <div style="margin-left:1px; margin-top:2px; margin-right:10px "><br>
                                                <div style="margin-left:5px "><img src="../images/1_p1.gif" align="left"></div>
                                                <div style="margin-left:95px ">
                                                    <font class="title">Название</font><br>
                                                    <?php if ((isset($_SESSION['logged'])) && ($_SESSION['logged'] == 1)) { ?>
                                                        <select name="taskOption" id='taskOption'>

                                                            <?PHP
                                                            foreach ($arr as &$value) {

                                                            ?>

                                                                <option value=<?php echo $value['type'] ?>><?php echo $value['type'] ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        <div id='price'><?php echo $price_name ?></div>
                                                        <div id='description'><?php echo $desc_name ?></div>
                                                    <?php } ?>



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
                                                        if ((isset($_SESSION['logged'])) && ($_SESSION['logged'] == 1)) {
                                                            foreach ($eat as &$value) {

                                                        ?>
                                                                <input type='radio' value=<?php echo $value['type'] ?> name='eat_type' checked></input>
                                                                <label for=<?php echo $value['type'] ?>><?php echo $value['type'] ?></label>
                                                                <br>

                                                                <!--стоимость
                                                                <br>
                                                                Время!-->
                                                        <?php
                                                            }
                                                        }
                                                        ?>



                                                    <td valign="top" height="215" width="1" background="../images/tal.gif" style="background-repeat:repeat-y"></td>
                                                    <td valign="top" height="215" width="243">
                                                        <div style="margin-left:22px; margin-top:2px; "><img src="../images/hl.gif"></div>
                                                        <div style="margin-left:22px; margin-top:7px; "><img src="../images/1_w2.gif"></div>
                                                        <div style="margin-left:22px; margin-top:13px; ">

                                                            <?PHP
                                                            if ((isset($_SESSION['logged'])) && ($_SESSION['logged'] == 1)) { ?>
                                                                <input style="font-size: 10px" name="name" placeholder='Имя'></input>
                                                                <input style="font-size: 10px; margin-top: 5px;" type='tel' required autocomplete="tel" name="telephone" placeholder='Телефон'></input>
                                                                <input style="font-size: 10px; margin-top: 5px;" name="email" placeholder='Почта'></input>
                                                            <?PHP } ?>

                                                            <br><br><br><br>

                                                        </div>
                                                        <div style="margin-left:22px; margin-top:16px; "><img src="../images/hl.gif"></div>
                                                        <div style="margin-left:22px; margin-top:7px; ">
                                                            <img src="../images/1_w4.gif">

                                                        </div>
                                                        <div style="margin-left:22px; margin-top:9px; ">
                                                            <?PHP
                                                            if ((isset($_SESSION['logged'])) && ($_SESSION['logged'] == 1)) { ?>
                                                                <input class='back' style=" border:none;text-decoration: none;background-color: rgb(35, 241, 241);" type='submit' value="Далее" name='first'></input>
                                                            <?PHP } ?>

                                                        </div>
                                                        </div>





                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>

                            <td valign="top" height="338" width="49"></td>
                        </form>
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
<script>
    //const select = document.getElementById('taskOption');
    //select.addEventListener('change', () => {
    //const selectValue = select.value;
    //sessionStorage.setItem('taskOption', selectValue);
    //location.reload();

    //})
</script>


</html>