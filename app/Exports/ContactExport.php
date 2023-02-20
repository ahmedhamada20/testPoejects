<?php

namespace App\Exports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;

class ContactExport implements FromCollection
{
    public $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }


    public function collection()
    {
        return Contact::where('type_contact', $this->id)->orderBy('id', 'DESC')->get([
            'name',
            'email',
            'phone',
            'address',
            'subject',
            'notes',
        ]);
    }

    public function headings(): array
    {
        return [
            'الإسم',
            'البريد الالكتروني',
            'رقم الهاتف',
            'العنوان',
            'النشاط',
            'الوصف',
           

        ];
    }
}
