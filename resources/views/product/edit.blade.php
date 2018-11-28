@extends('layouts.app')

@section('title', 'Edit Product')

@section('sidebar')
    @parent
@endsection

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <form id="create_product" class="form-horizontal" action="{{ url('products/update/' . $product->id) }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                    <h4 class="card-title">Edit Product</h4>
                    </div>
                </div>
                {{ csrf_field() }}
                <div class="card-body ">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                            <input class="form-control" type="text" name="name" required="true" aria-required="true" value="{{ $product->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                            <input class="form-control" type="number" name="price" number="true" required="true" aria-required="true" value="{{ $product->price / 100 }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                            <textarea rows=5 class="form-control" type="text" name="description" required="true" aria-required="true">{{ $product->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Image</label>
                        <div class="input-group col-sm-7">
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new img-rounded ">
                                    <img id="item_image_src" src="{{ $product->image_path }}" alt="Raised Image" class="img-rounded img-responsive " />
                                </div>
                                <div class="fileinput-preview fileinput-exists img-rounded"></div>
                                <div>
                                    <span class="btn btn-raised btn-round btn-default btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" accept="image/*" name="image" id="item_image" class="form-control" value="{{ $product->image }}"/>
                                    </span>
                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ml-auto mr-auto">
                    <a href="/" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-rose">Update Product</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
