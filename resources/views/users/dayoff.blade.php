@extends('layouts.user')

@section('content')

<section class="mx-10">
    <h3 class="text-xl">Request Leave</h3>
    <p class="text-sm my-1"><span class="text-[#405189]">Verizon</span> <span class="opacity-50">/ Manage / Leave</span></p>
      
     <div class="my-8 p-8 bg-white rounded-sm w-2/4 mx-auto">

        <h2 class="text-md my-4 font-semibold opacity-50 bg-[#DBECF0] py-2 px-2 text-center">Fill in the correct details of the leave</h2>

        @if(session('status'))
                <div class="bg-[#DBECF0] p-2 rounded-lg text-center text-[#34BAA5] " id="duration">
                    {{ session('status')}}
                </div>
            @endif

         <form action="{{route('dayoff')}}" method="POST">
                 
                @csrf

                <label for="leave" class="block my-2">Leave Type*</label>
                <select class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]  @error('leave') border-2 border-red-500 @enderror" value="{{ old('leave') }}" name="leave" id="leave">
                    <option>Select the leave</option>
                    <option value="Medical Leave">Medical Leave</option>
                    <option value="Casual Leave">Casual Leave</option>
                    <option value="Study Leave">Study Leave</option>
                    <option value="Annual Leave">Annual Leave</option>
                </select>
                 @error('leave')
                    <div class="text-red-500  text-sm">
                        {{ $message }}
                    </div>
                   @enderror

               <label for="from" class="block my-2">From</label>
                <input type="date"  id="from" class="w-full border-2 px-4 py-2 rounded-md  outline-none focus:bg-[#F3F8FB]  @error('from') border-2 border-red-500 @enderror" value="{{ old('from') }}" name="from">
                    @error('from')
                        <div class="text-red-500  text-sm">
                            {{ $message }}
                        </div>
                    @enderror

                <label for="end" class="block my-2">End</label>
                <input type="date" id="end" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]  @error('end') border-2 border-red-500 @enderror" value="{{ old('end') }}" name="end">
                    @error('end')
                        <div class="text-red-500  text-sm">
                            {{ $message }}
                        </div>
                    @enderror

                
                <label for="reason" class="block my-2">Reason*</label>
                <textarea name="reason" class="w-full px-4 py-2 border-2 rounded-md resize-y outline-none focus:bg-[#F3F8FB]@error('reason') border-2 border-red-500 @enderror" value="{{ old('reason') }}" rows="4"></textarea>
                @error('reason')
                        <div class="text-red-500  text-sm">
                            {{ $message }}
                        </div>
                    @enderror
             

                <button type="submit" class="bg-[#DBECF0] text-[#34BAA5] font-semibold uppercase shadow-xl block mt-4 py-3 px-8 rounded-md text-sm hover:text-white hover:bg-[#34BAA5]">Send Request &ensp;<i class="fa fa-arrow-circle-right"></i></button>
 
        </form>

    
        
     </div>
       
</section>
    
@endsection