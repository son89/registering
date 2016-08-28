<?php
include('./FunctionPHP/Connection.php');
include('./FunctionPHP/checkSession.php');
$connection=ConnectionDB('localhost','root','','register');
$coursname=$coursehours=$description='';
$situation1=0;
$tip='hidden';
if(isset($_POST['addcourse'])&&!empty($_POST['addcourse'])) {
    if (isset($_POST['coursename']) && !empty($_POST['coursename'])) {
        $coursname = $_POST['coursename'];
        $situation1++;
    }
    if (isset($_POST['coursehours']) && !empty($_POST['coursehours'])) {
        $coursehours = $_POST['coursehours'];
        $situation1++;
    }
    if (isset($_POST['description']) && !empty($_POST['description'])) {
        $description = $_POST['description'];
        $situation1++;
    }
    if ($situation1 == 3)
    {
        $query="INSERT INTO `trainingcourse`(`tr_trcource`, `tr_hours`, `tr_description`) VALUES ('".$coursname."','".$coursehours."','".$description."')";
        $query1="INSERT INTO `courseindex`(`ci_title`, `ci_hours`) VALUES ('".$coursname."','".$coursehours."')";
        $result=mysqli_query($connection,$query);
        $result1=mysqli_query($connection,$query1);
       $tip='active';
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
    <header class="btn-success text-center btn-lg" style="margin:5%;font-family: yekan">اطلاعات شما با موفقیت ثبت گردید.</header>
    <table class="table table-responsive table-hover ">
        <thead style="font-family: yekan">
        <th>توضیح</th>
        <th>تعدادساعات</th>
        <th>نام دوره </th>

        </thead>
        <tbody>
        <?php
        echo "<tr>";
        echo "<td>" .$description ;
        echo "</td>";
        echo "<td>" . $coursehours;
        echo "</td>";
        echo "<td>" . $coursname;
        echo "</td>";
        echo "</tr>";
        ?>
        </tbody>
    </table>
</div>
<div class="row">
    <hr>
    <div class=" pager">
        <a href="./manager.php" class="btn bg-danger" style="font-family: yekan">
            بازگشت به صفحه قبل
        </a>
        <a href="./index.html" class="btn bg-info" style="font-family: yekan">
            بازگشت به صفحه اصلی
        </a>
        <a class="btn bg-primary" style="font-family: yekan" href="javascript:window.print()"> چاپ صفحه</a>

    </div>
</div>
</body>
</html>

