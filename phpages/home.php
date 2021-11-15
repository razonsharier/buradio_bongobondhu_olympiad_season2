<?php
@$go = $_REQUEST['go'];
if (empty($go)) {
 header('Location: home');
 exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>বঙ্গবন্ধু অলিম্পিয়াড ২০২১ (সিজন-২) - BURADiO</title>
    <?php
    require ('php/og-tags.php');
    ?>
    <link rel="shortcut icon" href="media/logo2.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div id="bodycontainer">
        <!-- body container to centralize elements-->
        <div id="header">
            <!-- header nav bar -->
            <div id="navmenu">
                <div class="left">
                    <a href="home"><img class="logo" src="media/logo.jpg"></a>
                </div>
                <div class="right">
                    <a class="regbutton">রেজিস্ট্রেশন করুন</a>
                    <a class="logbutton" href="login">লগইন করুন</a>
                </div>
            </div>
        </div>

        <div class="hidswbtn">
            <div class="subtwbtn" style="margin-top: 80px; margin-bottom: -50px;">
                <a class="regbutton">রেজিস্ট্রেশন করুন</a>
                <a class="logbutton" href="login">লগইন করুন</a>
            </div>
        </div>

        <div id="notice">
            <div class="noticetext">
                <p>২২শে আগস্ট ২০২১, রাত ৮টায় <a href="https://www.facebook.com/buradio.org/" target="_blank">BU RADiO</a> পেইজ থেকে লাইভ অনুষ্ঠানের মাধ্যমে ফলাফল ঘোষণা করা হবে।</p>
                </p>
            </div>
        </div>
        <div style="padding: 20px;margin: 0 auto;text-align: center; margin-top: 10px;">
            <a class="scorebutton" href="scoreboard">স্কোরবোর্ড দেখুন</a>
        </div>
        <div id="banner">
            <!-- banner elements -->
            <div id="bannerpic">
                <img src="media/banner.jpg" />
            </div>
        </div>
    </div>
</body>

</html>
