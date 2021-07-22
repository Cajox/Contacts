<?php
declare(strict_types=1);

namespace App\Repository\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface ContactNumberInterface{

    public function store(int $contactId, string $type, int $number) : Model;

}
