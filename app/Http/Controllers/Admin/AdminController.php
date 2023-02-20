<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ContactExport;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function contactWith($id)
    {
        $data = [
            'data' => Contact::where('type_contact',$id)->paginate(20),
            'type' => $id,
        ];

        return view('admin.contactus.index', $data);
    }


    public function deletedcontactWith(Request $request)
    {
        Contact::destroy($request->id);
        toastr()->success('تم الحذف بنجاح');
        return redirect()->back();
    }


    public function downloadContact($id)
    {
        
        return Excel::download(new ContactExport($id), 'contact.xlsx');

    }
}
