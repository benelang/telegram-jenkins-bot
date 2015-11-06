<?php

$data = $_POST;

$file = fopen('result.txt', 'a+');
echo $file;
$content = file_get_contents('php://input');

fwrite($file, $content);

echo file_get_contents('php://input');
