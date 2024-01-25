@extends('admin.master')

@section('body')
   <div class="row justify-content-center">
    <div class="col-md-6 ">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5>ALL PRODUCT</h5>
                <a href="{{ route('product.create') }}" class="btn btn-primary" id="addProductBtn"> ADD PRODUCT</a>
            </div>
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
                    <tr>
                        <th scope="row">1</th>
                        <td> T-shirt</td>
                        <td> Fashion</td>
                        <td> 100</td>
                        <td>
                        <button  class="btn btn btn-md btn-primary" > <i class="fa-regular fa-pen-to-square"></i></button>
                        <button  class="btn btn btn-md btn-danger" ><i class="fa-solid fa-trash"></i></button>
                        </td>
                        
                    </tr>
                  
                </tbody>
              </table>
           </div>
        
           </div>
    </div>
   </div>
@endsection