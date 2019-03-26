@extends('layouts.vendor')

@section('title', 'Edit Project')
@section('eav_attributes-active', 'active')

@section('sidebar')
    @parent
@endsection

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <form id="create_eav_attribute" class="form-horizontal" action="{{ url('eav_attributes/update/' . $eav_attribute->id) }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                    <h4 class="card-title">Edit Eav Attribute</h4>
                    </div>
                </div>
                {{ csrf_field() }}
                <div class="card-body ">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Eav Entity Type</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                                <input class="form-control" type="hidden" name="eav_entity_id" required="true" aria-required="true" value="{{$eav_attribute->eav_entity_id }}">

                                <input class="form-control" type="text" name="eav_entity_name" required="true" aria-required="true" value="{{$eav_attribute->eav_entity->eav_entity_name . ' (' . $eav_attribute->eav_entity->eav_entity_model .')'}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Attribute Code</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                                <input class="form-control" type="text" name="attribute_code" required="true" aria-required="true" value="{{ $eav_attribute->attribute_code }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">BackendType</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                                <input class="form-control" type="text" name="backend_type" required="true" aria-required="true" value="{{ $eav_attribute->backend_type }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">FrontEnd Input</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                                <input class="form-control" type="text" name="frontend_input" required="true" aria-required="true" value="{{ $eav_attribute->frontend_input }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Frontend Label</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                                <input class="form-control" type="text" name="frontend_label" required="true" aria-required="true" value="{{ $eav_attribute->frontend_label }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Is Required</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                                <input class="form-control" type="text" name="is_required" required="true" aria-required="true" value="{{ $eav_attribute->is_required }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ml-auto mr-auto">
                    <a href="/eav_attributes" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-rose">Update Eav Attribute</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
