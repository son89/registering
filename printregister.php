<?php
include('./FunctionPHP/Connection.php');
include('./FunctionPHP/checkSession.php');
include('./FunctionPHP/function.php');
$connection = ConnectionDB('localhost', 'root', '1', 'register');
$name = $family = $mobile = $codemelli = $university = '';
$nameI=$familyI=$trainingcourseI='';
$father = $numberuni = $email = $trainingcourse = $address = $course = '';
$situation = true;
$tip = 'hidden';
$errorInsert='hidden';
$errorInsert1='hidden';
if (isset($_POST['sub_reg']) && !empty($_POST['sub_reg'])) {
    if (isset($_POST['name']) && !empty($_POST['name'])){
        $name =test_input($_POST['name']);

    } else {
        $situation = false;
    }
    if (isset($_POST['family']) && !empty($_POST['family'])) {
        $family = test_input( $_POST['family']);
    } else {
        $situation = false;
    }
    if (isset($_POST['father']) && !empty($_POST['father'])) {
        $father =test_input(  $_POST['father']);
    }

    if (isset($_POST['codemelli']) && !empty($_POST['codemelli'])) {
        $codemelli =test_input(  $_POST['codemelli']);
    } else {
        $situation = false;
    }
    if (isset($_POST['numberuni']) && !empty($_POST['numberuni'])) {
        $numberuni =test_input(  $_POST['numberuni']);
    }
    else
    {
        $situation=false;
    }
    if (isset($_POST['mobile']) && !empty($_POST['mobile'])) {
        $mobile = test_input( $_POST['mobile']);
    } else {
        $situation = false;
    }
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = test_input( $_POST['email']);
    }
    if (isset($_POST['course']) && !empty($_POST['course'])) {
        $course = test_input( $_POST['course']);
    }
    else
    {
        $situation=false;
    }
    if (isset($_POST['uni']) && !empty($_POST['uni'])) {
        $university = test_input( $_POST['uni']);
    } else {
        $situation = false;
    }
    if (isset($_POST['address']) && !empty($_POST['address'])) {
        $address =test_input(  $_POST['address']);
    }
    if (isset($_POST['sendtrcourse']) && !empty($_POST['sendtrcourse'])) {
        $trainingcourse =test_input(  $_POST['sendtrcourse']);

    } else {
        $situation = false;
    }

    if ($situation == true) {
        $querySearch = "SELECT * FROM `reg` WHERE (`reg_name`='" . $name . "' and `reg_family`= '" . $family . "' and `reg_codemelli`='" . $codemelli . "' and `reg_trainingcourse`='" . $trainingcourse . "') ||(`reg_name`='" . $name . "' and `reg_family`='" . $family . "' and `reg_trainingcourse`='" . $trainingcourse . "')||(`reg_codemelli`='" . $codemelli . "' and `reg_trainingcourse`='" . $trainingcourse . "') ORDER BY `reg_id` ASC";
        $resultSearch = mysqli_query($connection, $querySearch);
        if ($rowInsert=mysqli_fetch_row($resultSearch)) {
          $errorInsert1='active';
            $nameI=$rowInsert[2];
            $familyI=$rowInsert[3];
            $trainingcourseI=$rowInsert[1];
        } else
        {
            $query1="SELECT `tr_id` FROM `trainingcourse` WHERE `tr_trcource`='".$trainingcourse."'";
            $result1= mysqli_query($connection, $query1);
            $row1=mysqli_fetch_row($result1);
        // $query="INSERT INTO `reg`(`reg_name`, `reg_family`, `reg_codemelli`, `reg_mobile`, `reg_uni`,`reg_class`) VALUES ('".$name."','".$family."','".$code."','".$mobile."','".$university."','".$class."')";
        $query = "INSERT INTO `reg`(`reg_trainingcourse`, `reg_name`, `reg_family`, `reg_codemelli`, `reg_mobile`, `reg_uni`, `reg_father`, `reg_mail`, `reg_stucode`, `reg_course`,`tr_id`) VALUES ('" . $trainingcourse . "','" . $name . "','" . $family . "','" . $codemelli . "','" . $mobile . "','" . $university . "','" . $father . "','" . $email . "','" . $numberuni . "','" . $course . "','".$row1[0]."')";
        $result = mysqli_query($connection, $query);
        if ($result == true) {
            $tip = 'active';
        }
    }
    }
    else if ($situation == false) {
                $errorInsert='active';

    }
}
?>

