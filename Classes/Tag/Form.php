<?php

namespace Tag;

use Tag;

/**
 * Class Form
 * @method self method($value)
 * @method self action($value)
 */
class Form extends NamedTag
{
    protected static function name(): string
    {
        return 'form';
    }

    public static function input($name, $type = 'text', $value = null) {
        $attributes = [
            'name' => $name,
            'type' => $type
        ];
        if ($value)
            $attributes['value'] = $value;

        return Tag::input($attributes);
    }

    public static function label($text, $for = null) {
        $label = Tag::label()->appendBody($text);

        if ($for != null)
            $label->setAttribute('for', $for);

        return $label;
    }

    public static function password($name, $value = null) {
        return static::input($name, 'password', $value);
    }

    public static function file($name, $value = null) {
        return static::input($name, 'file', $value);
    }

    public static function textarea($name, $body = null) {
        $textarea = Tag::textarea();
        $textarea->name($name);

        if ($body)
            $textarea->appendBody($body);

        return $textarea;
    }

}
