<?php

@$go = $_REQUEST['go'];
if ("" == $go) {
 include_once 'phpages/home.php';
}

session_start();

?>

<?php
if ("home" == $go) {
 include_once 'phpages/home.php';
} elseif ("registration" == $go) {
 include_once 'phpages/registration.php';
} elseif ("login" == $go) {
 include_once 'phpages/login.php';
} elseif ("scoreboard" == $go) {
 include_once 'phpages/scoreboard.php';
} elseif ("profile" == $go) {
 include_once 'phpages/profile.php';
} elseif ("profile-test" == $go) {
 include_once 'phpages/profile-test.php';
} elseif ("forgetpass" == $go) {
 include_once 'phpages/forgetpass.php';
} elseif ("logout" == $go) {
 include_once 'phpages/logout.php';
} elseif ("essay" == $go) {
 include_once 'phpages/essay.php';
} elseif ("dismis" == $go) {
 include_once 'phpages/dismis.php';
} elseif ("viva" == $go) {
 include_once 'phpages/viva.php';
} elseif ("score" == $go) {
 include_once 'phpages/score.php';
} elseif ("quiz" == $go) {
 include_once 'phpages/quiz.php';
} elseif ("admin131" == $go) {
 include_once 'phpages/quiz-admin.php';
} elseif ("final-round" == $go) {
    include_once 'phpages/final-round.php';
} elseif ("final-quiz" == $go) {
    include_once 'phpages/final-quiz.php';
} else {
 header('Location: phpages/home.php');
 exit;
}

?>

<div style="margin: 0 auto; max-width: 800px; text-align:center; font-family:Arial, Helvetica, sans-serif; font-size: 14px; color: #333;">
    <p style="padding-top: 10px;"><strong>Developed & Maintained By: </strong><a>Web Developer Team – BU RADiO</a></p>
</div>