@extends('layouts.app', ['title' => __('User Management')])

@section('projects-active', 'active')
@section('content')
@include('project.partials.header', ['title' => __('Create Project')])

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
                    <form method="post" action="{{ route('project.store') }}" autocomplete="off">
                    @csrf
                        <h6 class="heading-small text-muted mb-4">{{ __('Project information') }}</h6>
                        <div class="pl-lg-4">
                            <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                <input type="text" name="name" id="input-name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            @foreach ($productAttributes as $productAttribute)
                                <div class="form-group{{ $errors->has('product_attributes[' . $productAttribute->attribute_code .']') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __($productAttribute->frontend_label) }}</label>
                                    <input class="form-control form-control-alternative {{ $errors->has('product_attributes[' . $productAttribute->attribute_code .']') ? ' is-invalid' : '' }}" type="text" name="product_attributes[{{ $productAttribute->attribute_code }}]" placeholder="{{ __($productAttribute->frontend_label) }}" value="{{ old('product_attributes[' . $productAttribute->attribute_code .']') }}" autofocus>
                                    @if ($errors->has('product_attributes[' . $productAttribute->attribute_code .']'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('product_attributes[' . $productAttribute->attribute_code .']') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            @endforeach

                            <div class="text-center">
                                <a href="/project" class="btn btn-default mt-4">Back</a>
                                <button type="submit" class="btn btn-success mt-4">Save Project</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footers.auth')
</div>
@endsection