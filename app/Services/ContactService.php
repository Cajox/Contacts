<?php

namespace App\Services;

use App\Repository\ContactNumberRepository;
use App\Repository\ContactRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
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

    /**
     * ContactService constructor.
     * @param ContactRepository $contactRepository
     * @param ContactNumberRepository $contactNumberRepository
     */
    public function __construct(ContactRepository $contactRepository, ContactNumberRepository $contactNumberRepository)
    {
        $this->contactRepository = $contactRepository;
        $this->contactNumberRepository = $contactNumberRepository;
    }

    /**
     * Get all Contacts
     *
     * @return Collection
     */
    public function getAllContacts() : Collection
    {
        return $this->contactRepository->all();
    }

    /**
     * Store Contacts
     *
     * @param array $attributes
     * @return JsonResponse
     */
    public function storeContacts(array $attributes) : JsonResponse
    {
        DB::beginTransaction();

        try {
            if (isset($attributes)){
                foreach ($attributes['contacts'] as $attribute) {
                    $contact = $this->contactRepository->store($attribute);

                    if (array_key_exists('phones', $attribute)){
                        foreach ($attribute['phones'] as $phone){
                            $this->contactNumberRepository->store($contact->id, $phone['type'] , $phone['number']);
                        }
                    }
                }

                DB::commit();
                return response()->json(null, 201);
            }
            return response()->json(["No content"], 204);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(["error" => $e->getMessage()]);
        }
    }
}
