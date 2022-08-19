<?php

namespace Framework\View;

use Framework\View\Engine\Engine;

class View
{
    public function __construct(
        Engine $engine,
        string $path,
        array $data = []
    ) {
        $this->engine = $engine;
        $this->path = $path;
        $this->data = $data;
    }

    public function __toString()
    {
        return $this->engine->render($this);
    }
}
