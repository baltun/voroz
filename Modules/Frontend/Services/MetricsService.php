<?php

namespace Modules\Frontend\Services;

use Modules\Frontend\DTO\MetricsDTO;

class MetricsService
{
    public function startCheckpoint(): MetricsDTO
    {

        $metricsDTO = new MetricsDTO();
        $metricsDTO->startTimestamp = hrtime(true);
        $metricsDTO->startMemoryUsage = memory_get_usage()/1024/1024;

        return $metricsDTO;
    }

    public function endCheckpoint(MetricsDTO $metricsDTO): MetricsDTO
    {
        $metricsDTO->entTimestamp = hrtime(true);
        $metricsDTO->endMemoryUsage = memory_get_usage()/1024/1024;
        $metricsDTO->duration = ($metricsDTO->entTimestamp - $metricsDTO->startTimestamp)/1e+9;

        return $metricsDTO;
    }
}
