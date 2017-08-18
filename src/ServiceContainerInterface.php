<<?php
declare(strict_types=1);
namespace PHPFin;


interface ServiceContainerInterface
{
  public function add(string $name, $service);

  public function addLazy(string $name, $callable);

  public function get(string $name);

  public function has(string $name);
}
