<?php

session_start();

RequiredValidSession();

$date  = (new DateTime())->getTimestamp();
$today = strftime('%d de %B de %Y', $date);

loadTemplateView('day_records', ['today' => $today]);