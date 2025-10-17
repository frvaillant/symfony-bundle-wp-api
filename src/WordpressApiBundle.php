<?php

namespace Francoisvaillant\WordpressApiBundle;

use Francoisvaillant\WordpressApiBundle\DependencyInjection\WordpressApiExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class WordpressApiBundle extends Bundle
{
    public function getContainerExtension(): ?WordpressApiExtension
    {
        return new WordpressApiExtension();
    }
}
