<?php
$fileUrl = 'https://example.com/path/to/file.zip';
$destination = 'downloaded_file.zip';

// Download the file
$fileContents = file_get_contents($fileUrl);

// Save the file to the specified destination
file_put_contents($destination, $fileContents);

// Check if the file was downloaded successfully
if (file_exists($destination)) {
    echo 'File downloaded successfully!';
} else {
    echo 'Failed to download the file.';
}
?>
