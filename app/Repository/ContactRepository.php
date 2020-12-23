<?php

namespace App\Repository;

use App\Models\Contact;
use App\Repository\Interfaces\ContactInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ContactRepository implements ContactInterface {

    private $contactModel;

    public function __construct(Contact $contactModel)
    {
        $this->contactModel = $contactModel;
    }

    public function all(): ?Collection
    {
        // TODO: Implement all() method.
    }

    public function create(array $attributes): ?Model
    {
        return $this->contactModel->create($attributes);


    }


}
