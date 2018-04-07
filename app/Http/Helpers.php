<?php

function calculateHours($days)
{
    $hours = $days * 8;
    
    return $hours;
}

function calculateDays($hours)
{
    $days = $hours / 8;
    
    return $days;
}