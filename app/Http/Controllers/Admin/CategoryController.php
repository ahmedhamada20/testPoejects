<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\CategoryImport;
use App\Models\Photo;
use App\Models\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:show-category', ['only' => 'index', 'show']);
        $this->middleware('permission:create-category', ['only' => 'create', 'store']);
        $this->middleware('permission:edit-category', ['only' => 'edit', 'update']);
        $this->middleware('permission:deleted-category', ['only' => 'destroy']);
    }

    protected $data = [
        'folder' => 'admin.',
        'Models' => 'App\Models\Category',
        'route' => 'category',
        'folderBlade' => 'category',
        'folderImage' => 'category',
        'fileName' => 'test'
    ];

    public function index()
    {
        $data = [
            'data' => $this->data['Models']::query()
                ->when(\request()->keyword != null, function ($query) {
                    $query->search(\request()->keyword);
                })
                ->when(\request()->status != null, function ($query) {
                    $query->whereStatus(\request()->status);
                })
                ->paginate(\request()->paginate ?? 10),
        ];
        return view($this->data['folder'] . $this->data['folderBlade'] . '.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->data['folder'] . $this->data['folderBlade'] . '.create');
    }

    public function import_category(Request $request)
    {
        $file = $request->file('filename');
        Excel::toArray(new CategoryImport);
        toastr()->success('تم الحفظ بنجاح');
        return redirect($this->data['route']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $this->data['Models']::create([
            'name' => ['ar' => $request->name, 'en' => $request->name_en],
            'notes' => ['ar' => $request->notes, 'en' => $request->notes_en],
            'status' => $request->status,


        ]);


        Seo::UpdateOrcreate([
            'seoable_type' => $this->data['Models'],
            'seoable_id' => $data->id,
        ], [
            'seoable_type' => $this->data['Models'],
            'seoable_id' => $data->id,
            'notes' => $request->seo
        ]);


        if ($file = $request->file('cover')) {
            $file_name = $file->getClientOriginalName();
            $file_name_Extension = $request->file('cover')->getClientOriginalExtension();
            $file_to_store = time() . '_' . explode('.', $file_name)[0] . '_.' . $file_name_Extension;

            if ($file->move('admin/pictures/' . $this->data['folderBlade'] . '/' . $data->id, $file_to_store)) {
                Photo::create([
                    'Filename' => $file_to_store,
                    'photoable_id' => $data->id,
                    'photoable_type' => $this->data['Models'],
                ]);
            }
        }



        toastr()->success('تم الحفظ بنجاح');
        return redirect($this->data['route']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'data' => $this->data['Models']::findorfail($id),
        ];
        return view($this->data['folder'] . $this->data['folderBlade'] . '.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $this->data['Models']::findorfail($request->id);
        $data->update([
            'name' => ['ar' => $request->name, 'en' => $request->name_en],
            'notes' => ['ar' => $request->notes, 'en' => $request->notes_en],

        ]);

        Seo::UpdateOrcreate([
            'seoable_type' => $this->data['Models'],
            'seoable_id' => $data->id,
        ], [
            'seoable_type' => $this->data['Models'],
            'seoable_id' => $data->id,
            'notes' => $request->seo
        ]);

        // Inset One Photo

        if ($file = $request->file('cover')) {
            File::delete(public_path('admin/pictures/' . $this->data['folderBlade'] . '/' . $request->id . '/' . $request->oldfile));
            $file_name = $file->getClientOriginalName();
            $file_name_Extension = $request->file('cover')->getClientOriginalExtension();
            $file_to_store = time() . '_' . explode('.', $file_name)[0] . '_.' . $file_name_Extension;
            if ($file->move('admin/pictures/' . $this->data['folderBlade'] . '/' . $request->id, $file_to_store)) {
                Photo::updateOrCreate([
                    'photoable_id' => $request->id,
                    'photoable_type' => $this->data['Models'],
                ], [
                    'Filename' => $file_to_store,
                    'photoable_id' => $data->id,
                    'photoable_type' => $this->data['Models'],
                ]);
            }
        }



        toastr()->success('تم التحديث بنجاح');
        return redirect($this->data['route']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */


    public function destroy(Request $request)
    {
        $this->data['Models']::destroy($request->id);
        if ($request->oldfile) {
            File::delete(public_path('admin/pictures/' . $this->data['folderBlade'] . '/' . $request->id . '/' . $request->oldfile));
            Photo::where('photoable_id', $request->id)->where('photoable_type', $this->data['Models'])->delete();
        }
        toastr()->success('Done Deleted Successfully');
        return redirect($this->data['route']);
    }




    public function changeStatus(Request $request)
    {

        $data = $this->data['Models']::findorfail($request->user_id);
        $data->status = $request->status;
        $data->save();

        return true;
    }
}
