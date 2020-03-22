<?php
/**
 * Created by PhpStorm.
 * User: РахимовС
 * Date: 12.03.2020
 * Time: 21:33
 */

namespace Tag\Traits;


trait HasBody
{
    protected $body;

    use CanBeSelfClosing;
    public function appendBody($body)
    {
        if (is_array($body)) {
            foreach ($body as $item) {
                $this->appendBody($item);
            }
        } else {
            $this->body[] = $body;
        }

        return $this;
    }

    protected function setBody($body)
    {
        $this->body = is_array($body) ? $body : [$body];
        return $this;
    }

    public function getBody()
    {
//        if (!$this->isSelfClosing())
//            return implode($this->body ?? []);
//
//        return null;
        $body = implode($this->body ?? []);
//        if (!method_exists($this, 'isSelfClosing')
//            or !$this->isSelfClosing()) {
//            return $body;
            if (!$this->isSelfClosing()) {
                return $body;

            return null;
        }
    }

    public function prependBody($body)
    {
        if (is_array($body)) {
            foreach (array_reverse($body) as $item) {
                $this->prependBody($item);
            }
        } else {
            array_unshift($this->body, $body);
        }
        return $this;
    }


}