@extends('layouts.app')

@section('content')


<main class="w-9/12 mx-auto">

   
 
    <h2 class="text-2xl my-4 font-semibold">{{$result->title}}</h2>
    <p class="text-lg  my-2">Location:&ensp;{{$result->state}}</p>
    <article class="w-full mx-auto">
        
        {!! $result->description !!}



    <a href="{{route('careers')}}" class="bg-[#DBECF0]  border-2 inline-block my-10 border-[#34BAA5] py-2 px-4  rounded-md text-sm hover:text-white hover:bg-[#34BAA5]"><i class="fa fa-arrow-circle-left"></i>&ensp; Back To Careers</a>
        

    <section class="bg-white p-4 my-10 rounded-sm">
        <h2 class="text-2xl my-2 font-semibold">Apply for this Job</h2>

        @if(session('status'))
            <div class="bg-[#DBECF0] p-2 rounded-lg text-center text-[#34BAA5]">
                {{ session('status')}}
            </div>
        @endif

        <form action="/careers/{{$result->id}}/apply" method="POST" enctype="multipart/form-data">

            @csrf

              <div class=" flex space-x-4">
                        <div class="w-full">
                            <label for="first_name" class="block my-2">First Name*</label>
                            <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB] @error('first_name') border-2 border-red-500 @enderror" value="{{ old('first_name') }}" name="first_name">
                            @error('first_name')
                                <div class="text-red-500  text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="w-full">
                            <label for="last_name" class="block my-2">Last Name*</label>
                            <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB] @error('last_name') border-2 border-red-500 @enderror"
                             value="{{ old('last_name') }}" name="last_name">
                             @error('last_name')
                                <div class="text-red-500  text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>

                <div class=" flex space-x-4">
                        <div class="w-full">
                            <label for="email" class="block my-2">Email*</label>
                            <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB] @error('email') border-2 border-red-500 @enderror" value="{{ old('email') }}" name="email">
                             @error('email')
                                <div class="text-red-500  text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="phone" class="block my-2">Phone*</label>
                            <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB] @error('phone') border-2 border-red-500 @enderror" value="{{ old('phone') }}" name="phone">
                              @error('phone')
                                <div class="text-red-500  text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>

             <label for="cover" class="block my-2">Cover Letter*</label>
             <textarea name="cover" class="w-full px-4 py-2 border-2 rounded-md resize-y outline-none focus:bg-[#F3F8FB]@error('cover') border-2 border-red-500 @enderror" value="{{ old('cover') }}" rows="4"></textarea>
               @error('cover')
                    <div class="text-red-500  text-sm">
                        {{ $message }}
                    </div>
                @enderror
             
             <label for="attachment" class="block my-2">Attachment*</label>
             <input type="file" class="py-2 rounded-md outline-none hover:cursor-pointer @error('attachment') border-2 border-red-500 @enderror" value="{{ old('attachment') }}" name="attachment">
             @error('attachment')
                    <div class="text-red-500  text-sm">
                        {{ $message }}
                    </div>
                @enderror

           
            <button type="submit"  class="bg-[#34BAA5] font-semibold uppercase shadow-xl block my-10 py-3 px-10 rounded-md text-sm text-white hover:text-black hover:bg-[#DBECF0]">Apply &ensp;<i class="fa fa-arrow-circle-right"></i></button>
 
        </form>


    </section>

 </article>

</main>

<div class="w-48 h-48 bg-[#F0F6FA] rounded-full absolute  left-10  bottom-25 -z-50"></div>
<div class="w-48 h-48 bg-[#E8E6F8] rounded-full absolute  left-20  bottom-20 -z-50"></div>
<div class="w-48 h-48 bg-[#E8E6F8] rounded-full absolute right-96  bottom-56 -z-50"></div>

@endsection
