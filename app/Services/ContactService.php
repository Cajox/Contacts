<?php

namespace App\Services;

use App\Repository\ContactRepository;

class ContactService{

    /**
     * @var ContactRepository
     */
    private $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function getAllContacts()
    {

    }

    public function createContacts($attributes)
    {
        foreach ($attributes['contacts'] as $attribute)
        {
           $contact = $this->contactRepository->create($attribute);

        }

        return true;

    }


}
