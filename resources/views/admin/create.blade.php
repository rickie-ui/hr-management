@extends('layouts.base')

@section('content')

<section class="mx-10">
    <h3 class="text-xl">Manage Employees</h3>
    <p class="text-sm my-1"><span class="text-[#405189]">Verizon</span> <span class="opacity-50">/ Manage / Empoyee</span></p>
      
     <div class="my-8 p-8 bg-white rounded-sm w-2/4 mx-auto">

        <h2 class="text-md my-4 font-semibold opacity-50 bg-[#DBECF0] py-2 px-2 text-center">Fill in the correct details of the employee</h2>

        @if(session('status'))
                <div class="bg-[#DBECF0] p-2 rounded-lg text-center text-[#34BAA5] " id="duration">
                    {{ session('status')}}
                </div>
            @endif

         <form action="{{ route('create')}}" method="POST">
                 
                @csrf
                       
                <label for="fullName" class="block my-2">Full Name*</label>
                <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]  @error('fullName') border-2 border-red-500 @enderror" value="{{ old('fullName') }}" name="fullName">
                 @error('fullName')
                    <div class="text-red-500  text-sm">
                        {{ $message }}
                    </div>
                   @enderror
        
            
                <label for="email" class="block my-2">Email*</label>
                <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]  @error('email') border-2 border-red-500 @enderror" value="{{ old('email') }}" name="email">
                 @error('email')
                    <div class="text-red-500  text-sm">
                        {{ $message }}
                    </div>
                   @enderror


                <label for="position" class="block my-2">Position*</label>
                <select class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]  @error('position') border-2 border-red-500 @enderror" value="{{ old('position') }}" name="position" id="position">
                    <option>Select the position</option>
                    <option value="Associate Architect- Python">Associate Architect- Python</option>
                    <option value="Content Marketing Manager">Content Marketing Manager</option>
                    <option value="Senior Cloud Engineer">Senior Cloud Engineer</option>
                    <option value="Senior Engineer – PHP">Senior Engineer – PHP</option>
                </select>
                 @error('position')
                    <div class="text-red-500  text-sm">
                        {{ $message }}
                    </div>
                   @enderror

               <label for="salary" class="block my-2">Salary</label>
                <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]  @error('salary') border-2 border-red-500 @enderror" value="{{ old('salary') }}" name="salary">
                    @error('salary')
                        <div class="text-red-500  text-sm">
                            {{ $message }}
                        </div>
                    @enderror

                
               <label for="password" class="block py-2">Password</label>
                <input type="password" name="password" placeholder="Enter password"  class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]  @error('password') border-2 border-red-500 @enderror">
                @error('password')
                    <div class="text-red-500  text-sm">
                        {{ $message }}
                    </div>
                @enderror


                <label for="password_confirmation" class="block py-2">Repeat Password</label>
                <input type="password" name="password_confirmation" placeholder="Enter password again"  class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]  @error('password_confirmation') border-2 border-red-500 @enderror">
                 @error('password_confirmation')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                 @enderror

                <button type="submit" class="bg-[#DBECF0] text-[#34BAA5] font-semibold uppercase shadow-xl block mt-4 py-3 px-8 rounded-md text-sm hover:text-white hover:bg-[#34BAA5]">Create Account &ensp;<i class="fa fa-arrow-circle-right"></i></button>
 
        </form>

    
        
     </div>
       
</section>
    
@endsection