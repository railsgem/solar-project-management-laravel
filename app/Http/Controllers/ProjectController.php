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
        $projects = Project::sortable(['id' => 'desc'])->paginate(10);
        return view('project.list', ['projects' => $projects]);
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
     * Store a newly created resource in storage.
     *
     * @param ProjectPost $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectPost $request)
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
            return redirect()->action('ProjectController@index')->with('message', 'Project Create Successfully.');
        } catch (Exception $e) {
            return redirect()->action('ProjectController@index')->with('error', $e->getMessage());
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('project.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectUpdate $request, $id)
    {
        try {
            $project = Project::where('id', $id)->first();
            $project->name = $request->name;
            $project->save();
            return redirect()->action('ProjectController@index')->with('message', 'Project Update Successfully.');
        } catch (Exception $e) {
            return redirect()->action('ProjectController@index')->with('error', $e->getMessage());
        }
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
            return redirect()->action('ProjectController@index')->with('message', 'Item Delete Successfully.');
        } catch (Exception $e) {
            return redirect()->action('ProjectController@index')->with('error', $e->getMessage());
        }
    }
}
