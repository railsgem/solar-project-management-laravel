@extends('layouts.vendor')

@section('title', 'Eav Attribute List')
@section('eav_attributes-active', 'active')

@section('sidebar')
    @parent
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Eav Attribute Table</h4>
            <p class="card-category"> a list of Eav Attributes</p>
            <a href="/eav_attribute/create" class="btn btn-round btn-info">
                <i class="material-icons">library_add</i> Add Eav Attribute
            </a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <tr>
                    <th>
                      @sortablelink('attributeCode')
                    </th>
                    <th>
                      @sortablelink('eavEntityName')
                    </th>
                    <th>
                      @sortablelink('eav_entity_model')
                    </th>
                    <th>
                        Actions
                    </th>
                  </tr>
                </thead>
                <tbody>

                @foreach($eav_attributes as $eav_attribute)
                  <tr>
                    <td>
                        <a class="" href="{{'/eav_attributes/show/' . $eav_attribute->id}}">{{$eav_attribute->attribute_code}}</a>
                    </td>
                      <td>
                          <a class="" href="{{'/eav_attributes/show/' . $eav_attribute->id}}">{{$eav_attribute->eav_entity->eav_entity_name}}</a>
                      </td>
                        <td>
                          <a class="" href="{{'/eav_attributes/show/' . $eav_attribute->id}}">{{$eav_attribute->eav_entity->eav_entity_model}}</a>
                      </td>

                    <td class="center">
                        <a href="#" id="{{$eav_attribute->id}}"
                            class="deleteModal" data-toggle="modal"
                            data-target="#deleteModal{{$eav_attribute->id}}"><i class="material-icons">delete</i>
                        </a>
                        <a href="{{ url('eav_attributes/edit/' . $eav_attribute->id)}}">
                            <i class="material-icons">create</i>
                        </a>
                    </td>
                    @include('eav_attribute.delete')
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        {{ $eav_attributes->appends(\Request::except('_token'))->render() }}
      </div>
    </div>
  </div>
@endsection
