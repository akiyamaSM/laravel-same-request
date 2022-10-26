<?php


namespace Inani\UniqueRequest;


class CacheContainer
{
    protected $entries = [];

    public function remember($key, $value)
    {
        if(!array_key_exists($key, $this->entries)){
            $this->entries[$key] = $value();
        }

        return $this->entries[$key];
    }
}
