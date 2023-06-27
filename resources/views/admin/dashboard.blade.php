@extends('layouts.base')

@section('content')

          
<div class="flex justify-between items-center mt-10 mx-10 ">


            <div>
                

                @if (date('H') >= 0 && date('H') <= 12)
                  <h3>Good Morning, {{Auth::guard('admin')->user()->fullName}}!</h3>
                @else
                   @if(date('H') > 12 && date('H') <= 16)
                  <h3>Good Afternoon, {{Auth::guard('admin')->user()->fullName}}!</h3>
                   @else
                  <h3>Good Evening, {{Auth::guard('admin')->user()->fullName}}!</h3>
                  @endif
                @endif

                  <p class="opacity-50 font-light">Here's what's happening with your store today.</p>
            </div>

            <div class="flex space-x-4">
                <div class="bg-white h-10 flex justify-center items-center space-x-4 border-0 rounded-r-md rounded-l-md">
                  <div class="mx-2 opacity-50 cursor-pointer">{{ now()->format('d M Y') }} {{ now('Africa/Nairobi')->format('h:i A') }}</div>
                  <div class="bg-[#405189]  text-white h-10 flex justify-center items-center px-4 rounded-r-md"><i class="fa fa-calendar"></i></div>
                </div>

                <a href="{{route('vacancy')}}" class="bg-[#DBECF0] text-[#34BAA5] py-2 px-4 rounded-md text-sm hover:text-white hover:bg-[#34BAA5]"><i class="fa fa-plus-circle"></i>&ensp; Post Opening</a>

            </div>

 </div>


 <section class="flex  justify-evenly items-center space-x-4 mt-10 mx-10">
    <div class="w-1/4 h-aut0 p-2 rounded-md bg-white shadow-sm transition duration-300 ease-in-out hover:-translate-y-1 hover:shadow-xl">
        <h3 class="opacity-50  my-2 mx-4 uppercase text-sm">Total Employee</h3>
          <h3 class="mx-4 my-2 opacity-80 text-3xl">{{ number_format($userCount) }}</h3>
          <div class=" mx-4 flex justify-between items-center">
            <a href="{{route('employees')}}" class="underline text-[#405189] opacity-70">View  employees</a>
            <div class="h-12 w-12 text-xl flex justify-center space-x-4 items-center bg-[#D2F0EC] text-[#34BAA5] rounded-md"><i class="fa fa-users" ></i></div>
          </div>
    </div>

     <div class="w-1/4 h-aut0 p-2 rounded-md bg-white shadow-sm transition duration-300 ease-in-out hover:-translate-y-1 hover:shadow-xl">
        <h3 class="opacity-50  my-2 mx-4 uppercase text-sm">Total Salary</h3>
          <h3 class="mx-4 my-2 opacity-80 text-3xl">{{ "$".number_format($total) }}</h3>
          <div class=" mx-4 flex justify-between items-center">
            <a href="{{route('payroll')}}" class="underline text-[#405189] opacity-70">View salaries</a>
            <div class="h-12 w-12 text-xl flex justify-center space-x-4 items-center bg-[#D2F0EC] text-[#34BAA5] rounded-md"><i class="fa fa-briefcase" ></i></div>
          </div>
    </div>

     <div class="w-1/4 h-aut0 p-2 rounded-md bg-white shadow-sm transition duration-300 ease-in-out hover:-translate-y-1 hover:shadow-xl">
        <h3 class="opacity-50  my-2 mx-4 uppercase text-sm">Average Salary</h3>
          <h3 class="mx-4 my-2 opacity-80 text-3xl">{{ "$".number_format($average) }}</h3>
          <div class=" mx-4 flex justify-between items-center">
            <a href="{{route('payroll')}}" class="underline text-[#405189] opacity-70">See details</a>
            <div class="h-12 w-12 text-xl flex justify-center space-x-4 items-center bg-[#D2F0EC] text-[#34BAA5] rounded-md"><i class="fa fa-credit-card" ></i></div>
          </div>
    </div>

     <div class="w-1/4 h-aut0 p-2 rounded-md bg-white shadow-sm transition duration-300 ease-in-out hover:-translate-y-1 hover:shadow-xl ">
        <h3 class="opacity-50  my-2 mx-4 uppercase text-sm">Total Applications</h3>
          <h3 class="mx-4 my-2 opacity-80 text-3xl">{{ number_format($appCount) }}</h3>
          <div class=" mx-4 flex justify-between items-center">
            <a href="{{route('recruitment')}}" class="underline text-[#405189] opacity-70">View all applications</a>
            <div class="h-12 w-12 text-xl flex justify-center space-x-4 items-center bg-[#D2F0EC] text-[#34BAA5] rounded-md"><i class="fa fa-user" ></i></div>
          </div>
    </div>
 </section>


 {{-- Employees table --}}
 {{-- Recruitment table --}}

 <section class="mx-10 my-10 flex items-center max-md:flex-wrap space-x-4">
     
        <div  class="w-full bg-white px-4 py-4 rounded-sm">
          <h3 class="mb-4">Current Employees</h3>
            <table class="display whitespace-nowrap" id="overview">
                  <thead>
                    <tr>
                      <th class="uppercase  text-xs opacity-50">Full Name</th>
                      <th class="uppercase  text-xs opacity-50">Employee Id</th>                  
                      <th class="uppercase  text-xs opacity-50">Email</th>
                      <th class="uppercase  text-xs opacity-50 ">Position</th>
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
                         <p class="text-gray-500 text-sm font-semibold mb-0">{{$user->email}}</p>
                      </td>
                      <td>
                         <p class="text-gray-500 text-sm font-semibold mb-0">{{$user->position}}</p>
                      </td>
                     
                    @endforeach           
                  </tbody>
                </table>
        </div>

         <div class="w-full bg-white px-4 py-4 rounded-sm">
              <h3 class="mb-4">Job Applications</h3>
            <table class="display whitespace-nowrap" id="table2">
                  <thead>
                    <tr>
                      <th class="uppercase  text-xs opacity-50">Email</th>                  
                      <th class="uppercase  text-xs opacity-50">Position</th>
                      <th class="uppercase  text-xs opacity-50">Status</th>
                    </tr>
                  </thead>
                  <tbody>

                   @foreach($applications as $application)  
                   
                 
                    <tr>                    

                      <td>
                         <p class="text-gray-500 text-sm font-semibold mb-0">{{$application->email}}</p>
                      </td>

                       <td>
                         <p class="text-gray-500 text-sm font-semibold mb-0">{{$application->title}}</p>
                      </td>
                      

                      <td>
                        <p class="text-gray-500 text-sm font-semibold mb-0">
                          @if($application->status == '1')
                             <span class="text-green-500">Pending</span>
                            @elseif($application->status == '2')
                             <span class="text-orange-300">Approved</span>
                             @elseif($application->status == '3')
                             <span class="text-red-500">Rejected</span>
                             @endif
                        </p>
                      </td>
                    </tr> 
                    @endforeach

                   
                                 
                  </tbody>
                </table>
        </div>
        
 </section>

 </section>

@endsection
