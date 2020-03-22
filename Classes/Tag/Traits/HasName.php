<?php
/**
 * Created by PhpStorm.
 * User: РахимовС
 * Date: 12.03.2020
 * Time: 21:42
 */

namespace Tag\Traits;


trait HasName
{
    protected $name;
    public function getName()
    {
        return strtolower($this->name);
    }

    protected function setName($name)
    {
        $this->name = $name;
        return $this;
    }

}