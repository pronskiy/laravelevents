<?php

use League\Flysystem\Adapter\NullAdapter;

class ProfileCest
{


    /**
     * ProfileCest constructor.
     * @return \League\Flysystem\Adapter\NullAdapter
     */
    public function __construct()
    {
        return new NullAdapter();
    }
}
