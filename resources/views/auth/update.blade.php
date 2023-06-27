<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     {{-- including socials icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- including css using vite --}}
     @vite('resources/css/app.css')
    <title>update</title>
</head>
<body class="antialiased bg-[#F3F8FB]">

    <section class=" shadow-lg rounded-md mx-auto px-4 py-4 my-10 w-2/6" >
            <h2 class="my-4 text-2xl">Create new password</h2>
            <p class="mb-4 opacity-50 bg-[#FEF4E4] py-2 px-2 text-center">Your new password must be different from previous used password.</p>

            @if(session('status'))
                <div class="bg-[#DBECF0] p-1 text-center text-[#34BAA5]">
                    {{ session('status')}}
                </div>
            @endif

            <form action="{{route('update', ['token' => $token])}}" method="POST">

                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <label for="email" class="block py-2">Email</label>
                <input type="text" name="email" placeholder="Enter email address" class=" w-full px-4 py-2 outline-none rounded-md @error('email') border-2 border-red-500 @enderror" value="{{ old('email') }}">
                @error('email')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror

                 <label for="password" class="block py-2">New Password</label>
                <input type="password" name="password" placeholder="Enter password" class=" w-full px-4 py-2 outline-none rounded-md  @error('password') border-2 border-red-500 @enderror">
                @error('password')
                    <div class="text-red-500  text-sm">
                        {{ $message }}
                    </div>
                @enderror


                <label for="password_confirmation" class="block py-2">Confirm Password</label>
                <input type="password" name="password_confirmation" placeholder="Enter password again" class="w-full px-4 py-2 outline-none mb-2 rounded-md @error('password_confirmation') border-2 border-red-500 @enderror">
                 @error('password_confirmation')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                 @enderror

                <button type="submit" class="w-full bg-[#2CB39C] py-2 px-4 my-4 rounded-md text-white hover:opacity-70">
                    Reset Password
                </button>
            </form>

           
    </section>

    
</body>
</html>