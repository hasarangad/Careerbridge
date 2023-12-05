<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="video-container">
        <video id="my-video" muted autoplay>
            <source src="Video/animation.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    
    <script>
        const video = document.getElementById("my-video");
        const content = document.getElementById("content");

        setTimeout(() => {
            // Pause the video
            video.pause();

            // Hide the video container
            video.parentElement.style.display = "none";

            // Show the content
            window.location.href = 'loadHome.php';
        }, 1500); // 1000 milliseconds = 1 second
    </script>

    
</body>
</html>