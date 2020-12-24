<?php
declare(strict_types=1);

namespace App\Repository\Interfaces;

use Illuminate\Database\Eloquent\Model;


interface ContactNumberInterface{

    public function store(int $contact_id, string $number, string $type): ?Model;

}
