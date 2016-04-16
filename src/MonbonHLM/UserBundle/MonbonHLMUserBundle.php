<?php

namespace MonbonHLM\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MonbonHLMUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
