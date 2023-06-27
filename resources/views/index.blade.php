@extends('layouts.app')

@section('content')


<main class="h-auto py-10 flex">
        <div class=" text-justify mt-28 w-2/5 mx-auto tracking-wider space-y-10">
                <h2 class="text-5xl text-[#495057] font-bold">
                    The better way to manage your employee with Velzon
                </h2>

                <p class=" font-thin opacity-60 pb-10">
                    This helps minimize your work and improve productivity  accross all the organization's department.Ensure teamwork and all in one tools to manage  your organization
                </p>


                <a href="{{route('contact')}}" class="bg-[#405189] text-white rounded-md px-4 py-2 hover:opacity-80">
                    Contact Us &#8594
                </a>
        </div>
        
            <img src="{{ asset('images/job.png') }}" alt="hero" class="">      
</main>

<div class="w-48 h-48 bg-[#F0F6FA] rounded-full absolute  left-10  bottom-25 -z-50"></div>
<div class="w-48 h-48 bg-[#E8E6F8] rounded-full absolute  left-20  bottom-20 -z-50"></div>
<div class="w-48 h-48 bg-[#E8E6F8] rounded-full absolute right-96  bottom-56 -z-50"></div>

@endsection
