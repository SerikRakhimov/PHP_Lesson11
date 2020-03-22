<?php

namespace Tag;

use Tag\Interfaces\HasAttributesInterface;
use Tag\Traits\CanBeSelfClosing;
use Tag\Traits\HasAttributes;
use Tag\Traits\HasBody;
use Tag\Traits\HasName;


class BaseTag implements HasAttributesInterface
{
    use HasAttributes, HasBody, HasName;

    public function __construct($name, array $attributes = [])
    {
        $this->setName($name);
        $this->setAttribute($attributes);
    }



    public function __toString()
    {
        return $this->getString();
    }

    public function getString()
    {
        return $this->start() . $this->getBody() . $this->end();
    }

    public function start()
    {
        $tag = "<{$this->getName()}";
        foreach ($this->getAttributes() as $key => $attribute) {
            $tag .= " $key";
            if ($attribute != null)
                $tag .= "=\"$attribute\"";
        }
        return $tag . ($this->isSelfClosing() ? " />" : ">");
    }


    public function end()
    {
        if (!$this->isSelfClosing())
            return "</{$this->getName()}>";

        return null;
    }


    public function addClass($class)
    {
        $classes = $this->classesAsArray();

        if (!$this->classExists($class))
            $classes[] = $class;

        $classes = implode(' ', $classes);
        $this->setAttribute('class', $classes);

        return $this;
    }

    public function classesAsArray()
    {
        $classAttr = $this->getAttribute('class');

        if ($classAttr == null)
            return [];

        return explode(' ', $classAttr);
    }


    // ------------ STATIC ------------

    public function classExists($class): bool
    {
        $classes = $this->classesAsArray();
        return in_array($class, $classes);
    }

    public function removeClass($class)
    {
        if ($this->classExists($class)) {
            $classes = $this->classesAsArray();
            $classes = array_diff($classes, [$class]);
            $classes = implode(' ', $classes);
            $this->setAttribute('class', $classes);
        }

        return $this;
    }

    public function appendTo(BaseTag $tag) {
        $tag->appendBody($this);
        return $this;
    }

    public function prependTo(BaseTag $tag) {
        $tag->prependBody($this);
        return $this;
    }

}
