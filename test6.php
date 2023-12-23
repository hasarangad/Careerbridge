<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show and Hide Divs</title>
    <style>
        .firstDiv {
            display: block;
        }

        .secondDiv {
            display: none;
        }
    </style>
</head>
<body>

    <div id="div1" class="firstDiv">
        <!-- Content of the first div -->
        <p>This is the first div.</p>
        <button onclick="showSecondDiv()">Show Second Div</button>
    </div>

    <div id="div2" class="secondDiv">
        <!-- Content of the second div -->
        <p>This is the second div.</p>
    </div>

    <script>
        function showSecondDiv() {
            // Hide the first div
            document.getElementById('div1').style.display = 'none';
            // Show the second div
            document.getElementById('div2').style.display = 'block';
        }
    </script>

</body>
</html>
