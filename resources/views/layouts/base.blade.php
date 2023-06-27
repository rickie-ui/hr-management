<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- JQuery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

      {{-- Data tables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>

  {{-- editor --}}
    <script defer src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

    {{-- custom js --}}
    <script defer src="{{asset('custom.js')}}"></script>

    {{-- including socials icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- including css using vite --}}
     @vite('resources/css/master.css')

    <title>Anna</title>
</head>
<body class="antialiased bg-[#F3F8FB] max-lg:hidden" >

<section class="flex min-h-screen">
    <aside class="bg-white w-2/12 h-auto border-0 border-r-2">
      <h3 class="text-3xl text-center my-4 font-bold text-[#405189]">Verizon</h3>

      <h3 class="mx-4 text-[#405189] opacity-50 uppercase mt-10 mb-3 text-xs">menu</h3>

      <ul class="opacity-70">
        <li class="text-md duration-300 hover:text-white hover:bg-[#405189] hover:rounded-sm">
          <a href="{{route('dashboard')}}" class="block px-4 py-2 {{ request()->segment(2) == 'dashboard' ? 'bg-[#405189] text-white' : '' }}"><i class="fa fa-dashboard"></i>&ensp; Dashboard</a>
        </li>

       <li class="text-md duration-300 hover:text-white hover:bg-[#405189] hover:rounded-sm">
          <a href="{{route('employees')}}" class="block px-4 py-2 {{ request()->segment(2) == 'employees' ? 'bg-[#405189] text-white' : '' }}"><i class="fa fa-users"></i>&ensp; Employees</a>
        </li>


        <li class="text-md duration-300 hover:text-white hover:bg-[#405189] hover:rounded-sm">
          <a href="{{route('payroll')}}" class="block px-4 py-2 {{ request()->segment(2) == 'payroll' ? 'bg-[#405189] text-white' : '' }}"><i class="fa fa-credit-card"></i>&ensp; Payroll</a>
        </li>

        <li class="text-md duration-300 hover:text-white hover:bg-[#405189] hover:rounded-sm">
          <a href="{{route('leave')}}" class="block px-4 py-2 {{ request()->segment(2) == 'leave' ? 'bg-[#405189] text-white' : '' }}"><i class="fa fa-list-alt"></i>&ensp; Leave Requests</a>
        </li>

        <li class="text-md duration-300 hover:text-white hover:bg-[#405189] hover:rounded-sm">
          <a href="{{route('recruitment')}}" class="block px-4 py-2 {{ request()->segment(2) == 'recruitment' ? 'bg-[#405189] text-white' : '' }}"><i class="fa fa-file"></i>&ensp; Recruitments</a>
        </li>

         <li class="text-md my-2 hover:text-red-500">

          <form action="{{ route('logout') }}" method="POST">

                 @csrf

                 <button type="submit" class="px-4 py-2">
                  <i class="fa fa-sign-out"></i>&ensp; Sign Out
                </button>
             </form>
        </li>
      </ul>
    </aside>

    <main class="bg-[#F2F2F8] w-10/12 h-auto">
      <header class="flex h-16 w-10/12 justify-between  px-3 bg-white fixed top-0  z-50 shadow-sm">
        <div class="flex items-center justify-center space-x-4">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6 cursor-pointer text-gray-500">
            <path fill-rule="evenodd" d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75H12a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
          </svg>

          <input type="search" placeholder="Search..." name="search" class="rounded-sm bg-gray-200 text-gray-500 px-4 py-1 outline-0 focus:ring-2 focus:ring-indigo-400" />
        </div>

        <div class="flex items-center justify-center space-x-2">
           
           <a href="{{route('dashboard')}}" class="h-10 w-10 p-2 text-md flex justify-center items-center text-gray-500 hover:rounded-full hover:bg-gray-300 hover:text-[#405189]">
              <i class="fa fa-bar-chart"></i>
            </a>

          <a href="{{route('payroll')}}" class="h-10 w-10 p-2 text-md flex justify-center items-center text-gray-500 hover:rounded-full hover:bg-gray-300 hover:text-[#405189]">
                <i class="fa fa-calendar-o"></i>
          </a>
          

          <a href="{{route('leave')}}" class="h-10 w-10 p-2 text-md flex justify-center items-center text-gray-500 hover:rounded-full hover:bg-gray-300 hover:text-[#405189]">
            <i class="fa fa-bell"></i>
          </a>

          <a href="/admin/{{Auth::guard('admin')->user()->id}}/profile" class="h-10 w-10 p-2 text-xl flex justify-center items-center text-gray-500 hover:rounded-full hover:bg-gray-300 hover:text-[#405189]">
                  <i class="fa fa-gear"></i>
          </a>

          <div class="flex items-center  border-0 border-l-2 px-2  space-x-3">
            <img src="https://www.shutterstock.com/image-photo/fruit-stall-by-roadside-bog-600w-774140263.jpg" class="h-12 w-12 rounded-full border-2 border-[#34BAA5] object-cover" />
            <div class="whitespace-nowrap font-semibold text-black">
                <a href="/admin/{{Auth::guard('admin')->user()->id}}/profile" class="hover:underline {{ request()->segment(2) == 'profile' ? 'underline' : '' }}">{{ Auth::guard('admin')->user()->fullName }}</a> <br/>
                <span class="font-normal text-gray-400">Founder</span>
            </div>
      </div>

      

        </div>
      </header>
        <section class="mt-24">

            @yield('content')

        </section>

    </main>
</section>

 
   
</body>
</html>