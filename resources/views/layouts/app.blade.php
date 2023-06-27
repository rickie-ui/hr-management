<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- including socials icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- including css using vite --}}
     @vite('resources/css/app.css')

    <title>Anna</title>
</head>
<body class="antialiased bg-[#F3F8FB] flex flex-col min-h-screen justify-between overflow-x-hidden" >

<header class=" w-full shadow-md flex justify-between items-center px-20 h-16">
    <h2 class="hover:text-[#2CB39C] text-3xl  font-bold  tracking-widest">Verizon</h2>
        <ul class="flex space-x-4  items-center justify-center text-lg font-light">
             <li>
                <a href="{{route('index')}}" class="hover:text-[#2CB39C]  px-4 py-2  {{ request()->is('/') ? 'text-[#2CB39C]' : '' }}">Home</a>
            </li> 
            <li>
                <a href="{{route('blog')}}" class="hover:text-[#2CB39C]  px-4 py-2   {{ request()->segment(1) == 'blog' ? 'text-[#2CB39C]' : '' }}">Blog</a>
            </li> 
            <li>
                <a href="{{route('careers')}}" class="hover:text-[#2CB39C] px-4 py-2  {{ request()->segment(1) == 'careers' ? 'text-[#2CB39C] ' : '' }}">Careers</a>
            </li>
             <li>
                <a href="{{route('contact')}}" class="hover:text-[#2CB39C]  px-4 py-2  {{ request()->segment(1) == 'contact' ? 'text-[#2CB39C] ' : '' }}">Contact Us</a>
            </li>
        </ul>
</header>

    @yield('content')


<footer class="bg-[#212529] h-48 w-full" >

    <div class="w-5/6 text-gray-400 flex justify-between items-center px-10 mx-auto pb-12">
        <div class="">
        <h2 class="text-white">Verizon</h2>
        <p>This helps minimize your work and improve productivity<br> accross all the organization's department.Ensure teamwork</p>
        </div>
        <div class="">
            <h2 class="text-white pt-2">Company</h2>
            <ul>
                <li class="cursor-pointer hover:text-white ">
                    About us
                </li>
                <li class="cursor-pointer hover:text-white ">
                    Timeline
                </li>
                <li class="cursor-pointer hover:text-white ">
                    Gallery
                </li>
            </ul>
        </div>
        <div class="">
             <h2 class="text-white">Support</h2>
            <ul>
                <li class="cursor-pointer hover:text-white ">
                    FAQ
                </li>
                <li class="cursor-pointer hover:text-white ">
                    Contact
                </li>
            </ul>
        </div>
    </div>




    <div class=" w-5/6 text-white flex justify-between items-center px-10 mx-auto">
    <h3>2023 &copy; Improving Productivity</h3>
    
        <ul class="flex space-x-4">
            <li class="h-10 w-10 flex justify-center items-center text-gray-400 rounded-full bg-[#2C3034] hover:bg-[#3B5998] hover:text-white ">
                <a href="#">
                    <i class="fa fa-facebook"></i>
                </a>
            </li>
            <li class="h-10 w-10 flex justify-center items-center text-gray-400 rounded-full bg-[#2C3034] hover:bg-[#55ACEE] hover:text-white ">
                <a href="#">
                    <i class="fa fa-twitter"></i>
                </a>
            </li> 
            <li class="h-10 w-10 flex justify-center items-center text-gray-400 rounded-full bg-[#2C3034] hover:bg-[#007bb5] hover:text-white ">
                <a href="#">
                    <i class="fa fa-linkedin"></i>
                </a>
            </li>
             <li class="h-10 w-10 flex justify-center items-center text-gray-400 rounded-full bg-[#2C3034] hover:bg-[#ff5700] hover:text-white ">
                <a href="#">
                    <i class="fa fa-reddit"></i>
                </a>
            </li>
        </ul>

    </div>

</footer>
    
</body>
</html>