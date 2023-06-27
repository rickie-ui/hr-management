@extends('layouts.app')

@section('content')


<main>
        <div class=" text-justify mt-24 w-2/5 mx-auto tracking-wider space-y-10">
                <h2 class="text-5xl text-[#495057] font-bold">
                   Get In Touch
                </h2>

                <p class=" font-thin opacity-60 pb-10">
                    We thrive when coming up with innovative ideas but also understand that a smart concept should be supported with faucibus sapien odio measurable results.
                </p>
        </div>

        <section class="flex justify-between w-5/6 mx-auto mb-10">

           <div class="w-2/4">
                <h2 class="text-[#495057] opacity-70 font-semibold">OFFICE ADDRESS 1:</h2>
                <p class="mb-6">1419 Westwood Blvd <br> Los Angeles, CA</p>
                

                <h2 class="text-[#495057] opacity-70 font-semibold">OFFICE ADDRESS 2:</h2>
                <p class="mb-6">1871 W 57th Street <br> Los Angeles, CA</p>

                <h2 class="text-[#495057] opacity-70 font-semibold">WORKING HOURS:</h2>
                <p class="mb-6">10:00am to 5:00pm</p>
            </div>

            <div class="w-2/4">
                @if(session('status'))
                    <div class="bg-[#DBECF0] p-2 rounded-lg text-center text-[#34BAA5]" id="duration">
                        {{ session('status')}}
                    </div>
                @endif
                <form action="{{route('contact')}}" method="POST">

                    @csrf

                    <div class=" flex space-x-4">
                        <div class="w-full">
                            <label for="full_name" class="block mt-4">Name</label>
                            <input type="text" class="w-full px-4 py-2 rounded-sm outline-none @error('full_name') border-2 border-red-500 @enderror" value="{{ old('full_name') }}" name="full_name" placeholder="Your name*">
                             @error('full_name')
                                <div class="text-red-500  text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="w-full">
                            <label for="email" class="block mt-4">Email</label>
                            <input type="text" class="w-full px-4 py-2 rounded-sm outline-none @error('email') border-2 border-red-500 @enderror" value="{{ old('email') }}" name="email" placeholder="Your email*">
                            @error('email')
                                <div class="text-red-500  text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>


                    <label for="subject" class="block mt-4">Subject</label>
                    <input type="text" name="subject" class="w-full px-4 py-2 rounded-sm outline-none @error('subject') border-2 border-red-500 @enderror" value="{{ old('subject') }}" placeholder="Your subject">
                    @error('subject')
                        <div class="text-red-500  text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                    
                    <label for="message" class="block mt-4">Message</label>
                    <textarea name="message" class="w-full px-4 py-2 resize-y outline-none @error('message') border-2 border-red-500 @enderror" value="{{ old('message') }}"  placeholder="Your message..."></textarea>
                    @error('message')
                        <div class="text-red-500  text-sm">
                            {{ $message }}
                        </div>
                    @enderror

                    <button type="submit" class="bg-[#405189] text-white rounded-md px-4 py-2 hover:opacity-80 mt-2 float-right">Send Message</button>
                        
                </form> 
            </div>

        </section> 
</main>

<div class="w-48 h-48 bg-[#F0F6FA] rounded-full absolute  left-10  bottom-25 -z-50"></div>
<div class="w-48 h-48 bg-[#E8E6F8] rounded-full absolute  left-20  bottom-20 -z-50"></div>
<div class="w-48 h-48 bg-[#E8E6F8] rounded-full absolute right-96  bottom-56 -z-50"></div>

@endsection
