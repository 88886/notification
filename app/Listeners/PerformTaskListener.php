<?php

namespace App\Listeners;

use App\Events\PerformTaskEvent;
use App\Jobs\PerformTastJob;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class PerformTaskListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  Event  $event
     * @return void
     */
    public function handle(PerformTaskEvent $event)
    {
        Log::info('diff time:'.$event->task['time_difference']);
        $Second = $event->task['time_difference'];
        $job = (new PerformTastJob($event->task))->delay(Carbon::now()->addSecond($Second));
        dispatch($job);
    }
}
