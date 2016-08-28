<?php

include("./FunctionPHP/Connection.php");
$connection = ConnectionDB('localhost', 'root', '1', 'register');
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta  http-equiv="X-UA-Compatible" content="IE=edge">
    <meta  name="viewport" content="width=device-width, initial-scale=1">
    <meta  name="description" content="ثبت نام دوره های اموزشی شرکت ارتباط گسترهوشمندسجاد ">
    <meta  name="author" content="اکبر بیطرف">
    <meta  name="og:site_name" content="IVRAN-شرکت ارتباط گستر هوشمندسجاد">
    <title>ثبت نام دوره های آموزشی</title>
    <link rel="icon" href="./picture/iv.jpg">
    <link rel="stylesheet" href="./View/font/font.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./View/styleRequestform.css">
    <link href="./View/carousel.css" rel="stylesheet">
</head>
<body>
<noscript>
    جاوا اسکریپت در مرورگر شما غیر فعال است!&lt;br /&gt;
</noscript>
<script type="text/javascript">
    <!--
    function validateForm(){
        var pattern=/^\d{10}$/;
        var field = document.forms["form1"]["name"].value;
        var field1 = document.forms["form1"]["family"].value;
        var field2 = document.forms["form1"]["codemelli"].value;
        var field3 = document.forms["form1"]["mobile"].value;
        var field4=document.forms["form1"]["numberuni"].value;
        var field5=document.forms["form1"]["uni"].value;
        var field6=document.forms["form1"]["course"].value;
        if ((field == null || field == "")||(field1 == null || field1 == "")||(field2 == null || field2 == "")
        ||(field3 == null || field3 == "")||(field4 == null || field4 == "")||(field5 == null || field5 == "")||(field6 == null || field6 == "")){
            //alert("فیلد نام نباید خالی باشد");
            document.getElementById("field").innerHTML="قسمت های ستاره دار نباید خالی باشد";
            return false;
        }
         if(field3.value.match(pattern)==false)
        {
            document.getElementById("field1").innerHTML="fdfdfdfdfdf";
            return false;
        }
    }
    //-->
</script>
<nav class="navbar navbar-inverse text-center" style="color:white;background-color: orange;border-color: orange">
    <p class="navtoppage" style="font-family:yekan">پیش ثبت نام </p>
</nav>
<div class="container marketing">
    <div class="row" style="border: groove">
        <div class="text-center col-lg-7" style="font-size:20px">
        <span>
          <br><br>
            <p dir="rtl" class="bg-info lead" style="font-family:yekan;"> قسمت های ستاره دار تکمیل گردد</p>
            <p class="bg-danger lead" style="font-family:yekan">باتوجه به صدورگواهینامه پایان دوره لطفا فرم را بصورت کامل ودقیق تکمیل نمایید</p>
            <p class="bg-info lead" style="font-family:yekan">برای در یافت اخرین اطلاعیه ها ایمیل خودرا صحیح درج
                نمایید </p>
        </span>
            <br>
            <br><br>
            <span class="Error page-header " style="font-family: yekan;font-size: 40px" id="field"></span>
            <span class="Error page-header " style="font-family: yekan;font-size: 40px" id="field1"></span>
        </div>

        <form name="form1" class="form-group col-lg-5  " action="printregister.php" method="post" dir="rtl"
              enctype="multipart/form-data" onsubmit="return validateForm();">
            <br/>

            <label style="font-family: yekan" > نام:
            </label><span class="Error glyphicon glyphicon-asterisk"></span>
            <input class="form-control" type="text" size="30px" name="name" maxlength="10"/>

            <label style="font-family: yekan"> نام خانوادگی :
            </label><span class="Error glyphicon glyphicon-asterisk"></span>
            <input class="form-control" type="text" size="30px" name="family" maxlength="12"/>

            <label style="font-family: yekan"> نام پدر :
            </label>
            <input class="form-control" type="text" size="30px" name="father" maxlength="10" />

            <label style="font-family: yekan">شماره ملی :
            </label><span class="Error glyphicon glyphicon-asterisk"></span>
            <input class="form-control" type="number" size="30px" name="codemelli" maxlength="10"/>

            <label style="font-family: yekan"> شماره دانشجویی :
            </label><span class="Error glyphicon glyphicon-asterisk"></span>
            <input class="form-control" type="number" size="30px" name="numberuni"/>

            <label style="font-family: yekan">شماره موبایل :
            </label><span class="Error glyphicon glyphicon-asterisk"></span>
            <input class="form-control" type="text" size="30px" name="mobile" maxlength="11"/>

            <label style="font-family: yekan"> پست الکترونیکی :
            </label>
            <input class="form-control" type="email" size="30px" name="email" />

            <label style="font-family: yekan"> رشته تحصیلی :
            </label><span class="Error glyphicon glyphicon-asterisk"></span>
            <input class="form-control" type="text" size="30px" name="course" placeholder="کامپیوتر - نرم افزار" maxlength="15"/>

            <label style="font-family: yekan ;"> نام دانشگاه یا موسسه :
            </label><span class="Error glyphicon glyphicon-asterisk"></span>
            <input class="form-control" type="text" size="30px" name="uni" placeholder="دانشگاه صنعتی سجاد" maxlength="20"/>

            <label style="font-family: yekan"> توضیحات :
            </label>
        <textarea class="form-control" rows="5" name="address">
        </textarea>

            <br/>
            <label style="font-family:yekan;">دوره انتخابی :</label>
            <span class="Error glyphicon glyphicon-asterisk"></span>
            <?php
            $tip = $tip1 = 'hidden';
            echo ' <select class="form-control" name="sendtrcourse" style="font-family:Batang">';
            $tr_query = "SELECT * FROM `trainingcourse`";
            $result_tr = mysqli_query($connection, $tr_query);
            while ($rows_tr = mysqli_fetch_array($result_tr)) {
                echo ' <option name="trainingcourse" title="tooltip">' . $rows_tr['tr_trcource'] . '</option>';

            }
            echo '</select>';

            ?>
            <br>
            <input  class="form-control btn btn-success col-lg-8" type="submit" name="sub_reg"
                   value="  تایید وارسال فرم ثبت نام " style="font-family: yekan;"/>
        </form>
</div>

    <div class="row">
<div class="pager text-center">
    <a style="font-family: yekan" href="./index.html" class="btn btn-lg btn-warning">

بازگشت به صفحه اصلی
    </a>
    <a style="font-family: yekan" href="./course.php" class="btn btn-lg btn-info">معرفی دوره
    </a>
</div>
    </div>

</body>
</html>
