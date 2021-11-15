
<?php
require 'php/db.php';

$sqltm    = "SELECT * FROM reg t1 INNER JOIN rank t2 ON t1.userid = t2.userid";
$resulttm = mysqli_query($db, $sqltm);
$counttm  = mysqli_num_rows($resulttm);
while ($rowtm = mysqli_fetch_array($resulttm, MYSQLI_ASSOC)) {
 if ($rowtm['userid'] == $rowtm['userid']) {
  $uid        = $rowtm['userid'];
  $marks1     = $rowtm["marks1"];
  $marks2     = $rowtm["marks2"];
  $marks3     = $rowtm["marks3"];
  $totalmarks = ($marks1 + $marks2 + $marks3);
  $tmqury     = "UPDATE rank SET totalmarks = '$totalmarks' WHERE userid = $uid";
  mysqli_query($db, $tmqury);
 }
}

$sqlcksw    = "SELECT * FROM settings WHERE sw_type = 'result_publish'";
$resultcksw = mysqli_query($db, $sqlcksw);
$rowcksw    = mysqli_fetch_array($resultcksw, MYSQLI_ASSOC);
if ("off" == $rowcksw["switch"]) {
    $sw_control_on = "display: none";
   } else {
    $sw_control_off = "display: none";
   }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>বঙ্গবন্ধু অলিম্পিয়াড ২০২১ (সিজন-২) - BURADiO</title>
    <?php
    require ('php/og-tags.php');
    ?>
    <link rel="shortcut icon" href="media/logo2.png">
    <link rel="stylesheet" href="css/style.css">
    <style>
        @media screen and (max-width: 425px) {
            table {
                font-size: 14px;
            }
        }
    </style>
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
                    <a class="quizbutton" href="home">হোম পেইজ</a>
                </div>
            </div>
        </div>

        <div id="containbody">
            <div id="scorebody">
                <p style="<?php echo "$sw_control_off" ?>; margin-top: 200px;">২২শে আগস্ট ২০২১, রাত ৮টায় <a href="https://www.facebook.com/buradio.org/" target="_blank">BU RADiO</a> পেইজ থেকে লাইভ অনুষ্ঠানের মাধ্যমে ফলাফল ঘোষণা করা হবে।</p>

            </div>
        </div>

    </div>

</body>

</html>