<?php

declare(strict_types = 1);

namespace PHPFin\Plugins;

interface PluginInterface
{
  public function register(ServiceContainerInterface $container);
}
?>
