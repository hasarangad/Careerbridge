<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the updated value from the client
    $newValue = $_POST["newValue"];

    // Update the PHP variable or perform other server-side actions
    $phpVariable = $newValue;

    // Send back a response (optional)
    echo $phpVariable;
} else {
    // Handle other HTTP methods if needed
    echo "Invalid request method";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change PHP Variable with User Input</title>
</head>
<body>

  <p id="display">Initial PHP Variable Value: <?php echo $phpVariable; ?></p>

  <label for="inputField">Enter new value:</label>
  <input type="text" id="inputField">
  <button onclick="updatePHPVariable()">Update PHP Variable</button>

  <script>
    function updatePHPVariable() {
      var newValue = document.getElementById('inputField').value;

      // Using AJAX to send the updated value to the server
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "update.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          // Handle the response from the server (if needed)
          document.getElementById('display').innerHTML = "Updated PHP Variable Value: " + xhr.responseText;
        }
      };
      xhr.send("newValue=" + newValue);
    }
  </script>

</body>
</html>
