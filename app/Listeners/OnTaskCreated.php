<?php

namespace App\Listeners;

use App\Events\TaskCreation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OnTaskCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\TaskCreation  $event
     * @return void
     */
    public function handle(TaskCreation $event)
    {
        $taskCreationDto = $event->taskCreationDTO;

    }
}
