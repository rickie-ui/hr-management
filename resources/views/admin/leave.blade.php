@extends('layouts.base')

@section('content')

<section class="mx-10 h-screen">
    <h3 class="text-xl">Leave Requests</h3>
    <p class="text-sm my-1"><span class="text-[#405189]">Verizon</span> <span class="opacity-50">/ Employee / Leave Requests</span></p>
      
     <div class="my-10 py-10 px-10 bg-white rounded-sm">
     
        <table class="display" id="table3">
                  <thead>
                    <tr>
                      <th class="uppercase  text-xs opacity-50">Full Name</th>
                      <th class="uppercase  text-xs opacity-50">Employee Id</th>
                      <th class="uppercase  text-xs opacity-50">Leave Type</th>
                      <th class="uppercase  text-xs opacity-50">Period</th>
                      <th class="uppercase  text-xs opacity-50">Reason</th>                  
                      <th class="uppercase  text-xs opacity-50">Action</th>                  
                    </tr>
                  </thead>
                  <tbody>
                        

                    @foreach($dayoffs as $dayoff)
                      <tr>
                        <td>
                          <a href="#" class="text-gray-500 font-semibold text-sm">{{$dayoff->fullName}}</a>                   
                        </td>
                        <td>
                          <p class="text-gray-500 text-sm font-semibold mb-0">{{$dayoff->employeeId}}</p>
                        </td>
                        <td>
                          <p class="text-gray-500 text-sm font-semibold mb-0">{{$dayoff->leave}}</p>
                        </td>
                      
                        <td>
                          <p class="text-gray-500 text-sm font-semibold mb-0"><span class="text-[#34BAA5]">From</span> {{date_format(now()->parse($dayoff->from), 'd M, Y' )}} <span class="text-red-400">to</span> {{date_format(now()->parse($dayoff->end), 'd M, Y' )}}</p>
                        </td>

                        <td>
                          <p class="text-gray-500 text-sm font-semibold mb-0">{{$dayoff->reason}}</p>
                        </td>
                        <td>
                         @if($dayoff->status == '1')
                            <a href="{{ route('accept', $dayoff->id) }}" class="border border-[#34BAA5] text-[#34BAA5] py-1 px-3 rounded-md hover:bg-[#34BAA5] hover:text-white"><i class="fa fa-check"></i></a>
                            <a href="{{ route('denied', $dayoff->id ) }}" class="border border-red-300 text-red-400 py-1 px-3 rounded-md hover:bg-red-400 hover:text-white"><i class="fa fa-ban"></i></a>
                          @elseif($dayoff->status == '2')
                             <p class="bg-[#DBECF0] text-[#34BAA5] text-center rounded-md">Approved</p>
                             @elseif($dayoff->status == '3')
                             <p class="bg-[#FFF0EE] text-red-400 text-center rounded-md">Declined</p>
                             @endif
                        </td>
                      </tr>   
                    @endforeach

                  </tbody>
                </table>

     </div>
    
 
    
</section>
    
@endsection