@extends('layouts.vendor')

@section('title', 'Edit Project')
@section('projects-active', 'active')

@section('sidebar')
    @parent
@endsection

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <form id="create_project" class="form-horizontal" action="{{ url('projects/update/' . $project->id) }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                    <h4 class="card-title">Edit Project</h4>
                    </div>
                </div>
                {{ csrf_field() }}
                <div class="card-body ">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                            <input class="form-control" type="text" name="name" required="true" aria-required="true" value="{{ $project->name }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ml-auto mr-auto">
                    <a href="/projects" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-rose">Update Project</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
