<?php
function polybiusEncrypt($text)
{
    $polybiusSquare = array(
        'A' => '11', 'B' => '12', 'C' => '13', 'D' => '14', 'E' => '15',
        'F' => '21', 'G' => '22', 'H' => '23', 'I' => '24', 'J' => '24',
        'K' => '25', 'L' => '31', 'M' => '32', 'N' => '33', 'O' => '34',
        'P' => '35', 'Q' => '41', 'R' => '42', 'S' => '43', 'T' => '44',
        'U' => '45', 'V' => '51', 'W' => '52', 'X' => '53', 'Y' => '54',
        'Z' => '55'
    );

    $text = strtoupper($text);
    $encryptedText = '';

    for ($i = 0; $i < strlen($text); $i++) {
        if ($text[$i] == " ") {
            $encryptedText .= " ";
        } else {
            $encryptedText .= $polybiusSquare[$text[$i]];
        }
    }

    return $encryptedText;
}

$text = $_GET['text'];
$encryptedText = polybiusEncrypt($text);
echo $encryptedText;

function polybiusDecrypt($encryptedText)
{
    $polybiusSquare = array(
        '11' => 'A', '12' => 'B', '13' => 'C', '14' => 'D', '15' => 'E',
        '21' => 'F', '22' => 'G', '23' => 'H', '24' => 'I/J', '25' => 'K',
        '31' => 'L', '32' => 'M', '33' => 'N', '34' => 'O', '35' => 'P',
        '41' => 'Q', '42' => 'R', '43' => 'S', '44' => 'T', '45' => 'U',
        '51' => 'V', '52' => 'W', '53' => 'X', '54' => 'Y', '55' => 'Z'
    );

    $decryptedText = '';

    $encryptedText = str_replace(' ', '', $encryptedText);

    for ($i = 0; $i < strlen($encryptedText); $i += 2) {
        $pair = substr($encryptedText, $i, 2);
        if ($pair == "  ") {
            $decryptedText .= " ";
        } else {
            $decryptedText .= $polybiusSquare[$pair];
        }
    }

    return $decryptedText;
}

$decryptedText = polybiusDecrypt($encryptedText);
echo $decryptedText;
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