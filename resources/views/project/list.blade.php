@extends('layouts.vendor')

@section('title', 'Project List')
@section('projects-active', 'active')

@section('sidebar')
    @parent
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Project Table</h4>
            <p class="card-category"> a list of projects</p>
            <a href="/project/create" class="btn btn-round btn-info">
                <i class="material-icons">library_add</i> Add Project
            </a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <tr>
                    <th>
                        @sortablelink('name')
                    </th>
                    <th>
                        Actions
                    </th>
                    </tr>
                </thead>
                <tbody>

                @foreach($projects as $project)
                  <tr>
                    <td>
                        <a class="" href="{{'/projects/show/' . $project->id}}">{{$project->name}}</a>
                    </td>
                    <td class="center">
                        <a href="#" id="{{$project->id}}"
                            class="deleteModal" data-toggle="modal"
                            data-target="#deleteModal{{$project->id}}"><i class="material-icons">delete</i>
                        </a>
                        <a href="{{ url('projects/edit/' . $project->id)}}">
                            <i class="material-icons">create</i>
                        </a>
                    </td>
                    @include('project.delete')
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        {{ $projects->appends(\Request::except('_token'))->render() }}
      </div>
    </div>
  </div>
@endsection
