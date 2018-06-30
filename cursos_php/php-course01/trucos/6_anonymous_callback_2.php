<?php

$friends = [
    ['first' => 'Jim', 'last' => 'White'],
    ['first' => 'Jane', 'last' => 'White'],
    ['first' => 'Hilary', 'last' => 'Brown'],
    ['first' => 'Harry', 'last' => 'Brown'],
    ['first' => 'Paul', 'last' => 'Green'],
    ['first' => 'Amanda', 'last' => 'Green'],
    ['first' => 'John', 'last' => 'Black'],
    ['first' => 'Diana', 'last' => 'Black']
];

usort($friends, function($a, $b) {
    return [$a['last'], $a['first']] <=> [$b['last'], $b['first']];
});

/*
usort($friends, function($a, $b) {
    // PHP 5 doesn't support the spaceship operator.
    // Use a conditional statement instead.
    if ([$a['last'], $a['first']] < [$b['last'], $b['first']]) {
        return -1;
    } elseif ([$a['last'], $a['first']] > [$b['last'], $b['first']]) {
        return 1;
    } else {
        return 0;
    }
});
*/

foreach ($friends as $friend) {
    echo '<li>' . implode(' ', $friend) . '</li>';
}