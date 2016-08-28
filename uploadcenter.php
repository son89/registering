<?php
include("./FunctionPHP/Connection.php");
$connection = ConnectionDB('localhost', 'root', '1', 'register');
$name = $family = $description = $title = '';
$upFile = '';
$state = true;
$situation='hidden';
if (isset($_POST['up']) && !empty($_POST['up'])) {
    if (isset($_POST['firstname']) && !empty($_POST['firstname'])) {
        $name = $_POST['firstname'];
    } else $state = false;
    if (isset($_POST['lastname']) && !empty($_POST['lastname'])) {
        $family = $_POST['lastname'];
    } else $state = false;
    if (isset($_POST['title']) && !empty($_POST['title'])) {
        $title = $_POST['title'];
    }
    if (isset($_POST['title']) && !empty($_POST['title'])) {
        $title = $_POST['title'];
    }
    if (isset($_POST['description']) && !empty($_POST['description'])) {
        $description = $_POST['description'];
    }
    if ($state == true) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"] . "<br />";
        } else {
            if ((($_FILES["file"]["type"] == "image/gif")
                    || ($_FILES["file"]["type"] == "image/jpeg")
                    || ($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/png"))
                && ($_FILES["file"]["size"] < 999000)
            ) {
                if (file_exists("uploadFile/picture/" . $_FILES["file"]["name"])) {
                    echo $_FILES["file"]["name"] . " already exists. ";

                } else {
                    move_uploaded_file($_FILES["file"]["tmp_name"],
                        "./uploadFile/picture/" . $_FILES["file"]["name"]);
                     $stored = "./uploadFile/picture/" . $_FILES["file"]["name"];
                    $query="INSERT INTO `upload`( `up_name`, `up_family`, `up_description`, `up_file`,`up_title`) VALUES ('".$name."','".$family."','".$description."','".$stored."','".$title."')";
                    mysqli_query($connection,$query);
                    $situation='active';
                }

            } elseif (($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||
                ($_FILES["file"]["type"] == "application/pdf") || ($_FILES["file"]["type"] == "application/msword" && ($_FILES["file"]["size"] < 999000))
            ) {
                move_uploaded_file($_FILES["file"]["tmp_name"],
                    "uploadFile/document/" . $_FILES["file"]["name"]);
                $stored = "./uploadFile/document/" . $_FILES["file"]["name"];
                $query="INSERT INTO `upload`( `up_name`, `up_family`, `up_description`, `up_file`) VALUES ('".$name."','".$family."','".$description."','".$stored."')";
                mysqli_query($connection,$query);
                $situation='active';
            } else {
                echo "این فرمت قابل پشتیبانی نیست";
            }


        }
    } else {
        echo 'no to up ';
    }


}


?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ثبت نام دوره های اموزشی شرکت ارتباط گسترهوشمندسجاد ">
    <meta name="author" content="اکبر بیطرف">
    <meta name="og:site_name" content="IVRAN-شرکت ارتباط گستر هوشمندسجاد">
    <title>آپلود سنتر</title>
    <link rel="icon" href="./picture/iv.jpg">
    <link rel="stylesheet" href="./View/font/font.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./View/styleRequestform.css">
    <link href="./View/carousel.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse text-center" style="color:white;background-color: orange;border-color: orange">
    <p class="navtoppage" style="font-family:yekan">UPLOAD CENTER</p>
</nav>
<div class="bg-danger text-center  <?php echo $situation ?>" style="padding: 5px;font-family: yekan;;">
    <p>فایل با موفقیت در سرور ذخیره گردید.باتشکر</p>
</div>
<div class="container marketing">
    <div class="row" dir="rtl" style="font-family: yekan">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">نکات </h3>
            </div>
            <div class="panel-body">
                <ul>
                    <li>ماکزیمم سایز فایل ها<strong>999 KB</strong> می تواند باشد.
                    </li>
                    <li>تنها قادر به اپلود تصاویر با فرمت  های<strong>JPG, GIF, PNG</strong>می باشید.
                    </li>
                    <li>اسناد <strong>PDF,DOC,PPTX,DOCX</strong> قادر به اپلود می باشند.
                    </li>
                </ul>
            </div>
            <div class="panel-footer">
                <form method="post" action="./uploadcenter.php" name="upload" class="form-group" enctype="multipart/form-data">
                    <label class="" style="font-family: yekan">نام</label><span class="Error glyphicon glyphicon-asterisk"></span>
                    <input type="text" class="form-control" name="firstname">
                    <label class="">نام خانوادگی</label><span class="Error glyphicon glyphicon-asterisk"></span>
                    <input type="text" class="form-control" name="lastname">
                    <label class="">عنوان فایل اپلود شده </label>
                    <input type="text" class="form-control" name="title"><br>
                    <label > توضیحات</label>
                    <textarea class="form-control" name="description" rows="4"></textarea><br>
                    <input type="file" name="file" id="file" class="form-control" ><span class=""></span><br>
                    <input type="submit" class=" btn btn-lg btn-success"  name="up" value="آپلود">
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="pager text-center">
        <a style="font-family: yekan" href="./index.html" class="btn btn-lg btn-warning">

            بازگشت به صفحه اصلی
        </a>
    </div>
</div>
</body>
</html>