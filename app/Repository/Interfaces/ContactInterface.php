<?php
declare(strict_types=1);

namespace App\Repository\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface ContactInterface{

    public function all(): ?Collection;
    public function create(array $attributes): ?bool;

}
