<?php

use Swoole\Timer;

$msec = getenv('MSEC');
$command = getenv('COMMAND');

Timer::tick($msec, function () use ($command) {
    $last_line = system($command, $retval);

    echo "Last line of the output: {$last_line} \n
          Return value: {$retval} ";
});