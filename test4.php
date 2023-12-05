<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        #profile-picture {
            width: 100px; /* Adjust the size of the profile picture */
            height: 100px;
            border-radius: 50%;
            cursor: pointer;
        }

        #enlarged-image-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
        }

        #enlarged-image {
            max-width: 80%;
            max-height: 80%;
        }
    </style>
</head>
<body>

<!-- Profile Picture -->
<img id="profile-picture" src="Images/pp/default.png" alt="Profile Picture" onclick="enlargeImage()">

<!-- Enlarged Image Container -->
<div id="enlarged-image-container" onclick="closeEnlargedView()">
    <img id="enlarged-image" src="" alt="Enlarged Image">
</div>

<script>
    function enlargeImage() {
        // Get the profile picture source
        var profilePictureSrc = document.getElementById('profile-picture').src;

        // Set the source of the enlarged image
        document.getElementById('enlarged-image').src = profilePictureSrc;

        // Show the enlarged image container
        document.getElementById('enlarged-image-container').style.display = 'flex';
    }

    function closeEnlargedView() {
        // Hide the enlarged image container
        document.getElementById('enlarged-image-container').style.display = 'none';
    }
</script>

</body>
</html>

