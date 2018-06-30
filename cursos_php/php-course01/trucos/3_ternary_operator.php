<?php

$unit_cost = 10;
$wholesale_price = ($unit_cost <= 10) ? 11 : 25;
echo $wholesale_price;
