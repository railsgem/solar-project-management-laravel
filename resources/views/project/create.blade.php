@extends('layouts.vendor')

@section('title', 'Create Product')
@section('projects-active', 'active')

@section('sidebar')
    @parent
@endsection

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <form id="create_project" class="form-horizontal" action="{{ url('project/store') }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                    <h4 class="card-title">Create Project</h4>
                    </div>
                </div>
                {{ csrf_field() }}
                <div class="card-body ">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                                <input class="form-control" type="text" name="name" required="true" aria-required="true" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <label class="error">
                                        {{ $errors->first('name') }}
                                    </label>
                                @endif
                            </div>
                        </div>
                    </div>
                    @foreach ($productAttributes as $productAttribute)
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ $productAttribute->frontend_label }}</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group {{ $errors->has('product_attributes[' . $productAttribute->attribute_code .']') ? ' has-danger' : '' }}">
                                <input class="form-control" type="text" name="product_attributes[{{ $productAttribute->attribute_code }}]" required="true" aria-required="true" value="{{ old('product_attributes[' . $productAttribute->attribute_code .']') }}">
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
                    <a href="/projects" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-rose">Save Project</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
