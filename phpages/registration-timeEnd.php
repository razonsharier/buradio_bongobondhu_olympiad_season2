
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php

header('Cache-control: no-cache, must-revalidate, max-age=0');

if (empty($_SESSION['error_reg1'])) {
 $_SESSION["error_reg1"] = "display: none";
}

if (isset($_POST['registration'])) {

 require 'php/db.php';
 $pname   = htmlspecialchars($_POST['name']);
 $pmobile = htmlspecialchars($_POST['mobile']);
 $pemail  = htmlspecialchars($_POST['email']);
 $ppuni  = htmlspecialchars($_POST['university']);
 $pproll  = htmlspecialchars($_POST['roll']);
 $ppass   = htmlspecialchars($_POST['password']);

 $name     = mysqli_real_escape_string($db, $pname);
 $mobile   = mysqli_real_escape_string($db, $pmobile);
 $email    = mysqli_real_escape_string($db, $pemail);
 $uni     = mysqli_real_escape_string($db, $ppuni);
 $roll     = mysqli_real_escape_string($db, $pproll);
 $password = mysqli_real_escape_string($db, $ppass);
 $password = md5($password);
 $sql      = "SELECT * FROM reg WHERE mobile = '$mobile' or email = '$email'";
 $result   = mysqli_query($db, $sql) or die(mysqli_error($db));
 $row      = mysqli_fetch_array($result);


    $ip = getenv('HTTP_CLIENT_IP') ?: getenv('HTTP_X_FORWARDED_FOR') ?: getenv('HTTP_X_FORWARDED') ?: getenv('HTTP_FORWARDED_FOR') ?: getenv('HTTP_FORWARDED') ?: getenv('REMOTE_ADDR');


    if (!$_POST["name"]) {
  $_SESSION['error_reg1'] = "আপনার পূর্ণ নামটি দিন!";
 } elseif (!$_POST["mobile"]) {
  $_SESSION['error_reg1'] = "আপনার মোবাইল নাম্বারটি দিন!";
 } elseif (!$_POST["email"]) {
  $_SESSION['error_reg1'] = "আপনার ইমেইলটি দিন!";
 } elseif (!$_POST["university"]) {
  $_SESSION['error_reg1'] = "আপনার বিশ্ববিদ্যালয় নির্বাচন করুন!";
 } elseif (!$_POST["roll"]) {
  $_SESSION['error_reg1'] = "আপনার রোল নাম্বারটি দিন!";
 } elseif (!$_POST["password"]) {
  $_SESSION['error_reg1'] = "আপনার পাসওয়ার্ডটি দিন!";
 } elseif (!$_POST["password2"]) {
  $_SESSION['error_reg1'] = "আপনার পাসওয়ার্ডটি পুনরায় দিন!";
 } elseif ($_POST["password"] != $_POST["password2"]) {
  $_SESSION['error_reg1'] = "পাসওয়ার্ডটি মেলেনি!";
 } elseif ($row['mobile'] == $_POST["mobile"]) {
  $_SESSION['error_reg1'] = "এই মোবাইল নাম্বারটি পূর্বেই ব্যবহৃত হয়েছে!";
 } elseif ($row['email'] == $_POST["email"]) {
  $_SESSION['error_reg1'] = "এই ইমেইলটি পূর্বেই ব্যবহৃত হয়েছে!!";
 } elseif ($row['mobile'] != $_POST["mobile"] && $row['email'] != $_POST["email"]) {

  $uid    = rand(1000, 1000000);
  $sql    = "SELECT userid FROM reg WHERE userid = '$uid'";
  $result = mysqli_query($db, $sql);
  $row    = mysqli_fetch_array($result, MYSQLI_ASSOC);

  if ($uid == $row['userid']) {
   $again = rand(1000, 1000000);
   $uid   = $again;

   if ($uid == $row['userid']) {
    header("registration");
   }
  }

  $sql2  = "INSERT INTO reg (userid, ip, name, mobile, email, university, roll, pass, step1, marks1, selectionround2, topic, status, marks2, selectionround3, time, link, marks3, questart, quend, questart2, quend2) VALUES ('$uid','$ip', '$name', '$mobile', '$email', '$uni', '$roll', '$password', '', '0', '', '', '', '0', '', '', '', '0', '', '', '', '')";
  $sql22 = "INSERT INTO rank (userid, totalmarks) VALUES ('$uid', '0')";

  if (mysqli_query($db, $sql2)) {
   mysqli_query($db, $sql22);
   $_SESSION['regdonepass'] = "রেজিস্ট্রেশন সম্পূর্ণ হয়েছে!";
   echo "<script type='text/javascript'> document.location = 'login'; </script>";
   exit;
  } else {
   $_SESSION['error_reg1'] = "ERROR!";
  }
 }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>বঙ্গবন্ধু অলিম্পিয়াড ২০২১ (সিজন-২) - BURADiO</title>
    <link rel="shortcut icon" href="media/logo2.png">
    <link rel="stylesheet" href="css/style.css">
    <style>
        @media screen and (max-width: 425px) {

            .regbutton {
                padding: 10px 15px;
                margin-right: 10px;
            }

            .logbutton {
                padding: 10px 15px;
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
                    <a class="logbutton" href="login">লগইন করুন</a>
                </div>
            </div>
        </div>
        <div id="notice">
            <div class="noticetext">
                <p>বঙ্গবন্ধু অলিম্পিয়াড ২০২১ (সিজন-২) তে অংশগ্রহণ করতে রেজিস্ট্রেশন করুন।</p>
            </div>
        </div>
        <div id="loginfield">
            <div id="formcontainer">
                <h3 style="font-size: 28px;color: #178e17;">রেজিস্ট্রেশন</h3>
                <div style="<?php echo $_SESSION['error_reg1']; ?>" class="errormsg">
                    <p><?php echo $_SESSION['error_reg1']; ?></p>
                </div>
                <form id="formwidth" action="" method="post">
                    <label>পূর্ণ নামঃ</label>
                    <input name="name" type="text" autocomplete="off">
                    <label>মোবাইল নাম্বারঃ (১১ সংখ্যার)</label>
                    <input name="mobile" type="number" autocomplete="off" maxlength="11">
                    <label>ইমেইলঃ</label>
                    <input name="email" type="email" autocomplete="off">
                    <label>আপনার বিশ্ববিদ্যালয় নির্বাচন করুনঃ</label>
                    <select name="university" required style="width: 100%; border-radius: 2px; background-color: #FFFFFF;border: 1px solid rgb(112, 112, 112);">
                        <option value='' hidden>নির্বাচন করুন</option>
                        <option value="1">University of Barishal</option>
                        <option value="2">University of Dhaka</option>
                        <option value="3">University of Rajshahi</option>
                        <option value="4">Bangladesh Agricultural University</option>
                        <option value="5">Bangladesh University of Engineering & Technology</option>
                        <option value="6">University of Chittagong</option>
                        <option value="7">Jahangirnagar University</option>
                        <option value="8">Islamic University, Bangladesh</option>
                        <option value="9">Shahjalal University of Science & Technology</option>
                        <option value="10">Khulna University</option>
                        <option value="11">National University</option>
                        <option value="12">Bangladesh Open University</option>
                        <option value="13">Bangabandhu Sheikh Mujib Medical University</option>
                        <option value="14">Bangabandhu Sheikh Mujibur Rahman Agricultural University</option>
                        <option value="15">Hajee Mohammad Danesh Science & Technology University</option>
                        <option value="16">Mawlana Bhashani Science & Technology University</option>
                        <option value="17">Patuakhali Science And Technology University</option>
                        <option value="18">Sher-e-Bangla Agricultural University</option>
                        <option value="19">Chittagong University of Engineering & Technology</option>
                        <option value="20">Rajshahi University of Engineering & Technology</option>
                        <option value="21">Khulna University of Engineering and Technology</option>
                        <option value="22">Dhaka University of Engineering & Technology</option>
                        <option value="23">Noakhali Science & Technology University</option>
                        <option value="24">Jagannath University</option>
                        <option value="25">Comilla University</option>
                        <option value="26">Jatiya Kabi Kazi Nazrul Islam University</option>
                        <option value="27">Chittagong Veterinary and Animal Sciences University</option>
                        <option value="28">Sylhet Agricultural University</option>
                        <option value="29">Jessore University of Science & Technology</option>
                        <option value="30">Pabna University of Science and Technology</option>
                        <option value="31">Begum Rokeya University, Rangpur</option>
                        <option value="32">Bangladesh University of Professionals</option>
                        <option value="33">Bangabandhu Sheikh Mujibur Rahman Science & Technology University</option>
                        <option value="34">Bangladesh University of Textiles</option>
                        <option value="35">Rangamati Science and Technology University</option>
                        <option value="36">Bangabandhu Sheikh Mujibur Rahman Maritime University, Bangladesh</option>
                        <option value="37">Islamic Arabic University</option>
                        <option value="38">Chittagong Medical University</option>
                        <option value="39">Rajshahi Medical University</option>
                        <option value="40">Rabindra University, Bangladesh</option>
                        <option value="41">Bangabandhu Sheikh Mujibur Rahman Digital University, Bangladesh</option>
                        <option value="42">Sheikh Hasina University</option>
                        <option value="43">Khulna Agricultural University</option>
                        <option value="44">Khulna Agricultural University</option>
                        <option value="45">Bangamata Sheikh Fojilatunnesa Mujib Science and Technology University</option>
                        <option value="46">Sylhet Medical University</option>
                        <option value="47">Bangabandhu Sheikh Mujibur Rahman Aviation And Aerospace University (BSMRAAU)</option>
                        <option value="48">Chandpur Science and Technology University</option>
                        <option value="49">Bangabandhu Sheikh Mujibur Rahman Univerisity, Kishoreganj</option>
                        <option value="50">Hobiganj Agricultural University</option>
                    </select>
                    <label>বিশ্ববিদ্যালয়ে আপনার ক্লাস রোলঃ</label>
                    <input name="roll" type="text" autocomplete="off">
                    <label>পাসওয়ার্ডঃ</label>
                    <input name="password" type="password" autocomplete="off">
                    <label>পুনরায় পাসওয়ার্ডটি দিনঃ</label>
                    <input name="password2" type="password" autocomplete="off">
                    <button class="quizbutton" name="registration" type="submit">সাবমিট করুন</button>
                </form>
            </div>
        </div>

    </div>
    <?php
unset($_SESSION["error_reg1"]);
?>
</body>

</html>