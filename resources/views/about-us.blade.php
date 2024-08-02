@extends('layouts.applicant')
@section('content')
<div class="bg-primary">
  <div class="container mx-auto">
      <div class="flex flex-col w-full md:flex-row md:justify-evenly md:items-stretch">
          <div class="flex-1 min-h-[300px] relative overflow-hidden">
              <div class="absolute inset-0 z-10 bg-custom-gradient-x "></div>
              <img class="absolute top-0 object-cover min-w-full min-h-full" src="{{ asset('img/stock/landing-04.jpg') }}" alt="Sample Image">
          </div>
          <div class="bg-primary text-white p-10 m-0 md:w-[45%] flex flex-col">
              <img src="{{ asset('img/logo/nwn-logo.png') }}" alt="Northwest Nurses">
              <p class="mb-3 text-xl leading-5 text-md">Conceived in 2020, Founded in 2023. Founded by Nurses for Nurses.</p>
              <p class="mt-5 mb-3 text-lg leading-5 text-md ">Having experienced the challenges of travel nursing firsthand, we understand the frustration of long wait times for recruiter responses, payroll issues, etc. We're committed to providing a personalized experience for travel nurses and allied health professionals, ensuring they receive the respect they deserve. Our goal is to grow thoughtfully, always staying within our means so we can maintain timely communication and build strong, personalized relationships with our professionals.</p>
          </div>
      </div>
  </div>
</div>
<div class="container flex flex-col items-center justify-center gap-12 py-10 mx-auto">
  <div class="flex flex-col items-center justify-between w-full gap-8">
    <div class="max-w-[500px] flex flex-col gap-2 basis-1/3">
      <h1 class="text-3xl font-extrabold text-center">Core Values</h1>
      <hr class="w-32 mx-auto border-2 border-primary">
      <p class="text-lg text-center">Communication, Connections, Travel experiences, Fair & Competitive Pay, Relationships, and Opportunity</p>
    </div>
    <div class="flex flex-col items-center justify-around w-full gap-5 lg:flex-row">
      <div class="max-w-[500px] flex-grow flex flex-col gap-2 basis-1/3">
        <h1 class="text-3xl font-extrabold text-center">Our Mission</h1>
        <hr class="w-32 mx-auto border-2 border-primary">
        <p class="text-lg text-center">To provide personalized travel experiences to professional health care workers to meet the needs of the industry while opportunity to explore the North West Territory.</p>
      </div>  
      <div class="max-w-[500px] flex-grow flex flex-col gap-2 basis-1/3">
        <h1 class="text-3xl font-extrabold text-center">Our Vision</h1>
        <hr class="w-32 mx-auto border-2 border-primary">
        <p class="text-lg text-center">Maintain high-quality health care personnel with competitive pay and consistent communication.</p>
      </div>
    </div>
  </div>
</div>
<div class="w-full bg-gray-300">
  <div class="container py-10 mx-auto">
    <h1 class="text-3xl font-extrabold text-center">Founders</h1>
    <div class="flex flex-col items-center justify-around gap-5 mt-5 lg:flex-row lg:items-start">
      <div class="flex flex-col items-center justify-center basis-1/3">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-16">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
        </svg>
        <h3 class="text-xl font-semibold text-center">Garey Robinson</h3>
        <p class="text-lg italic text-center text-slate-600">Founder, General Operations Manager</p> 
      </div>
      <div class="flex flex-col items-center justify-center basis-1/3">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-16">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
        </svg>
        <h3 class="text-xl font-semibold text-center">Enrico Faraci</h3>
        <p class="text-lg italic text-center text-slate-600">Operations Manager, Co-Founder - Allied Health</p> 
      </div>
      <div class="flex flex-col items-center justify-center basis-1/3">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-16">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
        </svg>
        <h3 class="text-xl font-semibold text-center">Brandon Emmett</h3>
        <p class="text-lg italic text-center text-slate-600">Chief Procurement Officer, Co-Founder</p> 
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script>
  
</script>
@endsection