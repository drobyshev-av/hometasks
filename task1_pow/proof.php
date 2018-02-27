<?php

/**
 * Надо подобрать такую строку $salt, чтобы md5($data.$nonce) имела $difficulty нулей в начале хеша
 *
 * $data - базовая строка
 * $difficulty - сколько 0 в начале хеша должно быть
 */
function doWork($data, $difficulty = 1){
    $check_string = '';
    for ($i = 0; $i < $difficulty; $i++){
        $check_string.='0';
    }
    $nonce = 0;
    while( true ){
        $nonce++;
        echo 'searching: ' . $nonce . PHP_EOL;
        $hash = hash('sha256', $data . $nonce);
        if(  substr_count($hash, '0', 0, $difficulty) == $difficulty ){
            return $nonce;
        }
    }
}
