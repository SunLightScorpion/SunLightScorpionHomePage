<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download executed!</title>
    <link rel="stylesheet" href="style.css">
    <link href="sunlight.png" rel="icon">
</head>
<body>

<?php

if ($_POST["downloads"] == "choose") {
    echo "<h1>Download doesnt exist, please select a download!</h1>";
} else {

    $targetDownload = $_POST['downloads'];

    if (file_exists($targetDownload)) {

        echo "<h1>Download file $targetDownload</h1>";

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($targetDownload));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($targetDownload));

        readfile($targetDownload);
    } else {
        die('<h1>File not found.</h1>');
    }

}

?>

</body>
</html>