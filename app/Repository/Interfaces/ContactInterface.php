<?php
declare(strict_types=1);

namespace App\Repository\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


interface ContactInterface{

    public function all(): ?Collection;
    public function create(array $attributes): ?Model;

}
