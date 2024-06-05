@extends('layouts.applicant')
@section('content')

<div class="px-3 bg-primary">
    <div class="container mx-auto px-3 flex flex-col  py-10 gap-5">
      <div class="flex flex-col items-center justify-center lg:flex-row lg:items-end gap-5">
        <div class="flex-grow w-full bg-slate-100 shadow-md p-10 rounded-xl max-w-[500px]">
          <h2 class="text-2xl font-bold text-center text-primary">Get In Touch</h2>
          <form action="" method="POST" class="flex flex-col gap-5">
            @csrf
            <div class="flex-grow">
              <label for="name" class="font-bold">Name</label>
              <x-text-input  id="name" class="block mt-1 w-full" type="text" name="name"  required/>
            </div>
            <div class="flex-grow">
              <label for="email" class="font-bold">Email</label>
              <x-text-input  id="email" class="block mt-1 w-full" type="text" name="email"  required/>
            </div>
            <div class="flex-grow">
              <label for="message" class="font-bold">Message</label>
              <textarea name="message" id="message" class="py-3 px-4 block w-full border-cyan-600 focus:border-cyan-600 dark:focus:border-cyan-600 focus:ring-cyan-600 dark:focus:ring-cyan-600 rounded-md shadow-sm" rows="6"></textarea>
            </div>
            <button class="bg-primary text-white py-2 rounded-md font-semibold" type="submit">SEND MESSAGE</button>
          </form>
        </div>
        <div class="flex-grow w-full flex flex-col justify-end gap-6 text-slate-50 p-10 rounded-xl max-w-[500px]">
          <div class="flex gap-3 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
            </svg>            
            <div>
              <p>CONTACT NUMBER:</p>
              <p class="font-bold">+1 (907) 000 0000</p>
            </div>
          </div>
          <div class="flex gap-3 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
            </svg>            
            <div>
              <p>EMAIL:</p>
              <p class="font-bold">info@northwestnursesll.com</p>
            </div>
          </div>
          <div class="flex gap-3 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
            </svg>            
            <div>
              <p>ADDRESS:</p>
              <p class="font-bold">095 Anchorage, Alaska, United States, 99675</p>
            </div>
          </div>
          <div class="flex gap-3 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
            </svg>            
            <div>
              <p>WEBSITE:</p>
              <p class="font-bold">www.northwestnursesllc.com</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
  
</script>
@endsection