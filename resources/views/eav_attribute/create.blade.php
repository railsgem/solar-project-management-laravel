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
                        <label class="col-sm-2 col-form-label">Eav Entity Type</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group {{ $errors->has('eav_entity_id') ? ' has-danger' : '' }}">
                                {{--<input class="form-control" type="text" name="name" required="true" aria-required="true" value="{{ old('name') }}">--}}
                                @if ($errors->has('eav_entity_id'))
                                    <label class="error">
                                        {{ $errors->first('eav_entity_id') }}
                                    </label>
                                @endif
                                <select class="selectpicker" data-size="7" data-style="btn btn-primary btn-round" name="eav_entity_id">
                                    @foreach($eav_entities as $eav_entity)
                                        <option value="{{$eav_entity->id}}">{{$eav_entity->eav_entity_model }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Attribute Code</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group {{ $errors->has('attribute_code') ? ' has-danger' : '' }}">
                                <input class="form-control" type="text" name="attribute_code" required="true" aria-required="true" value="{{ old('attribute_code') }}">
                                @if ($errors->has('attribute_code'))
                                    <label class="error">
                                        {{ $errors->first('attribute_code') }}
                                    </label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">BackendType</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group {{ $errors->has('backend_type') ? ' has-danger' : '' }}">
                                <input class="form-control" type="text" name="backend_type" required="true" aria-required="true" value="{{ old('backend_type') }}">
                                @if ($errors->has('backend_type'))
                                    <label class="error">
                                        {{ $errors->first('backend_type') }}
                                    </label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">FrontEnd Input</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group {{ $errors->has('frontend_input') ? ' has-danger' : '' }}">
                                <input class="form-control" type="text" name="frontend_input" required="true" aria-required="true" value="{{ old('frontend_input') }}">
                                @if ($errors->has('frontend_input'))
                                    <label class="error">
                                        {{ $errors->first('frontend_input') }}
                                    </label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">FrontEnd Label</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group {{ $errors->has('frontend_label') ? ' has-danger' : '' }}">
                                <input class="form-control" type="text" name="frontend_label" required="true" aria-required="true" value="{{ old('frontend_label') }}">
                                @if ($errors->has('frontend_label'))
                                    <label class="error">
                                        {{ $errors->first('frontend_label') }}
                                    </label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Is Required</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                                <div class="togglebutton">
                                    <label>
                                        <input type="checkbox" name="is_required" required="true" aria-required="true" value="{{ old('is_required') }}" >
                                        <span class="toggle"></span>
                                    </label>
                                </div>
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
