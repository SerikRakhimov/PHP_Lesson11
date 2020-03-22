<?php
namespace Tag;

abstract class NameTag extends BaseTag
{
    protected $name = null;

    public function __construct(array $attributes = [])
    {
        parent::__construct(static::name(), $attributes);
    }

    public static function make(array $atributes = [])
    {
        return new static($atributes);
    }

    abstract protected static function name(): string;
}