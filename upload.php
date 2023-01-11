<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>رفع فيديو</title>

    <?php
    include('config.php');
    $subject='';
    $title='';
    if(isset($_POST['subject'])){
        $subject= $_POST['subject'];
    }
    if(isset($_POST['title'])){
        $title= $_POST['title'];
    }
    if(isset($_POST['upload_video'])){
        $maxsize=10000240;
        $name=$_FILES['file']['name'];
        $target_dir="videos/";
        $target_file=$target_dir . $_FILES['file']['name'];
        $videoFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $extenstion_arr=array("mp4","mpeg","avi","3gp");

        if(in_array($videoFileType,$extenstion_arr)){
            if(($_FILES['file']['size'] >= $maxsize)|| ($_FILES['file']['size']==0)){
                echo " الملف كبير";
            }
            else{
                if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                    $query ="INSERT INTO videos(name,location,subject,title)
                    VALUES('".$name."','".$target_file."','$subject','$title')";
                    mysqli_query($connection,$query);
                    echo "doneeeeee";


                }
            }
        }
    }

    ?>

</head>
<body>
    <div class="container">
        <center>
            <img src="images/download.png">
        </center>
        <div class="form">
            <form method="post" enctype="multipart/form-data">

                <input type="file" name="file">
                <br>
                <input type="text" name="subject" id="subject" placeholder="أكتب عنوانا للفيديو">
                <br>
                <input type="text" name="title" id="title" placeholder="أكتب وصف للفيديو">
                <br>
                <input type="submit" value="رفع الفيديو" name="upload_video">
                <a href="readvideos.php" class="link">الرجوع للصفحة الرئيسية</a>
            </form>
        </div>
    </div>
</body>
</html>