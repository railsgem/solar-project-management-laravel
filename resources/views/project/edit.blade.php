@extends('layouts.app', ['title' => __('User Management')])

@section('projects-active', 'active')
@section('content')
@include('project.partials.header', ['title' => __('Edit Project')])

<div class="container-fluid mt--7">
    <div class="col-md-12">
        <form method="post" action="{{ route('project.update', $project) }}" autocomplete="off">
            @csrf
            @method('put')
        {{-- <form id="create_project" class="form-horizontal" action="{{ url('project/update/' . $project->id) }}" method="POST" novalidate="novalidate" enctype="multipart/form-data"> --}}
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
                    @foreach ($productAttributes as $productAttribute)
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ $productAttribute->frontend_label }}</label>
                            <div class="col-sm-7">
                                <div class="form-group bmd-form-group {{ $errors->has('product_attributes[' . $productAttribute->attribute_code .']') ? ' has-danger' : '' }}">
                                    <input class="form-control" type="text" name="product_attributes[{{ $productAttribute->attribute_code }}]" required="true" aria-required="true" value="{{ $attributes[$productAttribute->attribute_code]}}">
                                    @if ($errors->has('product_attributes[' . $productAttribute->attribute_code .']'))
                                        <label class="error">
                                            {{ $errors->first('product_attributes[' . $productAttribute->attribute_code .']') }}
                                        </label>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer ml-auto mr-auto">
                    <a href="/project" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-rose">Update Project</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
