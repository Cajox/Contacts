<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactRequest;
use App\Services\ContactService;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * @var ContactService
     */
    private $contactService;

    /**
     * ContactController constructor.
     * @param ContactService $contactService
     */
    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    /**
     * Create Contact Page
     *
     * @return View
     */
    public function createContact() : View
    {
        return view('admin.create-contact');
    }

    /**
     * Get all Contacts
     *
     * @return View
     */
    public function getAllContacts() : View
    {
        $contacts = $this->contactService->getAllContacts();
        return view('contacts', compact('contacts'));
    }

    /**
     * Store Contact
     *
     * @param CreateContactRequest $request
     * @return JsonResponse
     */
    public function storeContacts(CreateContactRequest $request) : JsonResponse
    {
        return $this->contactService->storeContacts($request->all());
    }

}
