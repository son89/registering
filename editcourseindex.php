<?php
include('./FunctionPHP/Connection.php');
include('./FunctionPHP/checkSession.php');
$connection = ConnectionDB('localhost', 'root', '1', 'register');
$coursetraining = '';
$queryctr = '';
$rectr = '';
if (isset($_POST['sup1']) && !empty($_POST['sup1'])) {

    if (isset($_POST['sendtrcourse']) && !empty($_POST['sendtrcourse'])) {
        $queryctr = "SELECT * FROM `courseindex` WHERE `ci_title`='" . $_POST['sendtrcourse'] . "'";
        $rectr = mysqli_query($connection, $queryctr);
    }
}
$description = '';
$hour = $course = '';
$count = 0;
$hidden='hidden';
$hidden1='active';
if (isset($_POST['editcoursein']) && !empty($_POST['editcoursein'])) {
 echo $_POST['c30'];
    $querycedit='UPDATE `courseindex` SET `ci_title`="'. $_POST['title'].'",`ci_price`="'. $_POST['price'].'",`ci_date`="'. $_POST['date'].'",`ci_address`="'. $_POST['address'].'",`ci_hours`="'. $_POST['hours'].'",`ci_c1`="'. $_POST['c1'].'",`ci_c2`="'. $_POST['c2'].'",`ci_c3`="'. $_POST['c3'].'",`ci_c4`="'. $_POST['c4'].'",`ci_c5`="'. $_POST['c5'].'",`ci_c6`="'. $_POST['c6'].'",`ci_c7`="'. $_POST['c7'].'",`ci_c8`="'. $_POST['c8'].'",`ci_c9`="'. $_POST['c9'].'",`ci_c10`="'. $_POST['c10'].'",`ci_c11`="'. $_POST['c11'].'",`ci_c12`="'. $_POST['c12'].'",`ci_c13`="'. $_POST['c13'].'",`c14`="'. $_POST['c14'].'",`c15`="'. $_POST['c15'].'",`c16`="'. $_POST['c16'].'",`c17`="'. $_POST['c17'].'",`c18`="'. $_POST['c18'].'",`c19`="'. $_POST['c19'].'",`c20`="'. $_POST['c20'].'",`c21`="'. $_POST['c21'].'",`c22`="'. $_POST['c22'].'",`c23`="'. $_POST['c23'].'",`c24`="'. $_POST['c24'].'",`c25`="'. $_POST['c25'].'",`c26`="'. $_POST['c26'].'",
`c27`="'. $_POST['c27'].'",`c28`="'. $_POST['c28'].'",`c29`="'. $_POST['c29'].'",`c30`="'. $_POST['c30'].'" WHERE `ci_id`="'. $_POST['id'].'"';
    // $querycedit1='UPDATE `reg` SET `reg_trainingcourse`="'.$course.'" WHERE `tr_id`="'. $_POST['id'].'"';
    $result1=mysqli_query($connection,$querycedit);
    if($result1)
    {
        $hidden='active';
        $hidden1='hidden';
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
    <header class="btn-success text-center btn-lg <?php echo $hidden1 ?>" style="margin:5%">ویرایش دوره
        : <?php echo @$_POST['sendtrcourse'] ?></header>
    <header class="btn-success text-center btn-lg <?php echo $hidden;?>" style="margin:5%;font-family: yekan">ویرایش با موفقیت انجام شد</header>
    <div class="row" dir="rtl" style="font-family: yekan">
        <form class="form-group" action="editcourseindex.php" method="post">
            <?php
            @$rowctr = mysqli_fetch_array($rectr);
            echo '<p dir="rtl" style="font-family: yekan">';
            echo 'نام دوره :';
            echo '</p>';
            echo "<input type='text' name='title' class='form-control text-right' value='".$rowctr['ci_title']."'>";

            echo '<p dir="rtl" style="font-family: yekan">';
            echo 'تعدادساعات برگزاری دوره:';
            echo '</p>';
            echo "<input type='text' name='hours' class='form-control text-right' value='".$rowctr['ci_hours']."'>";

            echo '<p dir="rtl" style="font-family: yekan">';
            echo 'زمان برگزاری:';
            echo '</p>';
            echo "<input type='text' name='date' class='form-control text-right' value='".$rowctr['ci_date']."'>";

            echo '<p dir="rtl" style="font-family: yekan">';
            echo 'مدرس :';
            echo '</p>';
            echo "<input type='text' name='teacher' class='form-control text-right' value='".$rowctr['ci_teacher']."'>";

            echo '<p dir="rtl" style="font-family: yekan">';
            echo 'هزینه دوره:';
            echo '</p>';
            echo "<input type='text' name='price' class='form-control text-right' value='".$rowctr['ci_price']."'>";


            echo '<p>';
            echo 'مکان';
            echo '</p>';
            echo "<input type='text' name='address' class='form-control text-right' value='".$rowctr['ci_address']."'>";

            echo '<p>';
            echo 'سرفصل ها:';
            echo '</p>';
            echo "<input type='text' name='c1' class='form-control'  value='" . $rowctr['ci_c1'] . "'>"."<br>";
            echo "<input type='text' name='c2' class='form-control '  value='" . $rowctr['ci_c2'] . "'>"."<br>";
            echo "<input type='text' name='c3' class='form-control '  value='" . $rowctr['ci_c3'] . "'>"."<br>";
            echo "<input type='text' name='c4' class='form-control '  value='" . $rowctr['ci_c4'] . "'>"."<br>";
            echo "<input type='text' name='c5' class='form-control '  value='" . $rowctr['ci_c5'] . "'>"."<br>";
            echo "<input type='text' name='c6' class='form-control '  value='" . $rowctr['ci_c6'] . "'>"."<br>";
            echo "<input type='text' name='c7' class='form-control '  value='" . $rowctr['ci_c7'] . "'>"."<br>";
            echo "<input type='text' name='c8' class='form-control '  value='" . $rowctr['ci_c8'] . "'>"."<br>";
            echo "<input type='text' name='c9' class='form-control '  value='" . $rowctr['ci_c9'] . "'>"."<br>";
            echo "<input type='text' name='c10' class='form-control '  value='" . $rowctr['ci_c10'] . "'>"."<br>";
            echo "<input type='text' name='c11' class='form-control '  value='" . $rowctr['ci_c11'] . "'>"."<br>";
            echo "<input type='text' name='c12' class='form-control '  value='" . $rowctr['ci_c12'] . "'>"."<br>";
            echo "<input type='text' name='c13' class='form-control '  value='" . $rowctr['ci_c13'] . "'>"."<br>";
            echo "<input type='text' name='c14' class='form-control '  value='" . $rowctr['c14'] . "'>"."<br>";
            echo "<input type='text' name='c15' class='form-control '  value='" . $rowctr['c15'] . "'>"."<br>";
            echo "<input type='text' name='c16' class='form-control '  value='" . $rowctr['c16'] . "'>"."<br>";
            echo "<input type='text' name='c17' class='form-control '  value='" . $rowctr['c17'] . "'>"."<br>";
            echo "<input type='text' name='c18' class='form-control '  value='" . $rowctr['c18'] . "'>"."<br>";
            echo "<input type='text' name='c19' class='form-control '  value='" . $rowctr['c19'] . "'>"."<br>";
            echo "<input type='text' name='c20' class='form-control '  value='" . $rowctr['c20'] . "'>"."<br>";
            echo "<input type='text' name='c21' class='form-control '  value='" . $rowctr['c21'] . "'>"."<br>";
            echo "<input type='text' name='c22' class='form-control '  value='" . $rowctr['c22'] . "'>"."<br>";
            echo "<input type='text' name='c23' class='form-control '  value='" . $rowctr['c23'] . "'>"."<br>";
            echo "<input type='text' name='c24' class='form-control '  value='" . $rowctr['c24'] . "'>"."<br>";
            echo "<input type='text' name='c25' class='form-control '  value='" . $rowctr['c25'] . "'>"."<br>";
            echo "<input type='text' name='c26' class='form-control '  value='" . $rowctr['26'] . "'>"."<br>";
            echo "<input type='text' name='c27' class='form-control '  value='" . $rowctr['c27'] . "'>"."<br>";
            echo "<input type='text' name='c28' class='form-control '  value='" . $rowctr['c28'] . "'>"."<br>";
            echo "<input type='text' name='c29' class='form-control '  value='" . $rowctr['c29'] . "'>"."<br>";
            echo "<input type='text' name='c30' class='form-control '  value='" . $rowctr['c30'] . "'>"."<br>";




            echo '<input type="submit" name="editcoursein" class="form-control btn btn-info" style="font-family: Bnazanin" value="ویرایش ">';
            ?>
            <input type="hidden" name="id" value="<?php echo $rowctr['ci_id'];?>">
        </form>
    </div>
</div>
<div class="row">
    <hr>
    <div class=" pager">
        <a style="font-family: yekan" href="./manager.php" class="btn bg-danger">
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
