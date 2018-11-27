@extends('layouts.app')

@section('title', 'Product Detail')

@section('sidebar')
    @parent
@endsection

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <form id="create_product" class="form-horizontal" action="" method="" novalidate="novalidate" enctype="multipart/form-data">
            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                    <h4 class="card-title">Product Detail</h4>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                                <label class="col-form-label text-primary">{{$product->name}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                                <label class="col-form-label text-primary">${{number_format($product->price/100, 2)}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                                <label class="col-form-label text-primary">{{$product->description}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-7">
                            <img src="{{$product->image_path}}">
                        </div>
                    </div>
                </div>
                <div class="card-footer ml-auto mr-auto">
                    <a href="/" class="btn btn-rose">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
