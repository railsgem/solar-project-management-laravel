@extends('layouts.vendor')

@section('title', 'Project Detail')
@section('eav_attributes-active', 'active')

@section('sidebar')
    @parent
@endsection

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <form id="create_eav_attribute" class="form-horizontal" action="" method="" novalidate="novalidate" enctype="multipart/form-data">
            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                    <h4 class="card-title">Eav Attribute Detail</h4>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Eav Entity Type</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                                <label class="col-form-label text-primary">{{$eav_attribute->eav_entity->eav_entity_name . ' (' . $eav_attribute->eav_entity->eav_entity_model .')'}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Attribute Code</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                                <label class="col-form-label text-primary">{{$eav_attribute->attribute_code}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">BackendType</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                                <label class="col-form-label text-primary">{{$eav_attribute->backend_type}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">FrontEnd Input</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                                <label class="col-form-label text-primary">{{$eav_attribute->frontend_input}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Frontend Label</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                                <label class="col-form-label text-primary">{{$eav_attribute->frontend_label}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Is Required</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                                <label class="col-form-label text-primary">{{$eav_attribute->is_required == 1 ? 'Yes' : 'No'}}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ml-auto mr-auto">
                    <a href="/eav_attributes" class="btn btn-rose">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
