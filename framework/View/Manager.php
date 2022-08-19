<?php

namespace Framework\View;

use Closure;
use Exception;
use Framework\View\Engine\Engine;

class Manager
{
    protected array $paths = [];
    protected array $engines = [];
    protected array $macros = [];

    public function addPath(string $path): self
    {
        array_push($this->paths, $path);
        return $this;
    }
    public function addMacro(string $name, Closure $closure)
    {
        $this->macros[$name] = $closure;
        return $this;
    }
    public function useMacro(string $name, ...$values)
    {
        if (isset($this->macros[$name])) {
            // we bind the closure so that $this
            // inside a macro refers to the view object
            // which means $data and $path can be used
            // and you can get back to the $engine...
            $bound = $this->macros[$name]->bindTo($this);
            return $bound(...$values);
        }
        throw new Exception("Macro isn't defined: '{$name}'");
    }
    public function addEngine(string $extension, Engine $engine): self
    {
        $this->engines[$extension] = $engine;
        $this->engines[$extension]->setManager($this);
        return $this;
    }
    public function render(string $template, array $data = []): string
    {
        foreach ($this->engines as $extension => $engine) {
            foreach ($this->paths as $path) {
                $file = "{$path}/{$template}.{$extension}";
                if (is_file($file)) {
                    return $engine->render($file, $data);
                }
            }
        }
        throw new Exception("Could not render '{$template}'");
    }

    public function resolve(string $template, array $data = []): View
    {
        foreach ($this->engines as $extension => $engine) {
            foreach ($this->paths as $path) {
                $file = "{$path}/{$template}.{$extension}";

                if (is_file($file)) {
                    return new View($engine, realpath($file), $data);
                }
            }
        }
        throw new Exception("Could not resolve '{$template}'");
    }
}
