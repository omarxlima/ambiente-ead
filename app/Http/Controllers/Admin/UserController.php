<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UploadFile;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $service;
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $users = $this->service->getAll(
            filter: $request->filter ?? ""
        );

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function show($id)
    {
        if (!$user = $this->service->findById($id))
        return back();
        return view('admin.users.show', compact('user'));
    }

    public function store(StoreUserRequest $request)

    {
        $this->service->create($request->validated());
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        if (!$user = $this->service->findById($id))
            return redirect()->back();
        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, $id)
    {

        if (!$this->service->update($id,$request->validated())) {
            return redirect()->back();
        }
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('users.index');
    }

    public function changeImage($id)
    {
        if(!$user = $this->service->findById($id))
        return back();
        return view('admin.users.change-image', compact('user'));
    }

    public function uploadFile(StoreImageRequest $request, UploadFile $uploadFile, $id)
    {
        // dd($request->image);
        $path = $uploadFile->store($request->images, 'users');
        if (!$this->service->update($id, ['images' => $path])) {
            return redirect()->back();
        }
        return redirect()->route('users.index');
    }
}
