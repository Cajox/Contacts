<?php

namespace App\Repository;

use App\Models\Contact;
use App\Repository\Interfaces\ContactInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ContactRepository implements ContactInterface {

    private $contactModel;

    /**
     * ContactRepository constructor.
     * @param Contact $contactModel
     */
    public function __construct(Contact $contactModel)
    {
        $this->contactModel = $contactModel;
    }

    /**
     * Get all Contacts
     *
     * @return Collection
     */
    public function all() : Collection
    {
        return $this->contactModel->all();
    }

    /**
     * Store Contact
     *
     * @param array $attributes
     * @return Model
     */
    public function store(array $attributes) : Model
    {
        return $this->contactModel->create([
            'first_name' => $attributes['first_name'],
            'last_name' => $attributes['last_name']
        ]);
    }


}
