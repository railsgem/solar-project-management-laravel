@extends('layouts.vendor')

@section('title', 'Create Product')
@section('eav_attributes-active', 'active')

@section('sidebar')
    @parent
@endsection

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <form id="create_eav_attribute" class="form-horizontal" action="{{ url('eav_attribute/store') }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                    <h4 class="card-title">Create Eav Attribute</h4>
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
                </div>
                <div class="card-footer ml-auto mr-auto">
                    <a href="/eav_attributes" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-rose">Save Eav Attribute</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
