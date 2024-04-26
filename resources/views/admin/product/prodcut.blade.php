@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <span id="SpanDelete" class="text-danger error-text status_error">  
                <div id="session-message">
                    @if (Session::has('error'))
                            <div class="alert alert-danger">
                                {{Session::has('error') }}
                            </div>

                    @endif
                    @if(session('delete'))
                        <div class="alert alert-danger">
                            {{ session('delete') }}
                        </div>
                    @endif
                    
                    @if (session('success_added'))
                        <div class="alert alert-success">
                            {{session('success_added') }}
                        </div>

                    @endif
                    @if (session('success_update'))
                        <div class="alert alert-success">
                            {{session('success_update') }}
                        </div>

                    @endif
                </div>
        
            <div class="col-md-10">
                <a href="{{Route('admin.prodcut.create')}}" class="btn btn-primary btn-min-width box-shadow-3 mr-1 mb-1 float-start" >
                    Add product
                </a>
                
                <table class="table align-middle table-dark table-hover table-striped" id="tableCategory">
                    <thead >
                    <tr>
                        
                        <th  >Id</th>
                        <th >Name</th>
                        <th >image</th>
                        <th >price</th>
                        <th >Quantity</th>
                        <th >Cat Name</th>
                        <th class="text-center" >Active</th>
                        <th  >Handle</th>
                        
                    </tr>
                    </thead>
                    <tbody class="">
                        @isset($pros)
                            @foreach($pros as $cate)
                                <tr {{-- class="table-dark" --}} id="p{{$cate->id}}">
                                    <th scope="row">{{$cate->id}}</th>
                                    <td id="u{{$cate->id}}">{{$cate->name}}</td>
                                    <td id="i{{$cate->id}}"> <img src="{{asset('images')}}/{{$cate->image}}" style="max-width:100px;" alt="{{$cate->name}}"> </td>
                                    <td id="f{{$cate->id}}">{{$cate->price}}</td>
                                    <td id="l{{$cate->id}}">{{$cate->quantity}}</td>
                                    <td id="e{{$cate->id}}">{{$cate->CatName}}</td>
                                    <td id="S{{$cate->id}}">{{$cate ->getStatus()}}</td>
                                    
                                    
                                    
                                    
                                    <td>
                                        
                                        <a href="{{Route('admin.prodcut.edit',['id' => $cate->id])}}" class="btn btn-info" >Edit</a>
                                        <a href="{{Route('admin.prodcut.delete',['id' => $cate->id])}}"   class="btn btn-danger" >Delete</a> 
                                        
                                    </td>
                                </tr>
                                
                            @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- start insert user with ajax  -->    
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addCategory" action=""> 
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">name </label>
                                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">                           
                                <span class="text-danger error-text name_error">  
                                </span>                          
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save </button>
                            </div>
                                
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <!-- end insert user with ajax  --> 
    <!-- start update user with ajax  -->
        <!-- Modal -->
        <div class="modal fade" id="editCategory"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="UpdateCategory" action=""> 
                            @csrf
                            <input type="hidden"  value="" id="id" >
                            <div class="mb-3">
                                <label for="name1" class="form-label">Name </label>
                                <input type="text" class="form-control" id="name1" aria-describedby="emailHelp">
                                <span class="text-danger error-text name_error">  

                            </div>
                            

                        
                           
                          
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save </button>
                            </div>
                                
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- end update user with ajax  -->
     <!-- start view user with ajax  -->
        <!-- Modal -->
        <div class="modal fade" id="viewUser"  tabindex="-2" aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">View User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card" style="width: 22rem;">
                            
                            <div >
                                <br>
                                <div  class="card-title">
                                    <span class="text-primary">Name : </span>
                                    <span  id="name2"></span>
                                </div>
                                <br>
                              

                              
                              
                            </div>
                        </div>
                            
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            {{-- <button type="submit" class="btn btn-primary">Save </button> --}}
                        </div>
                                
                        
                    </div>
                </div>
            </div>
        </div>
    <!-- end view user with ajax  -->
    
    @section('script')
        {{-- jquery  --}}
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    
        {{-- <script>
            $('#addCategory').submit(function(e){
                e.preventDefault();
                let name= $('#name').val();
                
            
                let _token=$('input[name=_token]').val();
            
                $.ajax({
                    url:"{{Route('admin.category.create')}}",
                    type:'POST',
                    data:{
                        name:name,
                       
                        _token:_token
                    },beforeSend:function(){
                        $(document).find('spin.error-text').text('');
                    },
                    
                    success:function(response){
                        console.log(response);
                    
                        if(response.status ==0)
                        {
                            $.each(response.error,function(prefix,val){
                                $('span.'+ prefix+'_error').text(val[0]);
                            });
                        }
                        else
                        {
                            
                                $('#tableCategory tbody').prepend('<tr  id="p'+ response.data.id +'">  <th>'+response.data.id +'</th><td id="n'+ response.data.id +'">'+ response.data.name +'</td><td><div class="btn-group " role="group" aria-label="Basic example"><a href="javascript:void(0)" data-bs-toggle="modal" onclick="viewUser(' + response.data.id + ')" data-bs-target="#viewUser" class="btn btn-outline-light btn-min-width box-shadow-3 mr-1 mb-1">view</a><a href="javascript:void(0)" data-bs-toggle="modal" onclick="editCategory(' + response.data.id + ')" data-bs-target="#editCategory" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">edit<a><a href="javascript:void(0)"  onclick="deleteCategory('+response.data.id+')"  class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">delete </a></div> </td></tr>');
                                $('#addCategory')[0].reset(); 
                                $('.exampleModal').modal('hide');
                                $('.modal-backdrop').modal('hide');  
                            
                            
                        }
                    } 

                })
            });
            function editCategory(id){
                $.get('Category/edit/'+id,function(data,two,three){
                   
                    
                    $('#id').val(data.id);
                    $('#name1').val(data.name);
                   
                    /* console.log();($('#courses').val(data.subject)); */
                    $('#editCategory').modal('show');
                });
            }
            $('#UpdateCategory').submit(function(e){
                e.preventDefault();
                let name= $('#name1').val();
                let id=$('#id').val();
                let _token=$('input[name=_token]').val();
                
                $.ajax({
                    url:"{{Route('admin.category.update')}}",
                    type:'POST',
                    data:{
                        id:id,
                        name:name,
                        _token:_token
                    },beforeSend:function(){
                        $(document).find('spin.error-text').text('');
                    },
                    success:function(response){


                        if(response.status ==0){
                            $.each(response.error,function(prefix,val){
                                $('span.'+ prefix+'_error').text(val[0]);
                            });
                        }else{
                            console.log(response[0].id);
                            
                            $("#n"+response[0].id ).text(response[0].name);
                            $('#UpdateCategory')[0].reset();
                            $('.editCategory').modal('hide');  
                        }
                        
                    }
                })
            })
            function deleteCategory(id){
            
                if(confirm("Do you want delete this Record? ")){

                    _token=$('input[name=_token]').val();
                    $.ajax({
                        
                        url:"Category/delete/"+id,
                        type:'delete',
                        data:{
                            _token:_token,
                        },
                        success:function(respones){
                            console.log(respones);
                            $('#p'+id).remove();
                            //$('#SpanDelete').text(respones.success);
                            
                        }
                    });
                }
            }
            
            function viewUser(id){
                $.get('Category/view/'+id,function(data,two,three){
                   
                    console.log(data);
                    /* $('#id2').text(data.id); */
                    $('#name2').text(data.name);
                    
                    
                    $('#viewUser').modal('show');
                });
            }
            
        </script>  --}}  
        <script>
            
            // Function to hide the session message
            function hideSessionMessage() {
                var sessionMessage = document.getElementById('session-message');
                if (sessionMessage) {
                    sessionMessage.style.display = 'none';
                }
            }

            // Hide the session message after 1 minute (60000 milliseconds)
            setTimeout(hideSessionMessage, 5000);
        </script>
          
    @endsection
@endsection