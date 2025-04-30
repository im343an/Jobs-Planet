<?php

if (!function_exists('calculateAge')) {
function calculateAge($birthDate)
{
$birthDate = new \DateTime($birthDate);
$today = new \DateTime();
$age = $today->diff($birthDate)->y;
return $age;
}
}