<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function store(Request $request, $courseId)
    {
        if (!$course = $this->repositoryCourse->findById($courseId))
        return back();

        $this->repository->createByCourse($courseId, $request->only(['name']));
        return redirect()->route('modules.index', $courseId);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
