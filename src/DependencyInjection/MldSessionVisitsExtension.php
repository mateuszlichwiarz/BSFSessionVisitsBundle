<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

final class MldSessionVisitsExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(paths:__DIR__ . '/../../config'),
        );

        $loader->load(resource:'services.yaml');
    }
}