<?php
include('./FunctionPHP/Connection.php');
include('./FunctionPHP/checkSession.php');
$connection=ConnectionDB('localhost','root','','register');
$coursetraining='';
$queryctr='';
$rectr='';
if(isset($_POST['sup_view'])&&!empty($_POST['sup_view']))
{
    if(isset($_POST['sendtrcourse'])&&!empty($_POST['sendtrcourse']))
    {
        $queryctr="SELECT * FROM `reg` WHERE `reg_trainingcourse`='".$_POST['sendtrcourse']."'";
        $rectr=mysqli_query($connection,$queryctr);
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
<div class="container">
    <header class="btn-success text-center btn-lg" style="margin:5%;font-family: yekan">افراد ثبت نام شده در دوره : <?php echo $_POST['sendtrcourse']?></header>
    <table class="table table-responsive table-hover">
        <thead style="font-family: yekan">
        <th>شماره تلفن</th>
        <th>نام دوره</th>
        <th>دانشگاه</th>
        <th>رشته</th>
        <th>پست الکترونیکی</th>
        <th>شماره دانشجویی </th>
        <th>کدملی</th>
        <th>نام پدر</th>
        <th>نام خانوادگی </th>
        <th>نام</th>
        </thead>
        <tbody>
        <?php
        while($rowctr=mysqli_fetch_array($rectr))
        {
            echo"<tr>";
            echo"<td>".$rowctr['reg_mobile'];
            echo"</td>";
            echo"<td>".$rowctr['reg_trainingcourse'];
            echo"</td>";
            echo"<td>".$rowctr['reg_uni'];
            echo"</td>";
            echo"<td>".$rowctr['reg_course'];
            echo"</td>";
            echo"<td>".$rowctr['reg_mail'];
            echo"</td>";
            echo"<td>".$rowctr['reg_stucode'];
            echo"</td>";
            echo"<td>".$rowctr['reg_codemelli'];
            echo"</td>";
            echo"<td>".$rowctr['reg_father'];
            echo"</td>";
            echo"<td>".$rowctr['reg_family'];
            echo"</td>";
            echo"<td>".$rowctr['reg_name'];
            echo"</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>
<div class="row">
    <hr>
    <div class=" pager">
    <a style="font-family: yekan"  href="./manager.php" class="btn bg-danger">
        بازگشت به صفحه قبل
    </a>
    <a style="font-family: yekan" href="./index.html" class="btn bg-info">
بازگشت به صفحه اصلی
</a>
        <a style="font-family: yekan" class="btn bg-primary" href="javascript:window.print()"> چاپ صفحه</a>

    </div>
</div>
</body>
</html>