<!doctype html>
<html>
<head>
    <style>
        @media print {
            .container {
                width: auto;
            }
        }
    </style>
    <meta charset="UTF-8">
    <meta name="author" content="akbar bitarf">
    <meta name="description" content="this is a register to class asterisk ">
    <title>گروه ویپ دانشگاه صنعتی سجاد </title>
    <link rel="stylesheet" href="./View/font/font.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./View/styleRequestform.css">
    <script src="./bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container <?php echo $tip; ?>">
    <header class="btn-warning text-center btn-lg" dir="rtl" style="margin:5%;font-family: yekan">
        <p dir="rtl" style="font-family: yekan bold">ثبت نام شما با موفقیت انجام پذیرفت</p>
        <p dir="rtl" style="font-family: yekan bold">شروع دوره :23 مردادماه روزهای زوج </p>
		<p dir="rtl" style="font-family: yekan bold">ساعت برگزاری دوره از طریق تلگرام وپست الکترونیکی به اطلاعتان خواهد رسید.</p>
        <p dir="rtl" style="font-family: yekan bold" >برای تکمل ثبت نام حضورتان در جلسه اول الزامی میباشد.</p>
    </header>
    <table class="table table-responsive table-hover ">
        <thead style="font-family: yekan">
        <th>شماره تلفن</th>
        <th>نام دوره</th>
        <th>دانشگاه</th>
        <th>رشته</th>
        <th>شماره دانشجویی</th>
        <th>شماره موبایل</th>
        <th>کدملی</th>
        <th>نام پدر</th>
        <th>نام خانوادگی</th>
        <th>نام</th>
        </thead>
        <tbody>
        <?php
        echo "<tr>";
        echo "<td>" . $mobile;
        echo "</td>";
        echo "<td>" . $trainingcourse;
        echo "</td>";
        echo "<td>" . $university;
        echo "</td>";
        echo "<td>" . $course;
        echo "</td>";
        echo "<td>" . $numberuni;
        echo "</td>";
        echo "<td>" . $mobile;
        echo "</td>";
        echo "<td>" . $codemelli;
        echo "</td>";
        echo "<td>" . $father;
        echo "</td>";
        echo "<td>" . $family;
        echo "</td>";
        echo "<td>" . $name;
        echo "</td>";
        echo "</tr>";
        ?>
        </tbody>
    </table>
</div>
<header class="btn-warning text-center btn-lg <?php echo $errorInsert1 ?>" dir="rtl" style="margin:5%;font-family: yekan">
    <span>کاربرگرامی</span>&nbsp;&nbsp;<span><?php echo $nameI.' '.$familyI ?></span>&nbsp;&nbsp;<span>قبلا در دوره </span>&nbsp;&nbsp;<span><?php echo $trainingcourseI ?></span>&nbsp;&nbsp;<span>ثبت نام نموده اید</span>
</header>
<div class="row <?php echo $errorInsert ?>">
    <header class="btn-warning text-center btn-lg" dir="rtl" style="margin:5%;font-family: yekan">
        متاسفانه اطلاعات درج شده صحیح نمیباشد به صفحه قبل بازگشته ودوباره اطلاعات را درج نمایید.
    </header>
</div>
<div class="row">
    <hr>
    <div class=" pager">
        <a style="font-family: yekan" href="./Register.php" class="btn bg-danger">
            بازگشت به صفحه قبل
        </a>
        <a style="font-family: yekan" href="./index.html" class="btn bg-info">
            بازگشت به صفحه اصلی
        </a>
        <a class="btn bg-primary" style="font-family: yekan" href="javascript:window.print()"> چاپ صفحه</a>

    </div>
</div>
</body>
</html>
