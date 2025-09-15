<?php

namespace Core\Middleware;

class Middleware
{
    public const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class,

    ];

    public static function resolve($key)
    {
        if (!$key) {
            return;
        }
        // If $key is a class name, use it directly. If it's a map key, resolve it.
        $middleware = $key;
        if (array_key_exists($key, static::MAP)) {
            $middleware = static::MAP[$key];
        }
        if (!class_exists($middleware)) {
            throw new \Exception("Middleware class '{$middleware}' not found.");
        }
        (new $middleware)->handle();
    }
}
