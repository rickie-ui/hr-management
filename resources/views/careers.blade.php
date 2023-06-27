@extends('layouts.app')

@section('content')


<main>
        <div class=" text-justify mt-24 w-2/5 mx-auto space-y-6">
                <h2 class="text-3xl text-[#495057] font-bold">
                   Find Your Next Job And Build Your Dream Here
                </h2>

                <p class=" font-thin opacity-60 pb-10">
                   We post open job opportunities make sure to check regularly  and apply  We'll quickly match you with the requirements and get back to you.
                </p>
        </div>


    <h3 class="text-center my-8 text-3xl font-semibold">Current Openings</h3>

<section class="flex flex-wrap w-3/4 h-auto mx-auto mb-10 ">

     @foreach($vacancies as $vacancy)
        <div class="flex justify-between items-center  bg-slate-50 shadow-xl   w-2/5 mb-10 mx-10 py-5">
                    <aside class="h-14 w-14 mx-4 shrink-0 flex justify-center items-center rounded-md bg-[#FFEFD6] text-[#FEB651] text-2xl">
                        <i class="fa fa-forumbee"></i>
                    </aside>

                    <aside>
                        <a href="/careers/{{$vacancy->id}}/apply" class="hover:text-[#2CB39C]">{{$vacancy->title}}</a>
                        <div class="opacity-70 space-x-4 whitespace-nowrap"> 
                            <div class="fa fa-map-marker "></div>&ensp;{{$vacancy->state}} &emsp;
                                {{$vacancy->salary}}
                            <a href="/careers/{{$vacancy->id}}/apply" class="hover:text-[#3559C0] font-semibold  capitalize">Apply Now &#8594 </a>
                        </div>
                    </aside>

                    <aside class=" h-12 w-12 flex justify-center items-center  rounded-md hover:bg-[#ECEDF3]  hover:text-[#405189] duration-300">
                        <i class="fa fa-bookmark-o"></i>
                    </aside>

            </div> 
    @endforeach



 </section> 
</main>

<div class="w-48 h-48 bg-[#F0F6FA] rounded-full absolute  left-10  bottom-25 -z-50"></div>
<div class="w-48 h-48 bg-[#E8E6F8] rounded-full absolute  left-20  bottom-20 -z-50"></div>
<div class="w-48 h-48 bg-[#E8E6F8] rounded-full absolute right-96  bottom-56 -z-50"></div>

@endsection
