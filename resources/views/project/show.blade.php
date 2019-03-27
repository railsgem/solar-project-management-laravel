@extends('layouts.vendor')

@section('title', 'Project Detail')
@section('projects-active', 'active')

@section('sidebar')
    @parent
@endsection

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <form id="create_project" class="form-horizontal" action="" method="" novalidate="novalidate" enctype="multipart/form-data">
            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                    <h4 class="card-title">Project Detail</h4>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <label class="col-sm-4 col-form-label">Name</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                                <label class="col-form-label text-primary">{{$project->name}}</label>
                            </div>
                        </div>
                    </div>
                    @foreach($project->project_attributes as $project_attribute)
                    <div class="row">
                        <label class="col-sm-4 col-form-label">{{ $project_attribute->name }}</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                                <label class="col-form-label text-primary">{{ $project_attribute->value }}</label>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="card-footer ml-auto mr-auto">
                    <a href="/projects" class="btn btn-rose">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
