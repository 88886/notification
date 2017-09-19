<?php

namespace App\Listeners;

use App\Events\PerformTaskEvent;
use App\Jobs\PerformTastJob;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class PerformTaskListener implements ShouldQueue
{
    #public $queue = 'task_perform';

    public function handle(PerformTaskEvent $event)
    {
        $time_difference = strtotime($event->task['start_time']) - strtotime(Carbon::now());

        Log::info('task data:'.$event->task);

        Log::info('diff time:'.$time_difference);

        $job = (new PerformTastJob($event->task))->delay(Carbon::now()->addSecond($time_difference));

        dispatch($job);
    }
}
