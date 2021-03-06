<?php
namespace Aura\Filter\Rule;

class FakeStrlenIconv extends AbstractStrlen
{
    protected function mbstring()
    {
        return false;
    }

    public function strlen($str)
    {
        return parent::strlen($str);
    }

    public function substr($str, $start, $length = null)
    {
        return parent::substr($str, $start, $length);
    }

    public function strpad($input, $length, $pad_str = ' ', $type = STR_PAD_RIGHT)
    {
        return parent::strpad($input, $length, $pad_str, $type);
    }
}
