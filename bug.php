<?php
declare(strict_types = 1);

interface Qwerty
{
    public function abube(\stdClass ...$classes): void;
}

class Root implements Qwerty
{

}

class Qwerty2
{
    /**
     * @var self
     */
    private $value;

    /**
     * @param self $test
     * @return self
     */
    public static function create(self $test): self
    {
        $self = new self();
        $self->
    }

    private function __construct()
    {

    }
}


interface Qwerty3
{
    public function log(array $fields = [], $timestamp = null);
}

class Root implements Qwerty3
{
    public function log(array $fields = [], $timestamp = null)
    {
        // TODO: Implement log() method.
    }

}


class Foo
{
    /**
     * @param null|string $param1
     * @param int|null $param2
     * @param bool|null $param3
     * @param float|null $param4
     * @param array|null $param5
     * @param Foo|null $param6
     */
    public function bar(
        ?string $param1,
        ?int $param2,
        ?bool $param3,
        ?float $param4,
        ?array $param5,
        ?Foo $param6
    ): void
    {

    }
}


interface Qwerty4
{
    /**
     * @return static
     */
    public function abube();
}

class Root2 implements Qwerty4
{
    /**
     * @return static
     */
    public function abube(): self
    {

    }

}
