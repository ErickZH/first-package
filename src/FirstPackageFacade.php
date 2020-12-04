<?php

namespace Erickzh\FirstPackage;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Erickzh\FirstPackage\FirstPackage
 */
class FirstPackageFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'first-package';
    }
}
