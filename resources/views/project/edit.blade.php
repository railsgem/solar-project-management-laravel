@extends('layouts.app', ['title' => __('User Management')])

@section('projects-active', 'active')
@section('content')
@include('project.partials.header', ['title' => __('Edit Project')])

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Project Management') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('project.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('project.update', $project) }}" autocomplete="off">
                        @csrf
                        @method('put')
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
                        <div class="text-center">
                            <a href="/project" class="btn btn-default">Back</a>
                            <button type="submit" class="btn btn-success">Update Project</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@include('layouts.footers.auth')
</div>
@endsection
