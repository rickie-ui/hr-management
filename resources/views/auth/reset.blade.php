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
    <title>reset</title>
</head>
<body class="antialiased bg-[#F3F8FB]">

    <section class=" shadow-lg rounded-md mx-auto px-4 py-4 my-10 w-2/6" >
            <h2 class="my-4 text-2xl">Forgot Password?</h2>
            <p class="mb-4 opacity-50 bg-[#FEF4E4] py-2 px-2 text-center">Enter your email and instructions will be sent to you!</p>

            @if(session('status'))
                <div class="bg-[#DBECF0] p-1 text-center text-[#34BAA5]">
                    {{ session('status')}}
                </div>
            @endif

            <form action="{{route('reset')}}" method="POST">

                 @csrf

                <label for="email" class="block py-2">Email</label>
                <input type="text" name="email" placeholder="Enter email address" class=" w-full px-4 py-2 outline-none rounded-md @error('email') border-2 border-red-500 @enderror" value="{{ old('email') }}">

                @error('email')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror

                <button type="submit" class="w-full bg-[#2CB39C] py-2 px-4 my-4 rounded-md text-white hover:opacity-70">
                    Send Reset Link
                </button>
            </form>

           
    </section>

    
</body>
</html>