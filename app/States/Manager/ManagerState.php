<?php

declare(strict_types=1);

namespace App\States\Manager;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class ManagerState extends State
{
    final public static function config(): StateConfig
    {
        return parent::config()
            ->default(Created::class);
    }
}
