<?php
include('./FunctionPHP/Connection.php');
include('./FunctionPHP/checkSession.php');
$connection=ConnectionDB('localhost','root','','register');
$coursname=$coursehours=$description='';
$tip='hidden';
$result='';
if(isset($_POST['viewcourse'])&&!empty($_POST['viewcourse'])) {
        $query="SELECT * FROM `trainingcourse`";
        $result=mysqli_query($connection,$query);

        $tip='active';

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
    <header class="btn-success text-center btn-lg" style="margin:5%;font-family: yekan">مشاهده تمامی دوره های اموزشی</header>
    <table class="table table-responsive table-hover ">
        <thead style="font-family: yekan">
        <th>توضیح</th>
        <th>تعدادساعات</th>
        <th>نام دوره </th>

        </thead>
        <tbody>
        <?php
        while($row=mysqli_fetch_array($result))
        {
        echo "<tr>";
        echo "<td>" .$row['tr_description'] ;
        echo "</td>";
        echo "<td>" . $row['tr_hours'];
        echo "</td>";
        echo "<td>" . $row['tr_trcource'];
        echo "</td>";
        echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>
<div class="row">
    <hr>
    <div class=" pager">
        <a href="./manager.php" style="font-family: yekan" class="btn bg-danger">
            بازگشت به صفحه قبل
        </a>
        <a href="./index.html" style="font-family: yekan" class="btn bg-info">
            بازگشت به صفحه اصلی
        </a>
        <a class="btn bg-primary" style="font-family: yekan" href="javascript:window.print()"> چاپ صفحه</a>

    </div>
</div>
</body>
</html>

