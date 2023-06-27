@extends('layouts.base')

@section('content')

<section class="mx-10 h-auto">
    <h3 class="text-xl">Post Opening</h3>
    <p class="text-sm my-1"><span class="text-[#405189]">Verizon</span> <span class="opacity-50">/ Vacancy / Post</span></p>
      
     <div class="my-8 py-10 px-10 bg-white rounded-sm w-2/4 mx-auto">

        <h2 class="text-md my-4 font-semibold opacity-60">Fill in the correct details of the open position</h2>

          @if(session('status'))
                <div class="bg-[#DBECF0] p-2 rounded-lg text-center text-[#34BAA5] " id="duration">
                    {{ session('status')}}
                </div>
            @endif

         <form action="{{ route('vacancy')}}" method="POST">

            @csrf
                       
                <label for="title" class="block my-2">Job Title*</label>
                <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB] @error('title') border-2 border-red-500 @enderror" value="{{ old('title') }}" name="title">
                @error('title')
                    <div class="text-red-500  text-sm">
                        {{ $message }}
                    </div>
                   @enderror
        

                <label for="city" class="block my-2">City*</label>
                <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB] @error('city') border-2 border-red-500 @enderror" value="{{ old('city') }}" name="city">
                 @error('city')
                    <div class="text-red-500  text-sm">
                        {{ $message }}
                    </div>
                   @enderror


                <label for="state" class="block my-2">Country*</label>
                <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB] @error('state') border-2 border-red-500 @enderror" value="{{ old('state') }}" name="state">
                 @error('state')
                    <div class="text-red-500  text-sm">
                        {{ $message }}
                    </div>
                   @enderror

                <label for="salary" class="block my-2">Salary*</label>
                <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB] @error('salary') border-2 border-red-500 @enderror" name="salary" id="salary" readonly>
                <div id="slider-range" class="my-4"></div>
                 @error('salary')
                    <div class="text-red-500  text-sm">
                        {{ $message }}
                    </div>
                   @enderror
                  

             <label for="description" class="block my-2">Job Description*</label>
             <textarea name="description" id="editor">{{ old('description') }}</textarea>
             @error('description')
                    <div class="text-red-500  text-sm">
                        {{ $message }}
                    </div>
                   @enderror
             
    
                <button type="submit" class="bg-[#DBECF0] text-[#34BAA5] font-semibold uppercase shadow-xl block my-4 py-3 px-8 rounded-md text-sm hover:text-white hover:bg-[#34BAA5]">Post Job &ensp;<i class="fa fa-arrow-circle-right"></i></button>
 
        </form>

    
        
     </div>
       
</section>
    
@endsection