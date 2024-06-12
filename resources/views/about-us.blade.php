@extends('layouts.applicant')
@section('content')
<div class="bg-primary">
  <div class="container mx-auto">
      <div class="flex flex-col md:flex-row md:justify-evenly md:items-stretch w-full">
          <div class="flex-1 min-h-[300px] relative overflow-hidden">
              <div class="bg-custom-gradient-x absolute inset-0 z-10 "></div>
              <img class="min-w-full min-h-full absolute object-cover top-0" src="{{ asset('img/stock/landing-04.jpg') }}" alt="Sample Image">
          </div>
          <div class="bg-primary text-white p-10 m-0 md:w-[45%] flex flex-col">
              <h2 class="text-4xl font-bold mb-3">Northwest Nurses</h2>
              <p class="text-md leading-5 mb-3 text-xl">Alaska-based company in Anchorage, Alaska.</p>
              <p class="text-md leading-5 mt-5 mb-3 text-lg ">Conceived in 2020, Founded in 2023. Founded by Nurses for Nurses. As experienced travel personel ourselves, we know the troubles of traveling and having bad contracts. It would take weeks for the recruiter to get back to us. Payroll issues. We want to personalize the experience for travel nurses and give them the respect that they deserve. Our goal is to never grow beyond our means, we always want to be able to reach out to our nurses in a reasonable time frame.</p>
          </div>
      </div>
  </div>
</div>
<div class="container mx-auto flex flex-col justify-center items-center p-10 gap-12">
  <div class="flex flex-col md:flex-row gap-8 w-full justify-between items-start">
    <div class="flex-grow flex flex-col gap-2 basis-1/3">
      <h1 class="text-3xl font-extrabold text-center md:text-left">Our Mission</h1>
      <hr class="border-2 w-16 border-primary mx-auto md:mx-0">
      <p class="text-center md:text-left">To provide personalized travel experiences to professional health care workers to meet the needs of the industry while opportunity to explore the North West Territory.</p>
    </div>
    <div class="flex-grow flex flex-col gap-2 basis-1/3">
      <h1 class="text-3xl font-extrabold text-center md:text-left">Our Vision</h1>
      <hr class="border-2 w-16 border-primary mx-auto md:mx-0">
      <p class="text-center md:text-left">Maintain high-quality health care personnel with competitive pay and consistent communication.</p>
    </div>
    <div class="flex-grow flex flex-col gap-2 basis-1/3">
      <h1 class="text-3xl font-extrabold text-center md:text-left">Core Values</h1>
      <hr class="border-2 w-16 border-primary mx-auto md:mx-0">
      <p class="text-center md:text-left">Communication, Connections, Travel experiences, Fair & Competitive Pay, Relationships, and Opportunity</p>
    </div>
  </div>
  <hr class="border-2 border-primary w-full">
  <div class="w-full">
    <h1 class="text-3xl font-extrabold text-center">Founders</h1>
    <div class="flex flex-col gap-5 lg:flex-row justify-around items-center lg:items-start mt-5">
      <div class="flex flex-col justify-center items-center basis-1/3">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-16">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
        </svg>
        <h3 class="font-semibold text-lg text-center">Garey Robinson</h3>
        <p class="text-slate-600 italic text-center">Founder, General Operations Manager</p> 
      </div>
      <div class="flex flex-col justify-center items-center basis-1/3">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-16">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
        </svg>
        <h3 class="font-semibold text-lg text-center">Enrico Faraci</h3>
        <p class="text-slate-600 italic text-center">Operations Manager, Co-Founder - Allied Health</p> 
      </div>
      <div class="flex flex-col justify-center items-center basis-1/3">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-16">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
        </svg>
        <h3 class="font-semibold text-lg text-center">Brandon Emmett</h3>
        <p class="text-slate-600 italic text-center">Chief Procurement Officer, Co-Founder</p> 
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script>
  
</script>
@endsection