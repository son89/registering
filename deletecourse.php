<?php
include('./FunctionPHP/Connection.php');
include('./FunctionPHP/checkSession.php');
$connection = ConnectionDB('localhost', 'root', '', 'register');
$state = 'hidden';
$state1 = 'hidden';
$hi='';
$rowSelect = '';
if (isset($_POST['sub_delete']) && !empty($_POST['sub_delete'])) {
    if (isset($_POST['sendtrcourse']) && !empty($_POST['sendtrcourse'])) {
        $state='active';
        $hi=$_POST['sendtrcourse'];
    }
}
if (isset($_POST['delete']) && !empty($_POST['delete'])) {
   /* $querySelelct = "SELECT * FROM `reg` WHERE 1`reg_trainingcourse`='" . $_POST['sendtrcourse'] . "'";
    $resultSelect = mysqli_query($connection, $querySelelct);
    $rowSelect = mysqli_fetch_array($resultSelect);
    if ($rowSelect) {
        $state = 'active';

    }
   */
/*else {*/
        $qDelete = 'DELETE FROM `trainingcourse` WHERE `tr_trcource`="' .$_POST['hid'] . '"';
        $qDelete1 = 'DELETE FROM `reg` WHERE `reg_trainingcourse`="' .$_POST['hid'] . '"';
        $resultQ = mysqli_query($connection, $qDelete);
        $resultQ1 = mysqli_query($connection, $qDelete1);
        $state1='active';
    $state='hidden';
    /*}*/
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
<div class="container">
    <div class="row <?php echo $state1 ?>">
        <header class="btn-success text-center btn-lg" style="margin:5%;direction: rtl;font-family: yekan">دوره مورد
            نظربا موفقیت حذف گردید.
        </header>
    </div>
    <div class="row  <?php echo $state ?>"
        <p class="form-control nav navbar-brand " dir="rtl" style="font-family: yekan">هشدار:برای این دوره افرادی ثبت نام نموده اند با حذف دوره تمامی اطلاعات افراد ثبت نام کننده پاک خواهد شد
            درصورت تمایل گزینه تاییدراانتخاب نمایید.</p>
        <form class="form-group" method="post" action="deletecourse.php">
            <input class="btn btn-lg btn-danger" type="submit" name="delete" value="تایید">
            <input class="btn btn-lg btn-danger" type="hidden" name="hid"  value="<?php echo $hi; ?>">
        </form>
    </div>
</div>

<div class="row">
    <hr>
    <div class=" pager">
        <a style="font-family: yekan" href="./manager.php" class="btn bg-danger">
            بازگشت به صفحه قبل
        </a>
        <a style="font-family:yekan" href="./index.html" class="btn bg-info">
            بازگشت به صفحه اصلی
        </a>
        <a style="font-family: yekan" class="btn bg-primary" href="javascript:window.print()"> چاپ صفحه</a>

    </div>
</div>
</body>
</html>
