<?php

/**
 * Container.php - Dependency injection gateway
 *
 * @package jaxon-core
 * @author Thierry Feuzeu <thierry.feuzeu@gmail.com>
 * @copyright 2016 Thierry Feuzeu <thierry.feuzeu@gmail.com>
 * @license https://opensource.org/licenses/BSD-3-Clause BSD 3-Clause License
 * @link https://github.com/jaxon-php/jaxon-core
 */

namespace Jaxon\Laravel;

use Jaxon\Contracts\Container as ContainerContract;

class Container implements ContainerContract
{
    /**
     * Check if a given class is defined in the container
     *
     * @param string                $sClass             A full class name
     *
     * @return bool
     */
    public function has($sClass)
    {
        return app()->bound($sClass);
    }

    /**
     * Get a class instance
     *
     * @param string                $sClass             A full class name
     *
     * @return mixed                The class instance
     */
    public function get($sClass)
    {
        return app()->make($sClass);
    }
}
