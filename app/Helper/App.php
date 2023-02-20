<?php

use App\Models\AboutUs;
use App\Models\Ads;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Course;
use App\Models\Discount;
use App\Models\Event;
use App\Models\Exam;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Number;
use App\Models\Packages;
use App\Models\PreviousWork;
use App\Models\SettingSite;


if (!function_exists('getActiveRoutesHome')) {
    function getActiveRoutesHome($route)
    {
        $actives = request()->routeIs($route) ? ' current' : null;
        if(!empty($actives)){
            return $actives;
        }
    }
}
if (!function_exists('settingSite')) {
    function settingSite()
    {
        $data = SettingSite::where('status', 1)->first();
        return $data;
    }
}

if (!function_exists('SliderActive')) {
    function SliderActive()
    {
        $data = Event::where('status', 1)->inRandomOrder()->limit(4)->get();
        return $data;
    }
}

if (!function_exists('CategoryHome')) {
    function CategoryHome()
    {
        $data = Category::where('status', 1)->limit(4)->get();
        return $data;
    }
}

if (!function_exists('courseHome')) {
    function courseHome($categoryId)
    {
        $data = Course::where('status', 1)->where('category_id',$categoryId)->get();
        return $data;
    }
}
if (!function_exists('courseHomePages')) {
    function courseHomePages()
    {
        $data = Course::where('status', 1)->inRandomOrder()->limit(3)->get();
        return $data;
    }
}

if (!function_exists('aboutsActive')) {
    function aboutsActive()
    {
        $data = AboutUs::where('status', 1)->inRandomOrder()->limit(1)->first();
        if (!empty($data)) {
            return $data;
        }
    }
}

if (!function_exists('galleryActive')) {
    function galleryActive()
    {
        $data = Gallery::where('status', 1)->inRandomOrder()->limit(1)->first();
        return $data;
    }
}

if (!function_exists('ProductActive')) {
    function ProductActive()
    {
        $data = \App\Models\Product::where('status', 1)->inRandomOrder()->limit(3)->get();
        return $data;
    }
}

if (!function_exists('AdsActive')) {
    function AdsActive()
    {
        $data = \App\Models\Ads::where('status', 1)->inRandomOrder()->limit(3)->get();
        return $data;
    }
}




if (!function_exists('blogActive')) {
    function blogActive()
    {
        $data = Blog::where('status', 1)->inRandomOrder()->limit(3)->get();
        return $data;
    }
}


if (!function_exists('ProfessorActive')) {
    function ProfessorActive()
    {
        $data = Number::where('status', 1)->inRandomOrder()->limit(4)->get();
        return $data;
    }
}


if (!function_exists('previousWorkActive')) {
    function previousWorkActive()
    {
        $data = PreviousWork::where('status', 1)->inRandomOrder()->limit(5)->get();
        return $data;
    }
}


if (!function_exists('newsActive')) {
    function newsActive()
    {
        $data = News::where('status', 1)->inRandomOrder()->limit(3)->get();
        return $data;
    }
}
if (!function_exists('eventsActive')) {
    function eventsActive()
    {
        $data = Event::where('status', 1)->inRandomOrder()->limit(3)->get();
        return $data;
    }
}
if (!function_exists('alleventsActive')) {
    function alleventsActive()
    {
        $data = Event::where('status', 1)->inRandomOrder()->limit(5)->get();
        return $data;
    }
}


if (!function_exists('PackagesActive')) {
    function PackagesActive()
    {
        $data = Packages::where('status', 1)->inRandomOrder()->limit(6)->get();
        return $data;
    }
}

if (!function_exists('courseActive')) {
    function courseActive()
    {
        $data = Course::where('status', 1)->inRandomOrder()->limit(7)->get();
        return $data;
    }
}

if (!function_exists('AllcourseActive')) {
    function AllcourseActive()
    {
        $data = Course::where('status', 1)->inRandomOrder()->limit(9)->get();
        return $data;
    }
}


if (!function_exists('AllProfessorActive')) {
    function AllProfessorActive()
    {
        $data = Number::where('status', 1)->inRandomOrder()->limit(6)->get();
        return $data;
    }
}


if (!function_exists('aboutusActive')) {
    function aboutusActive()
    {
        $data = AboutUs::where('status', 1)->inRandomOrder()->limit(1)->get();
        return $data;
    }
}

if (!function_exists('blogcountActive')) {
    function blogcountActive()
    {
        $data = Blog::where('status', 1)->inRandomOrder()->limit(2)->get();
        return $data;
    }
}


if (!function_exists('timeExam')) {
    function timeExam($id)
    {
        $time = Exam::findorfail($id);

        if ($time->status == true || $time->time < 0) {
            $time_exists = \Carbon\Carbon::now() + $time->time;
            if ($time_exists) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
}

if (!function_exists('CheckDiscountCode')) {
    function CheckDiscountCode($id_discount, $id_packages)
    {
        $discount = Discount::findOrfail($id_discount);
        if ($discount){
            $check_data = $discount->end_data != null ? (\Carbon\Carbon::now()->between($discount->start_data, $discount->end_data)) ? true : false : true;
            $check_used = $discount->used_coupon != null ? ($discount->use_coupon < $discount->used_coupon) ? true : false : true;
            if (!$check_data || !$check_used) {
                return false;
            } else {

                $packages = Packages::findorfail($id_packages);
                $priceDiscount = ($packages->price * $discount->discount_percentage) / 100;

                if ($priceDiscount < 0) {

                    session()->put('coupon', [
                        'code' => $discount->code,
                        'value' => $discount->discount_percentage,
                        'discount' => $priceDiscount,
                    ]);

                    $discount->update([
                        'used_coupon' => $discount->used_coupon + 1,
                    ]);
                } else {
                    return false;
                }
            }
        }

    }
}
