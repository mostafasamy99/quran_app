<?php

include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Quran app</title>
</head>
<body>  

<div class="app-video">

    <?php
    $fetcgAllVideos=mysqli_query($connection,"SELECT *FROM videos ORDER BY id DESC");
    while($row=mysqli_fetch_assoc($fetcgAllVideos)){
        $location=$row['location'];
        $subject=$row['subject'];
        $title=$row['title'];

       echo '<div class="video">';

           echo '<video src="'.$location.'" class="video-player"></video>';
            echo'<div class="footer">';
            echo'<div class="footer-text">';
            echo'<h3>Mostafa Menshawy</h3>';
            echo'<p class="descripton">'.$subject.'</p>';
            echo'<div class="img-marq">';
            echo'<a href="upload.php"><img src="images/uparrow_78484.png"></a>';
            echo'<marquee direction="right">'.$title.'</marquee>';
            echo'</div>';
            echo'</div>';
            echo'<img src="images/music-disc-white-circle.png" class="image-play">';
            echo'</div>';
       echo'</div>';
    }

    ?>
        
</div>

<script>
        const videos =document.querySelectorAll('video');
        for(const video of videos){
            video.addEventListener('click',function(){
                if(video.paused){
                    video.play();
                }else{
                    video.pause();
                }
            })
        }
    </script>
</body>
</html>


