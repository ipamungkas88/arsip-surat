<?php
// Diagnostic page to check PHP configuration
echo "<h1>PHP Upload Configuration</h1>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Setting</th><th>Value</th></tr>";
echo "<tr><td>upload_max_filesize</td><td>" . ini_get('upload_max_filesize') . "</td></tr>";
echo "<tr><td>post_max_size</td><td>" . ini_get('post_max_size') . "</td></tr>";
echo "<tr><td>max_execution_time</td><td>" . ini_get('max_execution_time') . "</td></tr>";
echo "<tr><td>memory_limit</td><td>" . ini_get('memory_limit') . "</td></tr>";
echo "<tr><td>file_uploads</td><td>" . (ini_get('file_uploads') ? 'Enabled' : 'Disabled') . "</td></tr>";
echo "<tr><td>max_file_uploads</td><td>" . ini_get('max_file_uploads') . "</td></tr>";
echo "</table>";

echo "<h2>Test Upload Form</h2>";
echo '<form action="" method="post" enctype="multipart/form-data">';
echo '<input type="file" name="test_file" accept=".pdf">';
echo '<input type="submit" value="Test Upload" name="submit">';
echo '</form>';

if (isset($_POST['submit']) && isset($_FILES['test_file'])) {
    echo "<h3>Upload Test Result:</h3>";
    echo "<pre>";
    print_r($_FILES['test_file']);
    echo "</pre>";
    
    if ($_FILES['test_file']['error'] === UPLOAD_ERR_OK) {
        echo "<p style='color: green;'>Upload successful!</p>";
    } else {
        echo "<p style='color: red;'>Upload failed. Error code: " . $_FILES['test_file']['error'] . "</p>";
        
        switch($_FILES['test_file']['error']) {
            case UPLOAD_ERR_INI_SIZE:
                echo "<p>File exceeds upload_max_filesize directive</p>";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                echo "<p>File exceeds MAX_FILE_SIZE directive</p>";
                break;
            case UPLOAD_ERR_PARTIAL:
                echo "<p>File was only partially uploaded</p>";
                break;
            case UPLOAD_ERR_NO_FILE:
                echo "<p>No file was uploaded</p>";
                break;
            default:
                echo "<p>Unknown upload error</p>";
        }
    }
}
?>
