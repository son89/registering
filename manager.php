<?php
include('./FunctionPHP/Connection.php');
include('./FunctionPHP/checkSession.php');
$connection=ConnectionDB('localhost','root','','register');
checkSession();
$firstname=$lastname=$username=$password='';
$situation=0;
$hi='hidden';
if(isset($_POST['adduser'])&&!empty($_POST['adduser']))
{
    if(isset($_POST['firstname'])&&!empty($_POST['firstname']))
    {
        $firstname=$_POST['firstname'];
        $situation++;

    }
    if(isset($_POST['lastname'])&&!empty($_POST['lastname']))
    {
    $lastname=$_POST['lastname'];
        $situation++;
    }
    if(isset($_POST['username'])&&!empty($_POST['username']))
    {
        $username=$_POST['username'];
        $situation++;
    }
    if(isset($_POST['password'])&&!empty($_POST['password']))
    {
        $password=$_POST['password'];
        $situation++;
    }
    if($situation==4)
    {

        $query="INSERT INTO `login`( `log_user`, `log_pass`, `log_name`, `log_family`) VALUES ('".$username."','".$password."','".$firstname."','".$lastname."')";
        $result=mysqli_query($connection,$query);
        $hi='active';
    }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="author" content="akbar bitarf">
    <meta name="description" content="this is a register to class asterisk ">
    <title>گروه ویپ دانشگاه صنعتی سجاد </title>
    <link rel="stylesheet" href="./View/font/font.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./View/styleRequestform.css">
    <link href="./View/carousel.css" rel="stylesheet">
</head>
<!--........................................ start of body .................................................... -->
<body>
<div class="container">
    <nav class="navbar navbar-inverse text-center" dir="rtl" style="color:white;background-color: orange;border-color: orange">
        <p class="navtoppage" style="font-family:yekan">

            مهندس :
            <?php echo $_SESSION['log_name']. " ".$_SESSION['log_family'];?>&nbsp;
            خوش امدید.
        </p>
    </nav>
    <div class="bg-success  text-center <?php echo $hi
    ; ?>" dir="rtl" style="font-family: yekan">
        <p style="font-size: 25px"> کاربر موردنظر با موفقیت درج کردید.</p>
    </div>
<div  style="font-family:fontans;font-size: 25px">
    <?php
    if(isset($_POST['destroy'])&&!empty($_POST['destroy']))
    {
        session_destroy();
        header("Location:./index.html");
    }
    ?>
</div>
    <!-- ......................................END Header ..............................................-->
    <div class="row" style="border: groove;margin-top: 2%">
        <form class="form-group " action="printcourse.php" method="post" dir="rtl" enctype="multipart/form-data">
        <span class="row col-lg-5 col-lg-offset-7">
        <label class="" style="font-family: yekan; margin-top: 16px">انتخاب دوره ومشاهد افرد ثبت نام کننده:</label>
            <?php
            echo ' <select  class="form-control" name="sendtrcourse" >';
            $tr_query="SELECT * FROM `trainingcourse`";
            $result_tr=mysqli_query($connection,$tr_query);
            while ( $rows_tr=mysqli_fetch_array($result_tr)) {
                echo ' <option style="font-family: yekan" name="trainingcourse">'.$rows_tr['tr_trcource'].'</option>';
            }
            echo '</select>';
            ?>

            <br/><br/>
            </span>
        <span class="row col-lg-2 col-lg-offset-7">
            <input type="submit" name="sup_view" class="form-control  btn-success" value="مشاهده " style="font-family: yekan"><br>
        </span>
        </form>

    </div>




    <!-- ........   End View of personal Register Course............................................ -->
    <div class="row" style="border: groove;">
        <form class="form-group " action="./editcourse.php" method="post" dir="rtl" enctype="multipart/form-data">
        <span class="row col-lg-5 col-lg-offset-7">
        <label class="" style="font-family:yekan; margin-top: 16px">ویرایش دوره :</label>
            <?php
            echo ' <select  class="form-control" name="sendtrcourse" style="font-family:Batang">';
            $tr_query="SELECT * FROM `trainingcourse`";
            $result_tr=mysqli_query($connection,$tr_query);
            while ( $rows_tr=mysqli_fetch_array($result_tr)) {
                echo ' <option name="trainingcourse">'.$rows_tr['tr_trcource'].'</option>';


            }
            echo '</select>';
            ?>
            <br/><br/>
        </span>
        <span class="row col-lg-2 col-lg-offset-7">
            <input type="submit" name="sup_view" style="font-family: yekan" class="form-control  btn-success" value="ویرایش"><br>
        </span>
        </form>
    </div>



    <div class="row" dir="rtl" style="border: groove;">
        <form class="form-group" method="post" dir="rtl" action="./editcourseindex.php">
            <span class="col-lg-5 col-lg-offset-7">
                <label class="" style="font-family:yekan; margin-top: 16px">ویرایش سرفصل دوره :</label>

            <?php
            echo ' <select  class="form-control" name="sendtrcourse" style="font-family:Batang">';
            $query12="SELECT * FROM `courseindex`";
            $result12=mysqli_query($connection,$query12);
            while ( $rows12=mysqli_fetch_array($result12)) {
                echo ' <option name="trainingcourse">'.$rows12['ci_title'].'</option>';


            }
            echo '</select>';
            ?>

            <br><br>
                 </span>
             <span class="row col-lg-2 col-lg-offset-7">
            <input type="submit" name="sup1" style="font-family: yekan" class="form-control  btn-success" value="ویرایش"><br>
        </span>
        </form>
    </div>
    <!-- ................................ End Edit Course ....................................... -->
    <div class="row" style="border: groove;">
        <form class="form-group " action="./deletecourse.php" method="post" dir="rtl" enctype="multipart/form-data">
        <span class="row col-lg-5 col-lg-offset-7">
        <label class="" style="font-family:yekan; margin-top: 16px">حذف دوره :</label>
            <?php
            echo ' <select  class="form-control" name="sendtrcourse" style="font-family:Batang">';
            $tr_query="SELECT * FROM `trainingcourse`";
            $result_tr=mysqli_query($connection,$tr_query);
            while ( $rows_tr=mysqli_fetch_array($result_tr)) {
                echo ' <option name="trainingcourse">'.$rows_tr['tr_trcource'].'</option>';


            }
            echo '</select>';
            ?>
            <br/><br/>
        </span>
        <span class="row col-lg-2 col-lg-offset-7">
            <input type="submit" name="sub_delete" style="font-family: yekan" class="form-control  btn-success" value="حذف دوره"><br>
        </span>
        </form>
    </div>
    <!-- ............................... Delete Cource ............................................ -->
    <div class="row" style="border: groove;">
        <form class="form-group"  action="manager.php" method="post" dir="rtl" enctype="multipart/form-data">
        <span class="col-lg-5 col-lg-offset-7">
        <label class="text-center" style="font-family:yekan;">اضافه کردن کاربرجدید:</label>
        <br>
            <label style="font-family: yekan">نام :</label><br>
            <input   class="form-control" type="text" name="firstname"><br>
            <label style="font-family: yekan">نام خانوادگی :</label><br>
            <input class="form-control" type="text" name="lastname"><br>
            <label style="font-family: yekan">نام کاربری :</label><br>
            <input class="form-control" type="text" name="username"><br>
            <label >رمزورود:</label><br>
            <input class="form-control" type="text" name="password"><br>
            <br/>
            <br/>
        </span>
        <span class="row col-lg-2 col-lg-offset-7">
            <input type="submit" name="adduser" class="form-control  btn-success" style="font-family: yekan" value="ثبت"><br>
        </span>
        </form>
    </div>
    <div class="row" style="border: groove;">
        <form class="form-group " action="printinsertcourse.php" method="post" dir="rtl" enctype="multipart/form-data">
        <span class="col-lg-5 col-lg-offset-7">
        <label class="text-center " style="font-family: yekan;">ایجاد دوره جدید:</label>
        <br>

            <label style="font-family: yekan">نام دوره :</label><span class="Error">*</span><br>
            <input class="form-control" type="text"  name="coursename" placeholder=""><br>
            <label style="font-family: yekan">تعداد ساعات دوره :</label><span class="Error">*</span><br>
            <input class="form-control" type="text" name="coursehours" placeholder="30"><br>
            <br/>
            <label style="font-family: yekan">توضیح مختصر درباره دوره اموزشی</label><span class="Error">*</span>
            <textarea class="form-control" name="description" rows="5" cols="50"></textarea>
            <br/>
        </span>
        <span class="row col-lg-2 col-lg-offset-7">
            <input type="submit" name="addcourse" style="font-family: yekan" class="form-control  btn-success" value="ایجاد دوره جدید"><br>
        </span>
        </form>
    </div>
    <!--         -->
    <div class="row" style="border: groove;">
        <form class="form-group " action="printfullcourse.php" method="post" dir="rtl" enctype="multipart/form-data">

        <span class="row col-lg-2 col-lg-offset-7" style="padding-bottom:15px;padding-top: 15px">
            <input type="submit" name="viewcourse" style="font-family: yekan" class="form-control btn btn-success" value="مشاهده تمامی دوره ها"><br>
        </span>

        </form>

    </div>
</div>
<div class="row ">
    <div class="col-lg-6 col-md-6">
<form  action="./manager.php" method="post" style="margin:1%;direction: rtl;font-family: fontans">
    <input class="btn btn-primary btn-lg" type="submit" name="destroy" value="خروج">
</form>
    </div>
</div>
</body>
</html>