<?php
/**
 * Created by PhpStorm.
 * User: РахимовС
 * Date: 12.03.2020
 * Time: 20:18
 */

namespace Tag\Interfaces;

use ArrayAccess;

interface HasAttributesInterface extends ArrayAccess
{
    public function setAttribute($key, $value = null);

    public function appendAttribute($key, $value);

    public function prependAttribute($key, $value);

}

