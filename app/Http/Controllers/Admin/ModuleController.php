<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateModuleRequest;
use App\Repositories\{
    CourseRepositoryInterface,
    ModuleRepositoryInterface,
};
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    protected $repository;
    protected $repositoryCourse;

    public function __construct(
        CourseRepositoryInterface $repositoryCourse,
        ModuleRepositoryInterface $repository

        )
    {
        $this->repositoryCourse = $repositoryCourse;
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index($courseId)
    {
        if (!$course = $this->repositoryCourse->findById($courseId))
            return back();

      $modules = convertArrayToObject($this->repository->getAllByCourseId($courseId));

      return view('admin.courses.modules.index-modules', compact('course', 'modules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($courseId)
    {
        if (!$course = $this->repositoryCourse->findById($courseId))
        return back();
      return view('admin.courses.modules.create-modules', compact('course'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateModuleRequest $request, $courseId)
    {
        if (!$course = $this->repositoryCourse->findById($courseId))
        return back();

        $this->repository->createByCourse($courseId, $request->only(['name']));
        return redirect()->route('modules.index', $courseId);

    }

    /**
     * Display the specified resource.
     */
    public function show($courseId, string $id)
    {
        if (!$course = $this->repositoryCourse->findById($courseId))
        return back();
        if (!$module = $this->repository->findById($id))
        return back();
      return view('admin.courses.modules.show-modules', compact('course', 'module'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($courseId,string $id)
    {
        if (!$course = $this->repositoryCourse->findById($courseId))
        return back();
        if (!$module = $this->repository->findById($id))
        return back();
      return view('admin.courses.modules.edit-modules', compact('course', 'module'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateModuleRequest $request, $courseId,string $id)
    {
        if (!$course = $this->repositoryCourse->findById($courseId))
        return back();
        $this->repository->update($id, $request->only('name'));
        return redirect()->route('modules.index', $courseId);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($courseId, string $id)
    {
        $this->repository->delete($id);
        return redirect()->route('modules.index', $courseId);
    }
}
