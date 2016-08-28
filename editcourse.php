<?php
include('./FunctionPHP/Connection.php');
include('./FunctionPHP/checkSession.php');
$connection = ConnectionDB('localhost', 'root', '', 'register');
$coursetraining = '';
$queryctr = '';
$rectr = '';
if (isset($_POST['sup_view']) && !empty($_POST['sup_view'])) {

    if (isset($_POST['sendtrcourse']) && !empty($_POST['sendtrcourse'])) {
        $queryctr = "SELECT * FROM `trainingcourse` WHERE `tr_trcource`='" . $_POST['sendtrcourse'] . "'";
        $rectr = mysqli_query($connection, $queryctr);
    }
}
$description = '';
$hour = $course = '';
$count = 0;
$hidden='hidden';
$hidden1='active';
if (isset($_POST['editcourse']) && !empty($_POST['editcourse'])) {
    if (isset($_POST['text']) && !empty($_POST['text'])) {
        $description = $_POST['text'];
        $count++;
    }
    if (isset($_POST['hour']) && !empty($_POST['hour'])) {
        $hour = $_POST['hour'];
        $count++;
    }
    if (isset($_POST['course']) && !empty($_POST['course'])) {
        $course = $_POST['course'];
        $count++;
    }
    if($count==3)
    {
        $querycedit='UPDATE `trainingcourse` SET `tr_trcource`="'.$course.'",`tr_hours`="'.$hour.'",`tr_description`="'.$description.'" WHERE `tr_id`="'. $_POST['id'].'"';
        $querycedit1='UPDATE `reg` SET `reg_trainingcourse`="'.$course.'" WHERE `tr_id`="'. $_POST['id'].'"';
        $resultEdit=mysqli_query($connection,$querycedit);
        $resultEdit1=mysqli_query($connection,$querycedit1);
        if($resultEdit)
        {
            $hidden='active';
            $hidden1='hidden';
        }
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
    <table class="table table-responsive table-hover">
        <thead style="font-family: yekan">
        <th>توضیحات</th>
        <th>تعداد ساعات</th>
        <th>نام دوره</th>
        </thead>
        <tbody>
        <form class="form-group" action="editcourse.php" method="post">

            <?php
        @$rowctr = mysqli_fetch_array($rectr);
            echo "<tr>";
            echo "<td><textarea name='text' class='form-control text-right' rows='2' cols='30' type='text'>" . $rowctr['tr_description'] . "</textarea>";
            echo "</td>";
            echo "<td><input name='hour' class='form-control' type='text' value='" . $rowctr['tr_hours'] . "'>";
            echo "</td>";
            echo "<td><input name='course' class='form-control text-center' type='text' value='" . $rowctr['tr_trcource'] . "'>";
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>";
            echo "</td>";
            echo "<td>";
            echo '<input type="submit" name="editcourse" class="form-control btn btn-info" style="font-family: Bnazanin" value="ویرایش ">';
            echo "</td>";
            echo "</tr>"
            ?>
<input type="hidden" name="id" value="<?php echo $rowctr['tr_id'];?>">
        </form>
        </tbody>
    </table>
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
