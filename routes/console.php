<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

schedule::command('backup:database')->daily(); // backup db


Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();
