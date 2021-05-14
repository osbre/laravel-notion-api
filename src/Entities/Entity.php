<?php

namespace FiveamCode\LaravelNotionApi\Entities;

use FiveamCode\LaravelNotionApi\Exceptions\WrapperException;
use FiveamCode\LaravelNotionApi\Notion;
use Illuminate\Support\Arr;

class Entity
{
    private string $id;
    private array $raw;
    private Notion $notion;

    public function __construct(Notion $notion = null, array $raw = null)
    {
        $this->notion = $notion;
        $this->setRaw($raw);
    }

    protected function setRaw(array $raw): void
    {
        if (!Arr::exists($raw, 'object')) throw WrapperException::instance("invalid json-array: no object given");
        if (!Arr::exists($raw, 'id')) throw WrapperException::instance("invalid json-array: no id provided");

        $this->raw = $raw;
        $this->id = $raw['id'];
    }


    public function getId()
    {
        return $this->id;
    }

    public function getRaw()
    {
        return $this->raw;
    }
}
