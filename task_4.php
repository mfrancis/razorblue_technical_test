<?php

for ($i = 1; $i <= 100; $i++){
    if ($i % 3) {
        echo "Fizz <br />";
    }

    if ($i % 5) {
        echo "Buzz <br />";
    }

    if (
        $i % 3 &&
        $i % 5
    ) {
        echo "FizzBuzz <br />";
    }
}