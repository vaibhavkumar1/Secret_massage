<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Project</title>
</head>
<body>
<h1 style="text-align: center;color: coral;font-family: 'Arial Narrow'">Encryption and Decryption</h1>
<form action="index.php">
    <h2 style="color: deepskyblue">For Encrypt key-</h2>
    <input class="input" type="text" placeholder="Enter string" name="string">
    <br>

    <input type="radio" id="key" name="key" value="ekey">
    <label for="key">For Encrypt Key</label><br>
    <input type="radio" id="qr" name="qr" value="qrcode">
    <label for="qr">For Qr Code</label><br>

    <input class="input1" type="submit" placeholder="get key">
</form>
<form action="index.php">
    <h2 style="color: deepskyblue">For Decrypt string-</h2>
    <input style="margin-bottom: 20px" class="input" type="text" placeholder="Enter key" name="string1">
    <input class="input1" type="submit" placeholder="get string">
</form>
</body>
</html>

<?php

error_reporting(0);

if($_GET["string"]!=""){
    if($_GET["key"]=="ekey"){
        $simple_string=$_GET['string'];

            $ciphering = "AES-128-CTR";

            $iv_length = openssl_cipher_iv_length($ciphering);
            $options = 0;

            $encryption_iv = '1234567891011121';

            $encryption_key = "GeeksforGeeks";


            $encryption = openssl_encrypt($simple_string, $ciphering,
                $encryption_key, $options, $encryption_iv);

            echo "<h3 style='color: coral'>Encrypted String:-$encryption</h3>";
    }
    else if($_Get["qr"]=="qrcode"){
        include 'phpqrcode/qrlib.php';
        $text = $_GET['string'];

        $path = 'images/';
        $file = $path.uniqid().".png";

        $ecc = 'L';
        $pixel_Size = 10;
        $frame_Size = 10;

        QRcode::png($text, $file, $ecc, $pixel_Size, $frame_size);

        echo "<h1>Vaibhav</h1>";
    }
}
if($_GET["string1"]!=""){

    $encryption=$_GET["string1"];

    $ciphering = "AES-128-CTR";

    $options = 0;

    $decryption_iv = '1234567891011121';

    $decryption_key = "GeeksforGeeks";


    $decryption=openssl_decrypt ($encryption, $ciphering,
        $decryption_key, $options, $decryption_iv);

    echo "<h3 style='color: coral'>Decrypted String:-$decryption</h3>";
}

?>