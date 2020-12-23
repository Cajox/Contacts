<?php

namespace App\Repository;

use App\Models\ContactNumber;
use App\Repository\Interfaces\ContactNumberInterface;
use Illuminate\Database\Eloquent\Model;

class ContactNumberRepository implements ContactNumberInterface {

    //TODO: impelemnt interface

    private $contactNumberModel;

    public function __construct(ContactNumber $contactNumberModel)
    {
        $this->contactNumberModel = $contactNumberModel;
    }


    public function create($contact_id, $type, $number): ?Model
    {
        return $this->contactNumberModel->create([
            'contact_id' => $contact_id,
            'phone_number' => $number,
            'type' => $type
        ]);
    }


}
