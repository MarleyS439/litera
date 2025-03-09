<?php

declare(strict_types=1);

namespace Controller;

class OldIndexController
{
    public function index(): void
    {
        include "app/View/oldIndex.php";
    }
}
