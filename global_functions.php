<?php

function dp($object, bool $stop=true)
{
    var_dump($object);
    if($stop) {
        die(PHP_EOL .'stopped @: ' . date('Y-m-d H:i:s').PHP_EOL);
    }
}

function nl($number=1)
{
    for($i=0;$i<$number;$i++) {
        //@todo decide by SAPI <br> | NL
        echo PHP_EOL;
    }
}