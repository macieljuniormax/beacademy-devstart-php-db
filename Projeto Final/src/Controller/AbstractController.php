<?php

declare(strict_types=1);

namespace App\Controller;

abstract class AbstractController
{
  public function render($viewName): void
  {
    include dirname(__DIR__) . "/View/{$viewName}.php";
  }
}
