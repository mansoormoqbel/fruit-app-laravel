@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <span class="text-danger error-text status_error">  
            
        
            {{-- <div class="col-md-8"> --}}
                <a type="button" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1 float-start" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add User
                </a>
                
                <table class="table align-middle table-dark table-hover table-striped" id="tableUser">
                    <thead >
                    <tr>
                        <th class="text-center" >Id</th>
                        <th class="text-center" >Name</th>
                        <th class="text-center" >Email</th>
                        <th class="text-center" >Phone</th>
                        <th class="text-center" >Active</th>
                        <th class="text-center" >Handle</th>
                        
                    </tr>
                    </thead>
                    <tbody class="">
                        @isset($users)
                            @foreach($users as $user)
                                <tr id="p{{$user ->id}}">
                                    <td>{{$user ->id}}</td>
                                    <td id="n{{$user ->id}}">{{$user ->name}}</td>
                                    <td id="e{{$user ->id}}">{{$user ->email}}</td>
                                    <td id="ph{{$user ->id}}">{{$user ->phone_number}}</td>
                                    {{-- <td>{{get_default_lang()}}</td> --}}
                                    <td id="S{{$user->id}}">{{$user -> getStatus()}}</td>
                                {{--  <td> <img style="width: 150px; height: 100px;" src="{{$category ->  photo}}"></td> --}}
                                    <td>
                                        <div class="btn-group" role="group"
                                            aria-label="Basic example">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" onclick="viewUser({{$user->id}})" data-bs-target="#viewUser"
                                                class="btn btn-outline-light btn-min-width box-shadow-3 mr-1 mb-1">view</a>
                                               
                                            
                                            <a href="javascript:void(0)" data-bs-toggle="modal" onclick="editUser({{$user->id}})" data-bs-target="#editUser"
                                            class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">edit</a>


                                            <a href="javascript:void(0) "onclick="deleteUser({{$user->id}})"
                                            class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">delete</a>


                                            <a href="javascript:void(0) " onclick="statusUser({{$user->id}})" id="SS{{$user->id}}"
                                            class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">
                                                @if($user ->status == 0)
                                                    active
                                                    @else
                                                    not active
                                                @endif
                                            </a>


                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endisset
                    </tbody>
                </table>
            {{-- </div> --}}
        </div>
    </div>
    <!-- start insert user with ajax  -->    
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addUser" action=""> 
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">name </label>
                                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">                           
                                <span class="text-danger error-text name_error">  
                                </span>                          
                            </div>
                            <div class="mb-3">
                                <label for="phone_number" class="form-label">phone </label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" aria-describedby="emailHelp">                           
                                <span class="text-danger error-text phone_number_error">  
                                </span>                          
                            </div>
                            <div class=" mb-3">
                                <label for="email" class="form-label">Email </label>
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                                <span class="text-danger error-text email_error">  
                                </span>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    <span class="text-danger error-text password_error">  
                                    </span>
                                </div>
                            </div>
    
                            
    
                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
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
        <div class="modal fade" id="editUser"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="UpdateUser" action=""> 
                            @csrf
                            <input type="hidden"  value="" id="id" >
                            <div class="mb-3">
                                <label for="name1" class="form-label">Name </label>
                                <input type="text" class="form-control" id="name1" aria-describedby="emailHelp">
                                <span class="text-danger error-text name_error">  

                            </div>
                            <div class=" mb-3">
                                <label for="phone_number" class="form-label">phone_number </label>
                                <input type="text" class="form-control" id="phone_number1" aria-describedby="emailHelp">
                                <span class="text-danger error-text phone_number_error">  
                            </div>
                            <div class=" mb-3">
                                <label for="email1" class="form-label">Email </label>
                                <input type="email" class="form-control" id="email1" aria-describedby="emailHelp">
                                <span class="text-danger error-text email_error">  
                            </div>


                        
                            {{-- <select class="form-select" id="courses" aria-label="Default select example">
                                
                                <option value="1">1</option>
                                <option value="0">2</option>
                                
                            </select> --}}
                          
                            
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
                                <div  class="card-text">
                                    <span class="text-primary"> Email : </span>
                                    <span  id="email2"></span>
                                </div>
                                <br>
                                
                                
                                <div  class="card-text">
                                    <span class="text-primary">Phone Number : </span>
                                    <span  id="phone_number2"></span>
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
    
        <script>
            $('#addUser').submit(function(e){
                e.preventDefault();
                let name= $('#name').val();
                let phone_number= $('#phone_number').val();
                let email=$('#email').val();
                let password= $('#password').val();
                let password_confirmation= $('#password_confirmation').val();
            
                let _token=$('input[name=_token]').val();
            
                $.ajax({
                    url:"{{Route('admin.user.create')}}",
                    type:'POST',
                    data:{
                        name:name,
                        email:email,
                        phone_number:phone_number,
                        password:password,
                        password_confirmation:password_confirmation,
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
                            if(response.data.status == 1){
                                $('#tableUser tbody').prepend('<tr  id="p'+ response.data.id +'">  <th>'+response.data.id +'</th><td id="n'+ response.data.id +'">'+ response.data.name +'</td><td id="e'+ response.data.id +'">'+ response.data.email +'</td><td id="ph'+ response.data.id +'">'+ response.data.phone_number +'</td><td id="S'+ response.data.id +'"> active </td><td> <a href="javascript:void(0)" data-bs-toggle="modal" onclick="viewUser('+ response.data.id +')" data-bs-target="#viewUser" class="btn btn-outline-light btn-min-width box-shadow-3 mr-1 mb-1">view</a><a href="javascript:void(0)" data-bs-toggle="modal" onclick="editUser('+response.data.id+')" data-bs-target="#editUser" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">edit<a><a href="javascript:void(0)"  onclick="deleteUser('+response.data.id+')"  class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">delete<a><a href="javascript:void(0)"  onclick="statusUser('+response.data.id+')"  id="SS'+ response.data.id +'" class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1"> not active <a></td></tr>');
                                $('#addUser')[0].reset(); 
                                $('.exampleModal').modal('hide');
                                $('.modal-backdrop').modal('hide');  
                            }else{
                                $('#tableUser tbody').prepend('<tr  id="p'+ response.data.id +'">  <th >'+response.data.id +'</th><td id="n'+ response.data.id +'">'+ response.data.name +'</td><td id="e'+ response.data.id +'">'+ response.data.email +'</td><td id="ph'+ response.data.id +'">'+ response.data.phone_number +'</td><td id="S'+ response.data.id +'"> not active </td><td> <a href="javascript:void(0)" data-bs-toggle="modal" onclick="viewUser('+ response.data.id +')" data-bs-target="#viewUser" class="btn btn-outline-light btn-min-width box-shadow-3 mr-1 mb-1">view</a><a href="javascript:void(0)" data-bs-toggle="modal" onclick="editUser('+response.data.id+')" data-bs-target="#editUser" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">edit<a><a href="javascript:void(0)"  onclick="deleteUser('+response.data.id+')"  class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">delete<a><a href="javascript:void(0)"  onclick="statusUser('+response.data.id+')"  id="SS'+ response.data.id +'" class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1"> active <a></td></tr>');
                                $('#addUser')[0].reset(); 
                                $('.exampleModal').modal('hide');
                                $('.modal-backdrop').modal('hide');  
                            }
                            
                        }
                    } 

                })
            });
            function editUser(id){
                $.get('User/edit/'+id,function(data,two,three){
                   
                    
                    $('#id').val(data.id);
                    $('#name1').val(data.name);
                    $('#email1').val(data.email);
                    $('#phone_number1').val(data.phone_number);
                    /* console.log();($('#courses').val(data.subject)); */
                    $('#editUser').modal('show');
                });
            }
            $('#UpdateUser').submit(function(e){
                e.preventDefault();
                let name= $('#name1').val();
                let email=$('#email1').val();
                let id=$('#id').val();
                let phone_number=$('#phone_number1').val();
                let _token=$('input[name=_token]').val();
                
                $.ajax({
                    url:"{{Route('admin.user.update')}}",
                    type:'POST',
                    data:{
                        id:id,
                        name:name,
                        email:email,
                        phone_number:phone_number,
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
                        
                            $('#e'+response[0].id ).text(response[0].email);
                            $('#ph'+response[0].id ).text(response[0].phone_number);
                            $('#UpdateUser')[0].reset();
                            $('.editUser').modal('hide');  
                        }
                        
                    }
                })
            })
            function deleteUser(id){
            
                if(confirm("Do you want delete this Record? ")){

                    _token=$('input[name=_token]').val();
                    $.ajax({
                        
                        url:"User/delete/"+id,
                        type:'delete',
                        data:{
                            _token:_token,
                        },
                        success:function(respones){
                            console.log(respones);
                            $('#p'+id).remove();
                        }
                    });
                }
            }
            function statusUser(id){
                _token=$('input[name=_token]').val();
                $.ajax({
                    
                    url:"User/changeStatus/"+id,
                    type:'GET',
                    data:{
                        _token:_token,
                    },
                    beforeSend:function(){
                        $(document).find('spin.error-text').text('');
                    },
                    success:function(respones){
                        /* console.log(respones); */
                        
                        if(respones.status ==0){
                            $('span.status_error').text(respones.error);
                        }else{
                            var c="active";
                            var cc="not active";
                            //console.log(respones.user.id);
                            console.log(respones.user.status);
                            console.log(respones.success);
                            
                            if(respones.user.status ==0){
                                $("#S"+respones.user.id ).text(cc);
                                $("#SS"+respones.user.id ).text(c);
                            }else{
                                $("#S"+respones.user.id ).text(c);
                                $("#SS"+respones.user.id ).text(cc);
                            }
                            
                             
                        }
                    }
                });
                
            }
            function viewUser(id){
                $.get('User/view/'+id,function(data,two,three){
                   
                    console.log(data);
                    /* $('#id2').text(data.id); */
                    $('#name2').text(data.name);
                    $('#email2').text(data.email);
                    $('#phone_number2').text(data.phone_number);
                    
                    $('#viewUser').modal('show');
                });
            }
            
        </script>        
    @endsection
@endsection