<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "immo_benin";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $croppedImage = $_POST['croppedImage'];

    if ($croppedImage) {
        $croppedImage = str_replace('data:image/png;base64,', '', $croppedImage);
        $croppedImage = str_replace(' ', '+', $croppedImage);
        $imageData = base64_decode($croppedImage);

        $fileName = uniqid() . '.png';
        $filePath = 'uploads/' . $fileName;

        // Create image from string
        $image = imagecreatefromstring($imageData);
        if ($image !== false) {
            // Add watermark using default font
            $text = 'Immobilier Benin';
            $fontSize = 20;
            $color = imagecolorallocate($image, 255, 255, 255); // White color
            $x = 10;
            $y = imagesy($image) - 10; // 10 pixels from bottom
            imagettftext($image, $fontSize, 0, $x, $y, $color, null, $text);

            // Save the image with higher quality JPEG compression
            if (imagejpeg($image, $filePath, 90)) { // Use a quality of 90 on a scale of 0 to 100
                imagedestroy($image);

                $sql = "INSERT INTO test (name, image) VALUES ('$name', '$fileName')";
                if ($conn->query($sql) === TRUE) {
                    echo "Record added successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Failed to save the image with watermark.";
            }
        } else {
            echo "Failed to create image from base64 string.";
        }
    } else {
        echo "No cropped image received.";
    }
}

$conn->close();
?>
