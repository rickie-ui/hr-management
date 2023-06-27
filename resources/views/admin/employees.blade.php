@extends('layouts.base')

@section('content')

<section class="mx-10 h-screen">

    <div class=" flex justify-between  items-center">
          <div>
            <h3 class="text-xl">Employees</h3>
             <p class="text-sm my-1"><span class="text-[#405189]">Verizon</span> <span class="opacity-50">/ Employees</span></p>
          </div>

          <div>
            <a href="{{route('create')}}" class="bg-[#DBECF0] text-[#34BAA5] py-2 px-4 rounded-md text-sm hover:text-white hover:bg-[#34BAA5]"><i class="fa fa-plus-circle"></i>&ensp; Add Employee</a>
          </div>

    </div>
      
     <div class="my-10 py-10 px-10 bg-white rounded-sm">

      @if(session('status'))
                <div class="bg-[#DBECF0] p-2 my-6 rounded-lg text-center text-[#34BAA5] " id="duration">
                    {{ session('status')}}
                </div>
         @endif
     
        <table class="display" id="table3">
                  <thead>
                    <tr>
                      <th class="uppercase  text-xs opacity-50">Full Name</th>
                      <th class="uppercase  text-xs opacity-50">Employee Id</th>
                      <th class="uppercase  text-xs opacity-50">Position</th>
                      <th class="uppercase  text-xs opacity-50">Email</th>
                      <th class="uppercase  text-xs opacity-50">Join Date</th>
                      <th class="uppercase  text-xs opacity-50">Action</th>                  
                    </tr>
                  </thead>
                  <tbody>
                        
                @foreach($users as $user)  
                    <tr>
                       <td>
                        <p class="text-gray-500 font-semibold text-sm">{{$user->fullName}}</p>                   
                      </td>
                      <td>
                         <p class="text-gray-500 text-sm font-semibold mb-0">{{$user->employeeId}}</p>
                      </td>
                      <td>
                         <p class="text-gray-500 text-sm font-semibold mb-0">{{$user->position}}</p>
                      </td>
                      <td>
                         <p class="text-gray-500 text-sm font-semibold mb-0">{{$user->email}}</p>
                      </td>
                     
                      <td>
                        <p class="text-gray-500 text-sm font-semibold mb-0">{{date_format(now()->parse($user->created_at), 'd M, Y' )}}</p>
                      </td>
                      
                        <td class="flex items-center text-base m-0 p-0 space-x-5">

                            <div><a href="/admin/{{$user->id}}/detail" class="text-teal-500 text-sm hover:opacity-70 m-0 p-0"><i class="fa fa-edit" title="edit"></i> Edit</a></div>
        
                           <form method="POST" action="/admin/{{$user->id}}/delete" class="text-red-500 text-sm hover:opacity-70  m-0 p-0">
                                @csrf
                                @method("DELETE")
                                <button type="submit"><i class="fa fa-trash"title="delete"></i> Delete</button>
                            </form>

                        </td>
                    </tr> 
                    @endforeach
                  </tbody>
                </table>

     </div>
    
 
    
</section>
    
@endsection