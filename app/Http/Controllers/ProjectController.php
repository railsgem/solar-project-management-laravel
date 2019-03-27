<?php

namespace App\Http\Controllers;

use App\EavAttribute;
use App\Project;
use App\ProjectAttribute;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectPost;
use App\Http\Requests\ProjectUpdate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Config;

class ProjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $projects = Project::with('user')->where('user_id', $user_id)->sortable(['id' => 'desc'])->paginate(10);
        return view('project.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productAttributes = EavAttribute::where('eav_entity_id', 1)->get();
        return view('project.create', ['productAttributes' => $productAttributes]);
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\Project  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProjectPost $request, Project $model)
    {
        $user_id = Auth::id();
        $product_attributes = $request['product_attributes'];

        try {
            $project = Project::create(
                [
                    'user_id' => $user_id,
                    'name' => $request['name']
                ]
            );
            foreach ($product_attributes as $key => $value) {
                ProjectAttribute::create(
                    [
                        'project_id' => $project['id'],
                        'name' => $key,
                        'value' => $value,
                        ]
                );
            }
            return redirect()->route('project.index')->withStatus(__('User successfully created.'));
        } catch (Exception $e) {
            return redirect()->route('project.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::with('project_attributes')->findOrFail($id);
        return view('project.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\Project  $project
     * @return \Illuminate\View\View
     */
    public function edit(Project $project)
    {
        return view('project.edit', compact('project'));
    }

    /**
     * Update the specified project in storage
     *
     * @param  \App\Http\Requests\ProjectUpdate  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProjectUpdate $request, Project  $project)
    {
        $project->update(
            $request->all()
        );

        return redirect()->route('project.index')->withStatus(__('Project successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $project = Project::where('id', $id)->first();
            $project->delete();
            return redirect()->route('project.index')->withStatus(__('User successfully deleted.'));
        } catch (Exception $e) {
            return redirect()->action('ProjectController@index')->with('error', $e->getMessage());
        }
    }
}
