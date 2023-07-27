<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Services\AdminService;
use App\Services\UploadFile;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $service;
    public function __construct(AdminService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $admins = $this->service->getAll(
            filter: $request->filter ?? ""
        );

        return view('admin.admins.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.admins.create');
    }

    public function show($id)
    {
        if (!$admin = $this->service->findById($id))
        return back();
        return view('admin.admins.show', compact('admin'));
    }

    public function store(StoreAdminRequest $request)

    {
        $this->service->create($request->validated());
        return redirect()->route('admins.index');
    }

    public function edit($id)
    {
        if (!$admin = $this->service->findById($id))
            return redirect()->back();
        return view('admin.admins.edit', compact('admin'));
    }

    public function update(UpdateAdminRequest $request, $id)
    {

        if (!$this->service->update($id,$request->validated())) {
            return redirect()->back();
        }
        return redirect()->route('admins.index');
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('admins.index');
    }

    public function changeImage($id)
    {
        if(!$admin = $this->service->findById($id))
        return back();
        return view('admin.admins.change-image', compact('admin'));
    }

    public function uploadFile(StoreImageRequest $request, UploadFile $uploadFile, $id)
    {
        // dd($request->image);
        $path = $uploadFile->store($request->images, 'admins');
        if (!$this->service->update($id, ['images' => $path])) {
            return redirect()->back();
        }
        return redirect()->route('admins.index');
    }
}
