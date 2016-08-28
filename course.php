<?php
include('./FunctionPHP/Connection.php');
include('./FunctionPHP/checkSession.php');
$connection = ConnectionDB('localhost', 'root', '1', 'register');



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="this is project Register Course">
    <meta name="author" content="AkbarBitaraf">
    <title>شرکت ارتباط گستر هوشمند سجاد</title>
    <link rel="stylesheet" href="./View/font/font.css">
    <link rel="icon" href="./picture/iv.jpg">
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./View/carousel.css" rel="stylesheet">
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="./JQueryLibrary/jquery-2.1.1.js"></script>
    <script src="./bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    <script src="./JQueryLibrary/jquery-2.1.1.min.js"></script>
</head>
<body>
<div class="container">
    <br><br>
    <div class=""></div>
    <?php
    $results='';
    $query="SELECT * FROM `courseindex` ";
    $results=mysqli_query($connection,$query);
    while($row1=mysqli_fetch_array($results))
    {
    echo ' <div class="panel panel-group">';
    echo '<div class="panel-info text-center ">';
    echo '<div class="panel-heading text-right" style=" padding: 25px;font-size: 20px;font-family:fontans ">';
    echo '<a  data-toggle="collapse" href="#';
        echo $row1['ci_id'];
        echo '" style="text-decoration: none;font-family: yekan">';
        echo $row1['ci_title'];
    echo '</a>';
    echo '</div>';
    echo '<div dir="rtl" id="';
        echo $row1['ci_id'];
        echo '" class="panel-body text-right panel-collapse collapse" style=" padding: 25px;font-size: 20px;font-family:yekan " >';
        echo '<p>';
        echo $row1['ci_c1'];
        echo '</p>';
        echo '<p>';
        echo $row1['ci_c2'];
        echo '</p>';
        echo '<p>';
        echo $row1['ci_c3'];
        echo '</p>';
        echo '<p>';
        echo $row1['ci_c4'];
        echo '</p>';
        echo '<p>';
        echo $row1['ci_c5'];
        echo '</p>';
        echo '<p>';
        echo $row1['ci_c6'];
        echo '</p>';
        echo '<p>';
        echo $row1['ci_c7'];
        echo '</p>';
        echo '<p>';
        echo $row1['ci_c8'];
        echo '</p>';
        echo '<p>';
        echo $row1['ci_c9'];
        echo '</p>';
        echo '<p>';
        echo $row1['ci_c10'];
        echo '</p>';
        echo '<p>';
        echo $row1['ci_c11'];
        echo '</p>';
        echo '<p>';
        echo $row1['ci_c12'];
        echo '</p>';
        echo '<p>';
        echo $row1['ci_c13'];
        echo '</p>';
        echo '<span dir="rtl" style="font-family: yekan">نام دوره :</span><p class="text-center bg-info ">';
        echo $row1['ci_title'];
        echo '</p>';
        echo '<span dir="rtl" style="font-family: yekan">تعداد ساعات برگزاری دوره :</span><p class="text-center bg-info ">';
        echo $row1['ci_hours'];
        echo '</p>';
        echo '<span dir="rtl" style="font-family: yekan">زمان برگزاری:</span><p class="text-center bg-info ">';
        echo $row1['ci_date'];
        echo '</p>';
        echo '<span dir="rtl" style="font-family: yekan">مدرس :</span><p class="text-center bg-info ">';
        echo $row1['ci_teacher'];
        echo '</p>';
        echo '<span dir="rtl" style="font-family: yekan">مکان :</span><p class="text-center bg-info ">';
        echo $row1['ci_address'];
        echo '</p>';
        echo '</div>';

    echo '</div>';
    echo '</div>';
    }
    ?>
   <!--<div class="panel panel-group">
        <div class="panel-info text-center ">
            <div class="panel-heading text-right" style=" padding: 25px;font-size: 20px;font-family:fontans ">
                <a  data-toggle="collapse" href="#elastixdemo" style="text-decoration: none;font-family: yekan">
                    آموزش کاربردی الستیکس
                </a>
            </div>
            <div dir="rtl" id="elastixdemo" class="panel-body text-right panel-collapse collapse" style=" padding: 25px;font-size: 20px;font-family:yekan " >
                <p>سرفصل دوره اموزشی الستیکس :</p>
                <p>- نصب حرفه ای الستیکس ، تنظیم شبکه ودسترسی به محیط وب</p>
                <p>- نصب کارت تلفنی برروی سرور</p>
                <p>- تنظیمات سرور ، تعریف کاربر وگروه کاری</p>
                <p>-  آشنایی با منوی سیستم وزیرمنوهای آن</p>
                <p>- آموزش منوهای موجود در برنامه freepbx (تمامی امکانات مخابراتی سیستم)</p>
                <p>- تعریف داخلی ، صندوق صوتی</p>
                <p>- تعریف داخلی برروی IPPhone</p>
                <p>- نحوه قراردان فایل های صوتی در سروریا ضبط آنها ازطریق گوشی</p>
                <p>- آشنایی با انواع ترانک ونحوه تعریف آن</p>
                <p>- آشنايي با نحوه ارتباط و کار با کارت شهری و همچنين  Gatewayهای شهری</p>
                <p>- تعريف ترانک بين  2الستيكس و ارتباط بين آن دو در سناريو های گوناگون</p>
                <p>- تعريف ترانک و ارتباط بين الستيكس و گيت وی Dinsta</p>
                <p>- آشنايي با مسير تماس ورودی  Inbound Routeو نحوه تعريف آن</p>
                <p>- آشنايي با مسير تماس خروجي  Outbound Routeو نحوه تعريف آن</p>
                <p>- ارتباط  2سرور الستيكس با يكديگر</p>
                <p>- - ارتباط با شهری از طريق کارت تلفني</p>
                <p>- تعریف Announcement</p>
                <p>- تعريف منوی منشي IV</p>
                <p>- تعريف صف و آموزش ويژگيهای پيشرفته آن</p>
                <p>- تعريف گروه پاسخگو RingGroup</p>
                <p>- تعريف مرا دنبال کن FollowMe</p>
                <p>- تعريف زمان پاسخگويي (چند منوی منشي برای ساعات و روزهای گوناگون)</p>
                <p>- تعريف IVR ،منوی منشي ديجيتال</p>
                <p>- تعريف صف (QUEUE) وتنظیمات پیشرفته ان</p>
                <p>- تعريف پارکينگ تماس</p>
                <p>- تعریف تماس برگشتی Callback</p>
                <p>- تعريف دسترسي از بيرون به ويژگيهای سيستم DISA</p>
                <p>- آشنايي با نحوه گزارشگيری</p>
                <p>- نحوه ارسال و دريافت فكس</p>
                <p>- آشنايي با ماژول مرکز تماس CallCenter</p>
                <p>- آشنايي با ماژول   Openfire برای امکان گفتگوی متنی (چت) کاربران</p>
                <p>- امنيت در الستيكس</p>
                <p class="text-center bg-info ">نام دوره : آموزش کاربردی الستیکس (بصورت فشرده)</p>
                <p class="text-center bg-info">تعداد ساعات برگزاری دوره : 20</p>
                <p class="text-center bg-info">شروع دوره 12 مرداد دانشگاه صنعتی سجاد</p>
                <p class="text-center bg-info">مدرس: مهندس بنی اسدی</p>
                <p class="text-center bg-info">مکان :جلال ال احمد 62- دانشگاه صنعتی سجاد</p>

            </div>
        </div>
        <br>

    </div>-->
    <div class="row">
        <div class="pager">
            <a class="btn btn-lg bg-info" href="./index.html">
                بازگشت به صفحه اصلی
            </a>
            <a href="./Register.php" class="btn btn-lg bg-success">ثبت نام </a>
        </div>
    </div>

</body>

</html>
