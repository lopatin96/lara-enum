<?php

namespace Lopatin96\LaraEnum\Traits;

use function Symfony\Component\String\u;
use BadMethodCallException;

trait HasTrans
{
    public function __call(string $name, array $arguments): mixed
    {
        if (str_starts_with($name, 'get')) {
            $class = str_replace('_', '-', u(class_basename(__CLASS__))->snake()->toString());
            $suffixes = [
                'Local' => fn($key) => trans("lara-enum.$class.$key.$this->value", $arguments),
                'Property' => fn($key) => config("lara-enum.$class.$key.$this->value")
            ];

            foreach ($suffixes as $suffix => $resolver) {
                if (str_ends_with($name, $suffix)) {
                    $key = lcfirst(substr($name, 3, -strlen($suffix)));
                    $result = $resolver($key);

                    return $result ?? throw new BadMethodCallException("The method $name is not found.");
                }
            }
        }

        throw new BadMethodCallException("The method $name is not found.");
    }
}
