@extends('layouts.base')

@section('content')

<section class="mx-10 h-screen">
    <h3 class="text-xl">Account Information</h3>
    <p class="text-sm my-1"><span class="text-[#405189]">Verizon</span> <span class="opacity-50">/ Account / Profile</span></p>
      
     <div class="my-10 py-10 px-10 bg-white rounded-sm flex space-x-8">
     
        <div class="w-3/12 border-2  rounded-md text-center p-4">
            <img src="{{ asset('/images/avatar.png')}}" class="w-28 h-28 mx-auto rounded-full border-4 border-[#34BAA5] object-cover" alt="avatar">
            <h2 class="text-xl my-1 font-semibold">{{$admin->fullName}}</h2>
            <h3 class="text-sm opacity-60">Verizon Inc</h3>
            <hr class="my-4">
            <div class="flex space-x-4 justify-between text-justify px-2 opacity-50">
                <h2>Since:</h2>
                <h3>{{date_format(now()->parse($admin->created_at), 'd-m-Y' )}}</h3>
                
            </div>

            <hr class="my-4">

            <div class="flex space-x-4 justify-between px-2 opacity-50">
                <h2>Location:</h2>
                <h3>{{$admin->profile->country ?? ' '}}</h3>
            </div>

            <hr class="my-4">

            <div class="flex space-x-4 px-2  justify-between opacity-50">
                <h2>Mobile:</h2>
                <h3>{{$admin->profile->phone  ?? " "}}</h3>
            </div>

            <hr class="my-4">

            <div class="flex space-x-4  justify-betweenpx-2 opacity-50">
                <h2>Email:</h2>
                <h3 class="text-[#34BAA5]">{{$admin->email ?? ' '}}</h3>
            </div>
            

            <hr class="my-4">

        </div>

        <div class="w-9/12 border-2 rounded-md p-4">

            <h3 class="opacity-60  my-2">Account Settings</h3>

            @if(session('status'))
                <div class="bg-[#DBECF0] p-2 rounded-lg text-center text-[#34BAA5]" id="duration">
                    {{ session('status')}}
                </div>
            @endif
          <form action="/admin/{{$admin->id}}/profile" method="POST" enctype="multipart/form-data" >

                @csrf

                @method('PUT')

              <div class=" flex space-x-4">
                        <div class="w-full">
                            <label for="fullName" class="block my-2">Full Name</label>
                            <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]" name="fullName" value="{{$admin->fullName}}">
                             @error('fullName')
                                <div class="text-red-500 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="address" class="block my-2">Address</label>
                            <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]" name="address" value="{{$admin->profile->address ?? ''}}">
                             @error('address')
                                <div class="text-red-500 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>

                <div class=" flex space-x-4">
                        <div class="w-full">
                            <label for="email" class="block my-2">Email</label>
                            <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]" name="email" value="{{$admin->email}}">
                             @error('email')
                                <div class="text-red-500 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="phone" class="block my-2">Phone</label>
                            <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]" name="phone" value="{{$admin->profile->phone ?? ''}}">
                             @error('phone')
                                <div class="text-red-500 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>

                 <div class=" flex space-x-4">
                        <div class="w-full">
                            <label for="city" class="block my-2">City</label>
                            <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]" name="city" value="{{$admin->profile->city ?? ''}}">
                             @error('city')
                                <div class="text-red-500 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="country" class="block my-2">Country</label>
                            <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]" name="country" value="{{$admin->profile->country ?? ''}}">
                             @error('country')
                                <div class="text-red-500 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
             
             {{-- <label for="avatar" class="block my-2">Avatar</label>
             <input type="file" class="py-2 rounded-md outline-none hover:cursor-pointer" name="avatar" value="{{$admin->profile->avatar ?? ''}}">
              @error('avatar')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
              @enderror --}}

          
            <button type="submit" class="bg-[#DBECF0] text-[#34BAA5] font-semibold uppercase shadow-xl block my-4 py-3 px-8 rounded-md text-sm hover:text-white hover:bg-[#34BAA5]">Update &ensp;<i class="fa fa-arrow-circle-right"></i></button>
 
        </form>
        </div>
     </div>
    
 
    
</section>
    
@endsection