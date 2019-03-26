@extends('layouts.vendor')

@section('title', 'Product List')
@section('products-active', 'active')

@section('sidebar')
    @parent
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Product Table</h4>
            <p class="card-category"> a list of products</p>
            <a href="/product/create" class="btn btn-round btn-info">
                <i class="material-icons">library_add</i> Add Product
            </a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <tr>
                    <th>
                        @sortablelink('name')
                    </th>
                    <th>
                        Image
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        @sortablelink('price')
                    </th>
                    <th>
                        Actions
                    </th>
                    </tr>
                </thead>
                <tbody>

                @foreach($products as $product)
                  <tr>
                    <td>
                        <a class="" href="{{'/products/show/' . $product->id}}">{{$product->name}}</a>
                    </td>
                    <td>
                        <a class="" href="{{'/products/show/' . $product->id}}"><img src="{{$product->image_path}}" alt="Raised Image" class="img-rounded img-responsive product__image" /></a>
                    </td>
                    <td>
                        {{$product->description}}
                    </td>
                    <td class="text-primary">
                        ${{ number_format($product->price/100, 2)}}
                    </td>
                    <td class="center">
                        <a href="#" id="{{$product->id}}"
                            class="deleteModal" data-toggle="modal"
                            data-target="#deleteModal{{$product->id}}"><i class="material-icons">delete</i>
                        </a>
                        <a href="{{ url('products/edit/' . $product->id)}}">
                            <i class="material-icons">create</i>
                        </a>
                    </td>
                    @include('product.delete')
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        {{ $products->appends(\Request::except('_token'))->render() }}
      </div>
    </div>
  </div>
@endsection
