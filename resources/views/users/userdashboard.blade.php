@extends('layouts.user')

@section('content')

          
<div class="flex justify-between items-center mt-10 mx-10 ">


            <div>
                 @php date_default_timezone_set("Africa/Nairobi"); @endphp

                @if (date('H') >= 0 && date('H') <= 12)
                  <h3>Good Morning, {{auth()->user()->fullName}}!</h3>
                @else
                   @if(date('H') > 12 && date('H') <= 16)
                  <h3>Good Afternoon, {{auth()->user()->fullName}}!</h3>
                   @else
                  <h3>Good Evening, {{auth()->user()->fullName}}!</h3>
                  @endif
                @endif

                  <p class="opacity-50 font-light">Check here for more updates on applied leave.</p>
            </div>

            <div class="">
                <div class="bg-white h-10 flex justify-center items-center space-x-4 border-0 rounded-r-md rounded-l-md">
                  <div class="mx-2 opacity-50 cursor-pointer">{{ now()->format('d M Y') }} {{ now('Africa/Nairobi')->format('h:i A') }}</div>
                  <div class="bg-[#405189]  text-white h-10 flex justify-center items-center px-4 rounded-r-md"><i class="fa fa-calendar"></i></div>
                </div>


            </div>

 </div>

 <section class="mx-10 h-screen mt-10">

    <div class=" flex justify-between  items-center">
          <div>
            <h3 class="text-xl">Dashboard</h3>
             <p class="text-sm my-1"><span class="text-[#405189]">Verizon</span> <span class="opacity-50">/ Dashboard</span></p>
          </div>

          <div>
            <a href="{{route('dayoff')}}" class="bg-[#DBECF0] text-[#34BAA5] py-2 px-4 rounded-md text-sm hover:text-white hover:bg-[#34BAA5]"><i class="fa fa-plus-circle"></i>&ensp; Request Leave</a>
          </div>

    </div>
      
     <div class=" my-4 py-10 px-10 bg-white rounded-sm">
     
        <table class="display" id="table5">
                  <thead>
                    <tr>
                      <th class="uppercase  text-xs opacity-50">Leave Type</th>
                      <th class="uppercase  text-xs opacity-50">Reason</th>
                      <th class="uppercase  text-xs opacity-50">Period</th>
                      <th class="uppercase  text-xs opacity-50">Request Date</th>                  
                      <th class="uppercase  text-xs opacity-50">Status</th>                  
                    </tr>
                  </thead>
                  <tbody>
               @foreach ($dayoffs as $dayoff)
                           
                    
                    <tr>
                       <td>
                        <p class="text-gray-500 font-semibold text-sm">{{$dayoff->leave}}</p>                   
                      </td>
                      <td>
                         <p class="text-gray-500 text-sm font-semibold mb-0">{{$dayoff->reason}}</p>
                      </td>
        
                      <td>
                         <p class="text-gray-500 text-sm font-semibold mb-0"><span class="text-[#34BAA5]">From</span> {{date_format(now()->parse($dayoff->from), 'd M, Y' )}} <span class="text-red-400">to</span> {{date_format(now()->parse($dayoff->end), 'd M, Y' )}}</p>
                      </td>
                    
                      <td>
                        <p class="text-gray-500 text-sm font-semibold mb-0">{{date_format(now()->parse($dayoff->created_at), 'd M, Y' )}}</p>
                      </td>

                      <td>
                        <p class="text-sm font-semibold mb-0">

                           @if($dayoff->status == '1')
                             <p class="bg-[#FDEFCD] text-orange-300 text-center rounded-md">Awaiting</p>
                            @elseif($dayoff->status == '2')
                             <p class="bg-[#DBECF0] text-[#34BAA5] text-center rounded-md">Approved</p>
                             @elseif($dayoff->status == '3')
                             <p class="bg-[#FFF0EE] text-red-400 text-center rounded-md">Declined</p>
                             @endif

                        </p>
                      </td>
                    </tr> 

                  @endforeach 
                 
                  </tbody>
                </table>

     </div>
    
 
    
</section>
    

@endsection
