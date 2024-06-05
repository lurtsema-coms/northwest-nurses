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
          <div>
            <p>CONTACT NUMBER:</p>
            <p class="font-bold">+1 (907) 000 0000</p>
          </div>
          <div>
            <p>EMAIL:</p>
            <p class="font-bold">info@northwestnursesll.com</p>
          </div>
          <div>
            <p>ADDRESS:</p>
            <p class="font-bold">095 Anchorage, Alaska, United States, 99675</p>
          </div>
          <div>
            <p>WEBSITE:</p>
            <p class="font-bold">www.northwestnursesllc.com</p>
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