<?php

require __DIR__ . '/vendor/autoload.php';

use Swoole\Timer;
use Swlib\Saber;

$msec = getenv('MSEC');
$url = getenv('URL');

Timer::tick($msec, function () use ($url) {
    $parse = parse_url($url);
    $saber = Saber::create([
        'base_uri' => "{$parse['scheme']}://{$parse['host']}",
        'headers' => [
            'User-Agent' => 'crontab'
        ]
    ]);
    try {
        $saber->get($parse['path']??'/');
    } catch (Exception $e) {
    }
});