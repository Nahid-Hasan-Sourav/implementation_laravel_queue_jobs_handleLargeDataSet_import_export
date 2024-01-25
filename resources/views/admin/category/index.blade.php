@extends('admin.master')

@section('body')
   <div class="row justify-content-center">
    <div class="col-md-6 ">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5>CATEGORY</h5>
                <button class="btn btn-primary" id="addCategoryBtn"> ADD CATEGORY</button>
            </div>
           <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Action</th>
                   
                  </tr>
                </thead>
                <tbody id="categoryTableBody">
               
                  
                </tbody>
              </table>
           </div>
           @include('admin.category.modal.addModal')
           </div>
    </div>
   </div>
@endsection