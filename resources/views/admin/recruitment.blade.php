@extends('layouts.base')

@section('content')

<section class="mx-10 h-screen">
    <div class=" flex justify-between  items-center">
          <div>
            <h3 class="text-xl">Recruitments</h3>
              <p class="text-sm my-1"><span class="text-[#405189]">Verizon</span> <span class="opacity-50">/ Recruitment  / Applications</span></p>
          </div>

          <div>
            <a href="{{route('vacancy')}}" class="bg-[#DBECF0] text-[#34BAA5] py-2 px-4 rounded-md text-sm hover:text-white hover:bg-[#34BAA5] "><i class="fa fa-plus-circle"></i>&ensp; Post Opening</a>
          </div>

    </div>
      
     <div class="my-10 py-10 px-10 bg-white rounded-sm">
     
        <table class="display" id="table4">
                  <thead>
                    <tr>
                      <th class="uppercase  text-xs opacity-50">Name</th>
                      <th class="uppercase  text-xs opacity-50">Email</th>
                      <th class="uppercase  text-xs opacity-50">Mobile</th>
                      <th class="uppercase  text-xs opacity-50">Vacancy</th>
                      <th class="uppercase  text-xs opacity-50">Date</th>                 
                      <th class="uppercase  text-xs opacity-50">Action</th>                  
                    </tr>
                  </thead>
                  <tbody>
                        
                  @foreach ($applications as $application)
                      
                     @if($application->status == '1')

                        <tr>
                      
                          <td>
                            <a href="#" class="text-gray-500 font-semibold text-sm">{{$application->first_name}}&ensp;{{$application->last_name}}</a>                   
                          </td>
                          <td>
                            <p class="text-gray-500 text-sm font-semibold mb-0">{{$application->email}}</p>
                          </td>
                          <td>
                            <p class="text-gray-500 text-sm font-semibold mb-0">{{"+254".$application->phone}}</p>
                          </td>
                          <td>
                            <p class="text-gray-500 text-sm font-semibold mb-0">{{$application->title}}</p>
                          </td>
                          <td>
                            <p class="text-gray-500 text-sm font-semibold mb-0">{{date_format(now()->parse($application->created_at), 'd M, Y' )}}</p>
                          </td>
                          <td class="space-x-2">

                          <a href="#" class="bg-[#405189] text-white py-1 px-3 rounded-md font-thin hover:underline">View details</a>

                            <a href="{{ route('change', $application->id) }}" class="border border-[#34BAA5] text-[#34BAA5] py-1 px-3 rounded-md hover:bg-[#34BAA5] hover:text-white" title="shortlist"><i class="fa fa-check"></i></a>

                            <a href="{{ route('reject', $application->id) }}" class="border border-red-300 text-red-400 py-1 px-3 rounded-md hover:bg-red-400 hover:text-white" title="reject"><i class="fa fa-ban"></i></a>
                          </td>
                        </tr> 
               

                     @endif
             
                     @endforeach
  
                  </tbody>
                </table>

     </div>
    
 
    
</section>
    
@endsection