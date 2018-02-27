<?php

include 'proof.php';

function validateWork(){
    $data = base64_encode(random_bytes(rand(0, 100))); // базовая строка
    $difficulty = rand(1, 4); // сколько нулей надо в начале sha256

    // Получаем nonce, который надо добавить к $data, чтобы получилось
    // $difficulty нулей в начале sha256
    $nonce = doWork($data, $difficulty);
    $hash = hash('sha256', $data . $nonce );

    if(  substr_count($hash, '0', 0, $difficulty) == $difficulty ){
        echo '    Посчитано верно'. PHP_EOL;
    } else {
        echo '    Посчитано неверно:' . PHP_EOL;
    }
    echo '      $data: ' . $data . PHP_EOL;
    echo '      $difficulty: ' . $difficulty . PHP_EOL;
    echo '      $hash: ' . $hash . PHP_EOL;
    echo '      $nonce: ' . $nonce . PHP_EOL;
}

validateWork();

