<?php

namespace Johnathan\FootballData;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Johnathan\FootballData\Skeleton\SkeletonClass
 */
class FootballDataFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'football_data';
    }
}
