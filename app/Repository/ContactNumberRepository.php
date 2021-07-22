<?php

namespace App\Repository;

use App\Models\ContactNumber;
use App\Repository\Interfaces\ContactNumberInterface;
use Illuminate\Database\Eloquent\Model;

class ContactNumberRepository implements ContactNumberInterface {

    private $contactNumberModel;

    /**
     * ContactNumberRepository constructor.
     * @param ContactNumber $contactNumberModel
     */
    public function __construct(ContactNumber $contactNumberModel)
    {
        $this->contactNumberModel = $contactNumberModel;
    }

    /**
     * Store Contact Number
     *
     * @param int $contactId
     * @param string $type
     * @param int $number
     * @return Model
     */
    public function store(int $contactId, string $type, int $number) : Model
    {
        return $this->contactNumberModel->create([
            'contact_id' => $contactId,
            'phone_number' => $number,
            'type' => $type
        ]);
    }


}
