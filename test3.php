<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Apply styles to the header */
        header {
            background-color: #333; /* Set a background color for better visibility */
            padding: 10px;
            color: white;
            display: flex;
            align-items: center;
        }

        /* Style for the logo */
        .logo {
            width: 50px; /* Set the width of your logo */
            height: 50px; /* Set the height of your logo */
            margin-right: 10px; /* Add some space between logo and company name */
        }

        /* Style for the company name */
        .company-name {
            display: flex;
            flex-direction: column; /* Arrange company name and tag in a column */
        }

        /* Style for the first name (h1) */
        .company-first-name {
            font-size: 24px; /* Set the font size for the first name */
            font-weight: bold; /* Make the first name bold */
            margin: 0; /* Remove default margin */
        }

        /* Style for the second name (h2) */
        .company-second-name {
            font-size: 18px; /* Set the font size for the second name */
            margin: 0; /* Remove default margin */
        }
    </style>
    <title>Your Page Title</title>
</head>
<body>
    <header>
        <!-- Your logo -->
        <img src="your-logo.png" alt="Your Logo" class="logo">
        
        <!-- Your company name in two lines -->
        <div class="company-name">
            <h1 class="company-first-name">Your First<br>Company Name</h1>
            <h2 class="company-second-name">Your Second<br>Company Name</h2>
        </div>
    </header>

    <!-- Rest of your content goes here -->

</body>
</html>
