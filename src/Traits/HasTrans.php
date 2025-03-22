<?php

namespace Lopatin96\LaraEnum\Traits;

use function Symfony\Component\String\u;

trait HasTrans
{
    public function label(array $replace = []): ?string
    {
        return $this->trans('label', $replace);
    }

    public function description(array $replace = []): ?string
    {
        return $this->trans('description', $replace);
    }

    private function trans(string $attribute, array $replace = []): ?string
    {
        return trans($this->getKey($attribute), $replace);
    }

    private function getKey(string $attribute): ?string
    {
        return 'enums/'
            . str_replace('_', '-', u(class_basename(__CLASS__))->snake()->toString())
            . '.'
            . $this->value
            . ':'
            . $attribute;
    }
}
