@extends('layouts.base')

@section('content')

<section class="mx-10 h-screen">
    <h3 class="text-xl">Payroll</h3>
    <p class="text-sm my-1"><span class="text-[#405189]">Verizon</span> <span class="opacity-50">/ Payroll / Employee Salary</span></p>
      
     <div class="my-10 py-10 px-10 bg-white rounded-sm">
     
        <table class="display" id="table4">
                  <thead>
                    <tr>
                      <th class="uppercase  text-xs opacity-50">Full Name</th>
                      <th class="uppercase  text-xs opacity-50">Employee Id</th>
                      <th class="uppercase  text-xs opacity-50">Phone</th>
                      <th class="uppercase  text-xs opacity-50">Position</th>                  
                      <th class="uppercase  text-xs opacity-50">Salary</th>                  
                      <th class="uppercase  text-xs opacity-50">Action</th>                  
                    </tr>
                  </thead>
                  <tbody>
                        

                     @foreach($users as $user) 

                    <tr>
                       <td>
                        <a href="#" class="text-gray-500 font-semibold text-sm">{{$user->fullName}}</a>                   
                      </td>
                      <td>
                         <p class="text-gray-500 text-sm font-semibold mb-0">{{$user->employeeId}}</p>
                      </td>
                      <td>
                         <p class="text-gray-500 text-sm font-semibold mb-0">{{"+254".$user->phone ?? 'N/A'}}</p>
                      </td>

                      <td>
                        <p class="text-gray-500 text-sm font-semibold mb-0">{{$user->position}}</p>
                      </td>

                      <td>
                        <p class="text-gray-500 text-sm font-semibold mb-0">{{$user->salary. '/yr'}}</p>
                      </td>


                      <td class=" flex items-center space-x-2">

                        <form action="/admin/cheque/{{$user->id}}" method="POST" class="m-0 p-0">
                           @csrf
                           <button type="submit" class="bg-[#4DCA88] text-white py-1 px-3 rounded-md font-thin hover:bg-[#34BAA5]"><i class="fa fa-envelope"></i> Cheque</button>
                        </form>

                         <a href="/admin/{{$user->id}}/payroll" title="Edit" class="border border-[#34BAA5] text-[#34BAA5] py-1 px-3 rounded-md hover:bg-[#34BAA5] hover:text-white"><i class="fa fa-edit"></i> Edit</a>

                      </td>
                    </tr> 
                    @endforeach
  
                  </tbody>
                </table>

     </div>
    
 
    
</section>
    
@endsection