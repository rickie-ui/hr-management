@extends('layouts.app')

@section('content')


<main>
        <div class="text-justify mt-4 w-2/5 mx-auto space-y-2">
                <h2 class="text-3xl text-[#495057] font-bold">
                   Our Latest News
                </h2>

                <p class=" font-thin opacity-60 pb-10">
                    We thrive when coming up with innovative ideas but also understand that a smart concept should be supported with faucibus sapien odio measurable results.
                </p>
        </div>


        <div class="w-3/4 mx-auto  flex scroll-hide snap-mandatory snap-x space-x-4 py-8" style="overflow: auto">
           <article class="h-auto rounded-md shadow-md  snap-center py-4 px-2 shrink-0" style="width:350px" >
                    <img src="{{ asset('images/blog.jpg') }}" alt="blog" class="w-full rounded-md">  

               <div class="my-4 space-x-4 opacity-70">
                <i class="fa fa-user-circle"></i> Johnny Deeks
                <i class="fa fa-calendar-o"></i> 30 Oct 2022
               </div>

                <h3 class="text-xl font-semibold">Lorem ipsum dolor sit.</h3>

               <p class="opacity-70 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores repellat fuga adipisci pariatur omnis optio corrupti architecto! Labore, asperiores distinctio deleniti minima ab assumenda nemo maiores quam error alias magnam.</p>

              <a href="#" class="text-[#2CB39C] rounded-md  hover:opacity-80 duration-300">
                    Learn More &#8594
                </a>
             
           </article>

            <article class="h-auto rounded-md shadow-md  snap-center py-4 px-2 shrink-0" style="width:350px" >
                    <img src="{{ asset('images/blog.jpg') }}" alt="blog" class="w-full rounded-md">  

               <div class="my-4 space-x-4 opacity-70">
                <i class="fa fa-user-circle"></i> Johnny Deeks
                <i class="fa fa-calendar-o"></i> 30 Oct 2022
               </div>

                <h3 class="text-xl font-semibold">Lorem ipsum dolor sit.</h3>

               <p class="opacity-70 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores repellat fuga adipisci pariatur omnis optio corrupti architecto! Labore, asperiores distinctio deleniti minima ab assumenda nemo maiores quam error alias magnam.</p>

              <a href="#" class="text-[#2CB39C] rounded-md  hover:opacity-80 duration-300">
                    Learn More &#8594
                </a>
             
           </article>

            <article class="h-auto rounded-md shadow-md snap-center py-4 px-2 shrink-0" style="width:350px" >
                    <img src="{{ asset('images/blog.jpg') }}" alt="blog" class="w-full rounded-md">  

               <div class="my-4 space-x-4 opacity-70">
                <i class="fa fa-user-circle"></i> Johnny Deeks
                <i class="fa fa-calendar-o"></i> 30 Oct 2022
               </div>

                <h3 class="text-xl font-semibold">Lorem ipsum dolor sit.</h3>

               <p class="opacity-70 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores repellat fuga adipisci pariatur omnis optio corrupti architecto! Labore, asperiores distinctio deleniti minima ab assumenda nemo maiores quam error alias magnam.</p>

              <a href="#" class="text-[#2CB39C] rounded-md  hover:opacity-80 duration-300">
                    Learn More &#8594
                </a>
             
           </article>

            <article class="h-auto rounded-md shadow-md snap-center py-4 px-2 shrink-0" style="width:350px" >
                    <img src="{{ asset('images/blog.jpg') }}" alt="blog" class="w-full rounded-md">  

               <div class="my-4 space-x-4 opacity-70">
                <i class="fa fa-user-circle"></i> Johnny Deeks
                <i class="fa fa-calendar-o"></i> 30 Oct 2022
               </div>

                <h3 class="text-xl font-semibold">Lorem ipsum dolor sit.</h3>

               <p class="opacity-70 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores repellat fuga adipisci pariatur omnis optio corrupti architecto! Labore, asperiores distinctio deleniti minima ab assumenda nemo maiores quam error alias magnam.</p>

              <a href="#" class="text-[#2CB39C] rounded-md  hover:opacity-80 duration-300">
                    Learn More &#8594
                </a>
             
           </article>

            <article class="h-auto rounded-md shadow-md snap-center py-4 px-2 shrink-0" style="width:350px" >
                    <img src="{{ asset('images/blog.jpg') }}" alt="blog" class="w-full rounded-md">  

               <div class="my-4 space-x-4 opacity-70">
                <i class="fa fa-user-circle"></i> Johnny Deeks
                <i class="fa fa-calendar-o"></i> 30 Oct 2022
               </div>

                <h3 class="text-xl font-semibold">Lorem ipsum dolor sit.</h3>

               <p class="opacity-70 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores repellat fuga adipisci pariatur omnis optio corrupti architecto! Labore, asperiores distinctio deleniti minima ab assumenda nemo maiores quam error alias magnam.</p>

              <a href="#" class="text-[#2CB39C] rounded-md  hover:opacity-80 duration-300">
                    Learn More &#8594
                </a>
             
           </article>

        </div>
 
</main>

<div class="w-48 h-48 bg-[#F0F6FA] rounded-full absolute  left-10  bottom-25 -z-50"></div>
<div class="w-48 h-48 bg-[#E8E6F8] rounded-full absolute  left-20  bottom-20 -z-50"></div>
<div class="w-48 h-48 bg-[#E8E6F8] rounded-full absolute right-96  bottom-56 -z-50"></div>

@endsection
