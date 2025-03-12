<?php

use Illuminate\Support\Facades\Log;

function infoLog($campo, $email)
{
    Log::build([
        'driver' => 'single',
        'path' => storage_path('logs/success.log'),
    ])->info($campo . ' - Auth: ' . auth()->user()->email . ' User: ' . $email);
    return true;
}
function errorLog($campo, $e)
{
    Log::build([
        'driver' => 'single',
        'path' => storage_path('logs/error.log'),
    ])->error($campo . ' - Auth: ' . auth()->user()->email . ' Error: ' . $e->getMessage());
    return true;
}
