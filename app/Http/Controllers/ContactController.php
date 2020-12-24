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

    public function createContact()
    {
        return view('admin.index');
    }

    public function getAllContacts()
    {
        $contacts = $this->contactService->getAllContacts();

        return view('contacts', compact('contacts'));

    }

    public function storeContacts(CreateContactRequest $request)
    {
        return $this->contactService->storeContacts($request->all());
    }

}
