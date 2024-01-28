@extends('admin.master')

@section('body')
   <div class="row justify-content-center">
    <div class="col-md-9 ">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5>ALL PRODUCT</h5>
                <div class="d-flex">
                    <a href="{{ route('product.create') }}" class="btn btn-primary mx-3" id="addProductBtn"> ADD PRODUCT</a>
                    <a href="{{ route('product.import.view') }}" class="btn btn-primary" id="addProductBtn"> IMPORT PRODUCT</a>

                </div>
            </div>

            @if(session('message'))
            <small class="p-3 bg-success text-white">{{ session('message') }}</small>

            @endif
           <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Category</th>
                    <th scope="col">Product Quantity</th>
                    <th scope="col">Action</th>

                  </tr>
                </thead>
                <tbody id="productTableBody">
                    @foreach($product as $item)
                    {{-- {{ dd($item) }} --}}
                    <tr>
                        <th scope="row">1</th>
                        <td>{{ $item->name }}</td>
                        <td> {{ $item->category->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>
                        <a href="{{ route('product.edit',['product'=>$item->id]) }}" class="btn btn btn-md btn-primary" > <i class="fa-regular fa-pen-to-square"></i></a>
                        <form method="POST" action="{{ route('product.destroy',['product'=>$item->id]) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn btn-md btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>                        </td>

                    </tr>
                    @endforeach

                </tbody>
              </table>
           </div>

           </div>
    </div>
   </div>
@endsection
