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
        return $this->contactRepository->create($attributes['contacts']);
    }


}
