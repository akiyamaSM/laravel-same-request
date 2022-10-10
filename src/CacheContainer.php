<?php


namespace Inani\UniqueRequest;


class CacheContainer
{
    protected $entries = [];

    public function remember($key, $value)
    {
        if(!isset($this->entries[$key])){
            $this->entries[$key] = $value();
        }

        return $value;
    }
}
