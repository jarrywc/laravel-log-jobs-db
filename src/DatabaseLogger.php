<?php

namespace Jarredcain\LaravelLogJobsDb;

use Monolog\Logger;

class DatabaseLogJobs
{
    /**
     * Create a custom Monolog instance.
     *
     * @return Logger
     */
    public function __invoke(array $config)
    {
        return new Logger('Database', [
            new DatabaseLogJobHandler(),
        ]);
    }
}
