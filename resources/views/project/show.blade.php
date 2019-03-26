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
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                                <label class="col-form-label text-primary">{{$project->name}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                                <label class="col-form-label text-primary">${{number_format($project->price/100, 2)}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                                <label class="col-form-label text-primary">{{$project->description}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-7">
                            <img src="{{$project->image_path}}">
                        </div>
                    </div>
                </div>
                <div class="card-footer ml-auto mr-auto">
                    <a href="/projects" class="btn btn-rose">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
