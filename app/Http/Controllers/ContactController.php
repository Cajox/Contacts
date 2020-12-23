<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactRequest;
use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * @var ContactService
     */
    private $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function getAllContacts()
    {

    }

    public function createContact(Request $request)
    {
        return $this->contactService->createContacts($request->all());
    }

}
