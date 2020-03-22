<?php
/**
 * Created by PhpStorm.
 * User: РахимовС
 * Date: 12.03.2020
 * Time: 21:40
 */

namespace Tag\Traits;


trait CanBeSelfClosing
{

    protected static $SELF_CLOSING = [
        'area', 'base', 'br', 'embed', 'hr', 'iframe', 'img', 'input',
        'link', 'meta', 'param', 'source', 'track'
    ];

    public function isSelfClosing()
    {
        return in_array($this->getName(), self::$SELF_CLOSING);
    }



}