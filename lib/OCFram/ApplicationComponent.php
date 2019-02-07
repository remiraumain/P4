<?php
/**
 * Created by PhpStorm.
 * User: remiraumain
 * Date: 2019-02-06
 * Time: 15:46
 */

namespace OCFram;

abstract class ApplicationComponent
{
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function app()
    {
        return $this->app;
    }
}