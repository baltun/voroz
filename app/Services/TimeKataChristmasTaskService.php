<?php
declare(strict_types=1);

namespace App\Services;

class TimeKataChristmasTaskService
{
    public function __invoke(array $durations)
    {
        echo 'invoke:'.PHP_EOL;
        return $this->canDoIt($durations);
    }

    public function canDoIt(array $durations)
    {
        $durationSumTimestamp = 0;
        $timeNull = strtotime('00:00:00');

        foreach ($durations as $duration) {
            $durationTimestamp = strtotime($duration) - $timeNull;
            $durationSumTimestamp += $durationTimestamp;
        }

        $durationSumString = date('H:i:s', $durationSumTimestamp);
        $durationOf24HoursTimestamp = strtotime('24:00:00') - $timeNull;

        $countOfDays = (int)($durationSumTimestamp / $durationOf24HoursTimestamp);
        $canDoIt = $durationOf24HoursTimestamp >= $durationSumTimestamp;

        return [$canDoIt, $durationSumString, $countOfDays];
    }
}

