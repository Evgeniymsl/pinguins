<?php
$square_poliby = [
    ["A","B","C","D","E"],
    ["F","G","H","I,J","K"],
    ["L","M","N","O","P"],
    ["Q","R","S","T","U"],
    ["V","W","X","Y","Z"]
];

function cipher_char($char) {
    $cipher_str = "";

    for ($i=0; $i < 5; $i++) { 
        for ($j=0; $j < 5; $j++) { 
            
        }
    }

    return $cipher_str;
}

function cipher($str) {
    $cipher_str = "";

    $arr_cipher = str_split($str);

    foreach ($arr_cipher as $char) {
        $cipher_str .= cipher_char($char);
    }

    return $cipher_str;
}

if($text = isset($_GET["text"])?$_GET["text"]:false) {
    cipher($text);
}

$fd = fopen("Slovo.txt", 'w+');

$text = $_GET["text"];

// var_dump($text);

fwrite($fd, $text);
fclose($fd);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Шифр</title>
</head>
<body>
    <form action="" method="GET">
        <label for="">Введите слово для шифрования</label>
        <input type="text" name="text">
        <input type="submit" value="отправить">
        <p></p>
    </form>
</body>
</html>
