@extends('layouts.app')

@section('title', 'Product List')

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
            <p class="card-category"> Here is a subtitle for this table</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <tr>
                    <th>
                        Name
                    </th>
                    <th>
                        Image
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Price
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
                        {{$product->name}}
                    </td>
                    <td>
                        {{-- <img src="{{$product->image}}" alt="Raised Image" class="img-rounded img-responsive" /> --}}
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
                        <a href="#" id="{{$product->id}}" class="editComboMealModal" data-toggle="modal"
                            data-target="#addComboMealModal">
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
