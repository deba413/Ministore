@extends('admin-panel.layouts.app')

@section('content')

        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Products</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row" style="block">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Products <small> List</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Title</th>
                          <th>Price</th>
                          <th>Discount Price</th>
                          <th>Category</th>
                          <th>Sub Category</th>
                          <th>Image</th>
                        </tr>
                      </thead>
                      <tbody>
@foreach ($products as $product)
<tr>
    <th scope="row">{{ $product->id }}</th>
    <td>{{ $product->title }}</td>
    <td>{{ $product->price }}</td>
    <td>{{ $product->discount_price }}</td>

    <td>{{ $product->category?->name ?? 'N/A' }}</td>
    <td>{{ $product->subCategory?->name ?? 'N/A' }}</td>

    <td>
        <img src="{{ asset($product->image) }}"
             width="100" height="100">
    </td>
</tr>
@endforeach

                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection