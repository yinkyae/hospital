<?php
function getQrcode()
{
    $char = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ!+-%$#*';
    $randString = "";
    for ($i = 0; $i < 128; $i++) {
        $index = rand(0, strlen($char) - 1);
        $randString .= $char[$index];
    }

    return $randString;
}
