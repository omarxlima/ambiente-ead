<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateLessonRequest;
use App\Repositories\{
    LessonRepositoryInterface,
    ModuleRepositoryInterface,
};
use Illuminate\Http\Request;

class LessonController extends Controller
{

    protected $repository;
    protected $repositoryModule;

    public function __construct(
        ModuleRepositoryInterface $repositoryModule,
        LessonRepositoryInterface $repository

        )
    {
        $this->repositoryModule = $repositoryModule;
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $moduleId)
    {
        if (!$module = $this->repositoryModule->findById($moduleId))
            return back();

      $lessons = convertArrayToObject($this->repository->getAllByModuleId($moduleId, $request->filter ?? ''));

      return view('admin.courses.modules.lessons.index-lessons', compact('module', 'lessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($moduleId)
    {
        if (!$module = $this->repositoryModule->findById($moduleId))
        return back();
      return view('admin.courses.modules.lessons.create-lessons', compact('module'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateLessonRequest $request, $moduleId)
    {
        if (!$this->repositoryModule->findById($moduleId))
        return back();

        $this->repository->createByModule($moduleId, $request->only(['name', 'video', 'description']));
        return redirect()->route('lessons.index', $moduleId);
    }

    /**
     * Display the specified resource.
     */
    public function show($moduleId, string $id)
    {
        if (!$module = $this->repositoryModule->findById($moduleId))
        return back();
        if (!$lesson = $this->repository->findById($id))
        return back();
      return view('admin.courses.modules.lessons.show-lessons', compact('module', 'lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($moduleId, string $id)
    {
        if (!$module = $this->repositoryModule->findById($moduleId))
        return back();
        if (!$lesson = $this->repository->findById($id))
        return back();
      return view('admin.courses.modules.lessons.edit-lessons', compact('module', 'lesson'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateLessonRequest $request, $moduleId, string $id)
    {

        if (!$this->repositoryModule->findById($moduleId))
        return back();
        $this->repository->update($id, $request->only(['name', 'video', 'description']));
        return redirect()->route('lessons.index', $moduleId);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($moduleId, string $id)
    {
        $this->repository->delete($id);
        return redirect()->route('lessons.index', $moduleId);
    }
}
