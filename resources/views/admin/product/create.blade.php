@extends('admin.master')

@section('body')
   <div class="row justify-content-center">
    <div class="col-md-8 ">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5>ADD PRODUCT</h5>

            </div>
           <div class="card-body">
            <form method="POST" action="{{ route("product.store") }}">
                @csrf
                @error('product_name')
                    <small class="bg-danger text-white">{{ $message }}</small>
                @enderror
                <div class="form-group row">
                    <label for="exampleInputuname3" class="col-sm-3 control-label">Category Name</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="category_id" id="category_id">
                        <option value="" disabled selected> -- Select Category --</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}" >{{ $item->name }}</option>
                        @endforeach
                      </select>
                    </div>
                </div>
                @error('product_name')
                <small class="bg-danger text-white">{{ $message }}</small>
                @enderror
                <div class="form-group row">

                    <label for="exampleInputuname3" class="col-sm-3 control-label">Product Name*</label>
                    <div class="col-sm-9">
                        <div class="input-group">

                            <input type="text" class="form-control" name="product_name" id="exampleInputuname3" placeholder="Product Name">
                        </div>
                    </div>
                </div>
                @error('product_price')
                <small class="bg-danger text-white">{{ $message }}</small>
                @enderror
                <div class="form-group row mt-3">

                    <label for="exampleInputuname3" class="col-sm-3 control-label"></label>

                    <div class="col-sm-9">
                       <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                             <label for="exampleInputuname3" class="col-sm-5 control-label">Product Price*</label>

                             <div class="col-sm-7">
                                 <div class="input-group">

                                     <input type="text" class="form-control" name="product_price" id="exampleInputuname3" placeholder="Product Price">
                                 </div>
                             </div>
                            </div>
                         </div>
                        <div class="col-sm-6">
                           <div class="row">
                            @error('product_quantity')
                            <small class="bg-danger text-white">{{ $message }}</small>
                            @enderror
                            <label for="exampleInputuname3" class="col-sm-5 control-label">Product Quantity*</label>

                            <div class="col-sm-7">
                                <div class="input-group">

                                    <input type="text" class="form-control" name="product_quantity" id="exampleInputuname3" placeholder="Product Quantity">
                                </div>
                            </div>
                           </div>
                        </div>
                       </div>
                    </div>
                </div>

                <div class="form-group row m-b-0">
                    <label for="exampleInputuname3" class="col-sm-3 control-label"> </label>

                    <div class="offset-sm-3 col-sm-9">
                        <button type="submit" class="mt-4 text-white btn btn-success waves-effect waves-light">Create New Product</button>
                    </div>
                </div>
            </form>
           </div>

        </div>
    </div>
   </div>
@endsection

