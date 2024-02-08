@extends('admin.master')

@section('body')
   <div class="row justify-content-center">
    <div class="col-md-9 ">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5>ALL PRODUCT</h5>
                <div class="d-flex">
                    {{-- <a href="{{ route('product.create') }}" class="btn btn-primary mx-3" id="addProductBtn">ADD PRODUCT</a> --}}
                    <a href="{{ route('largedataset.create') }}" class="btn btn-primary" id="addProductBtn">IMPORT LARGE DATA</a>

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
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Branch Id</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach($allData as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->first_name }}</td>
                        <td>{{ $item->last_name}}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->gender}}</td>
                        <td>{{ $item->banch_id }}</td>
                        {{-- <td>
                        <a href="{{ route('product.edit',['product'=>$item->id]) }}" class="btn btn btn-md btn-primary" > <i class="fa-regular fa-pen-to-square"></i></a>
                        <form method="POST" action="{{ route('product.destroy',['product'=>$item->id]) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn btn-md btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">
                                <i class="fa-solid fa-trash"></i>
                            </button>

                        </form>
                        </td> --}}

                    </tr>
                    @endforeach

                </tbody>
                {{ $allData->onEachSide(1)->links() }}

              </table>
           </div>

           </div>
    </div>
   </div>
@endsection
