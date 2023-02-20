<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('front.index');
    }

    public function aboutWebsite()
    {
        return view('front.aboutus.index');
    }

    public function blogs()
    {
        return view('front.blogs.index');
    }

    public function gallerys()
    {
        return view('front.galley.index');
    }

    public function contactus()
    {
        return view('front.contact.index');
    }

    public function blogsDetails($id)
    {
        $blog = Blog::where('name->ar', str_replace('-', ' ', $id))->first();
        $data = Blog::findorfail($blog->id);
        return view('front.blogs.details', compact('data'));
    }

    public function product($id)
    {
        $ids = Category::where('name->ar', str_replace('-', ' ', $id))->first();
        $data = Course::where('category_id', $ids->id)->get();
        $category = Category::findorfail($ids->id);
        return view('front.product.index', compact('data', 'category'));
    }

    public function productsDetails($id)
    {
        $data = Course::where('name->ar', str_replace('-', ' ', $id))->first();
        return view('front.product.details', compact('data'));
    }

    public function sendContact(Request $request)
    {


        $request->validate([
            'name' => auth()->check() ? '' : 'required',
            'phone' => auth()->check() ? '' : 'required|numeric',


            'g-recaptcha-response' => 'required|captcha',
        ], [

            'phone.numeric' => 'يجب ادخال ارقام فقط ',
            'g-recaptcha-response.required' => 'يجب تحديد انك ليس روبرت',
            'g-recaptcha-response.captcha' => 'يجب تحديد انك ليس روبرت',

        ]);

        try {
            Contact::create([
                'name' => auth()->check() ? auth()->user()->name : $request->name,
                'email' => auth()->check() ? auth()->user()->email : $request->email,
                'phone' => $request->phone ?? null,
                'address' => $request->address ?? null,
                'subject' => $request->subject ?? null,
                'notes' => $request->notes ?? null,
                'type_contact' => $request->type_contact
            ]);
   
            return redirect()->back()->with(['success' => 'تم تجسيل بيانات بنجاح وسيتم التواصل معاك في اقرب وقت']);
        } catch (\Exception $e) {
           
            return redirect()->back()->withErrors(['error' => 'هناك خطأ ما حدث برجاء المحاوله مره اخري']);
        }
    }
}
