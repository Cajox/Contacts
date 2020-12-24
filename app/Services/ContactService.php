<?php

namespace App\Services;

use App\Repository\ContactNumberRepository;
use App\Repository\ContactRepository;
use Illuminate\Support\Facades\DB;
use Exception;


class ContactService{

    /**
     * @var ContactRepository
     */
    private $contactRepository;
    /**
     * @var ContactNumberRepository
     */
    private $contactNumberRepository;

    public function __construct(ContactRepository $contactRepository, ContactNumberRepository $contactNumberRepository)
    {
        $this->contactRepository = $contactRepository;
        $this->contactNumberRepository = $contactNumberRepository;
    }

    public function getAllContacts()
    {
        return $this->contactRepository->all();
    }

    public function createContacts($attributes)
    {
        DB::beginTransaction();

        try {

            foreach ($attributes['contacts'] as $attribute) {

               $contact = $this->contactRepository->create($attribute);

               if (array_key_exists('phones', $attribute)){

                   foreach ($attribute['phones'] as $phone){

                       $this->contactNumberRepository->create($contact->id, $phone['type'] , $phone['number']);

                   }

               }

            }

            DB::commit();

            return true;

        } catch (Exception $e) {

            DB::rollback();

            return response(["error" => $e->getMessage()]);

        }

    }


}
