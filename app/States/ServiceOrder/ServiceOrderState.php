<?php

declare(strict_types=1);

namespace App\States\ServiceOrder;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class ServiceOrderState extends State
{
    final public static function config(): StateConfig
    {
        return parent::config()
            ->default(Pending::class);
    }
}
