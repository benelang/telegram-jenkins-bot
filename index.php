<?php

$data = $_POST;

$file = fopen(__DIR__ . '/result.txt', 'r+');
fwrite($file, $data);
