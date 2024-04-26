@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    add prodcut
                </div>
                <div class="card-body">
                    @if(Session::has('success_added'))
                    <div class="alert alert-success">
                        {{ Session::get('success_added') }}
                    </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{Session::has('error') }}
                        </div>

                    @endif
                    <form action="{{Route('admin.prodcut.store')}}" method="POST" enctype="multipart/form-data"> 
                        @csrf
                       
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Name </label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price </label>
                            <input type="text" class="form-control  @error('price') is-invalid @enderror" id="price" name="price" >
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity </label>
                            <input type="text" class="form-control  @error('quantity') is-invalid @enderror" id="quantity" name="quantity" >
                            @error('quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">product photo</label>
                            <input id="image" type="file" class="form-control  @error('image') is-invalid @enderror" name="image"  > 
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Category" class="form-label">Select Category</label>
                            <select class="form-select  @error('CatId') is-invalid @enderror" name="CatId" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                @isset($cate)
                                    @foreach($cate as $s)
        
                                    <option value="{{$s->id}}">{{$s->name}}</option>
                                
                                        
                                    @endforeach
                                @endisset
                                
                            </select>
                            @error('CatId')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                       
                        
                        
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


    
    
    @section('script')
        {{-- jquery  --}}
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    
              
    @endsection
@endsection