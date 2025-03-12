<?php

namespace App\Livewire\Forms;

use App\Exports\ContactsExport;
use App\Models\Contact;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Maatwebsite\Excel\Facades\Excel;
use Storage;

class ContactForm extends Form
{
    public ?Contact $contact;
    #[Validate('required|min:3|max:3')]
    public $type_code;
    #[Validate('required|numeric|digits_between:8,11|unique:contacts')]
    public $code = '';
    #[Validate('required')]
    public $first_name = '';
    #[Validate('required')]
    public $last_name = '';
    #[Validate('')]
    public $date_brinday = '2025-01-01';
    #[Validate('')]
    public $phone = '';
    #[Validate('email')]
    public $email = '';
    #[Validate('')]
    public $address = '';
    public $isActive = false;
    public function setContact(Contact $contact)
    {
        $this->contact = $contact;
        $this->type_code = $contact->type_code;
        $this->code = $contact->code;
        $this->first_name = $contact->first_name;
        $this->last_name = $contact->last_name;
        $this->date_brinday = $contact->date_brinday;
        $this->phone = $contact->phone;
        $this->email = $contact->email;
        $this->address = $contact->address;
    }
    public function store()
    {
        $this->validate();
        try {
            Contact::create([
                'type_code' => $this->type_code,
                'code' => $this->code,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'date_brinday' => $this->date_brinday,
                'phone' => $this->phone,
                'email' => $this->email,
                'address' => $this->address,
            ]);
            infoLog('Contact store', $this->code);
            return true;
        } catch (\Exception $e) {
            errorLog('Contact store', $e);
            return false;
        }
    }
    public function update()
    {
        try {
            $this->contact->update([
                'type_code' => $this->type_code,
                'code' => $this->code,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'date_brinday' => $this->date_brinday,
                'phone' => $this->phone,
                'email' => $this->email,
                'address' => $this->address,
            ]);
            infoLog('Contact update', $this->code);
            return true;
        } catch (\Exception $e) {
            errorLog('Contact update', $e);
            return false;
        }
    }
    public function destroy($id)
    {
        try {
            $contact = Contact::find($id);
            $contact->delete();
            infoLog('Contact deleted', $contact->code);
            return true;
        } catch (\Exception $e) {
            errorLog('Contact deleted', $e);
            return false;
        }
    }
    public function estado($id)
    {
        try {
            $contact = Contact::find($id);
            $contact->isActive = !$contact->isActive;
            $contact->save();
            infoLog('Contact estado ' . $contact->isActive, $contact->code);
            return true;
        } catch (\Exception $e) {
            errorLog('Contact estado', $e);
            return false;
        }
    }
    public function export()
    {
        return Excel::download(new ContactsExport, 'contacts.xlsx');
    }
}
