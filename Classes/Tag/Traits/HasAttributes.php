<?php
/**
 * Created by PhpStorm.
 * User: РахимовС
 * Date: 12.03.2020
 * Time: 21:27
 */

namespace Tag\Traits;


trait HasAttributes
{
    protected $attributes = [];

    public function setAttribute($key, $value = null)
    {

        if (is_array($key)) {
            foreach ($key as $k => $v) {
                $this->setAttribute($k, $v);
            }
        } else {
            $this->attributes[$key] = $value;
        }
        return $this;
    }
    public function __call($name, $arguments)
    {
        return $this->setAttribute($name, $arguments[0] ?? null);
    }

    protected function getAttributes()
    {
        return $this->attributes;
    }

    public function appendAttribute($key, $value)
    {
        return $this->setAttribute($key, $this->getAttribute($key) . $value);
    }

    // -------- CLASS ATTRIBUTE -----------

    protected function getAttribute($key)
    {
        return $this->attributes[$key] ?? null;
    }

    public function prependAttribute($key, $value)
    {
        return $this->setAttribute($key, $value . $this->getAttribute($key));
    }
    public function offsetExists($offset)
    {
        return isset($this->attributes[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->getAttribute($offset) ?? null;
    }

    public function offsetSet($offset, $value)
    {
        $this->setAttribute($offset, $value);

    }

    public function offsetUnset($offset)
    {
        unset($this->attributes[$offset]);
    }






}