@extends('admin.master')

@section('body')
   <div class="row justify-content-center">
    <div class="col-md-9 ">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5>IMPORT PRODUCT</h5>
               
            </div>
      
           <div class="card-body">
           <form action="{{ route('product.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">

                <label for="exampleInputuname3" class="col-sm-3 control-label">Import File*</label>
                <div class="col-sm-9">
                    <div class="input-group">

                        <input type="file" class="form-control" name="file" id="exampleInputuname3">
                    </div>
                </div>
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-success btn-md">ADD</button>    
            </div>
           </form>
           </div>

           </div>
    </div>
   </div>
@endsection
