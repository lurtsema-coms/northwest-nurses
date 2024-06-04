<div class="sticky top-0 mx-auto max-w-screen-md bg-white border-2 border-gray-300 gap-5 rounded-xl overflow-hidden shadow-md">
  <div class="w-full max-h-64 overflow-hidden">
      <img class="w-full" src="https://www.shutterstock.com/image-photo/aerial-view-sunset-over-downtown-600nw-2000550491.jpg" alt="">
  </div>
  <div class="p-5">
      <div class="my-5">
          <h2 class="font-bold text-2xl">PRN Medical Surgical, ANCHORAGE, ALASKA</h2>
          <h2 class="font-bold text-2xl text-primary">${{ rand(200, 500) }} - ${{rand(501, 999)}} weekly</h2>
          <div class="flex flex-col sm:flex-row justify-between mt-5 gap-5">
              <p class="text-gray-500">Job Contact | Job ID: {{ rand(0, 9) }}{{ rand(0, 9) }}{{ rand(0, 9) }}{{ rand(0, 9) }}{{ rand(0, 9) }}{{ rand(0, 9) }}{{ rand(0, 9) }}{{ rand(0, 9) }}{{ rand(0, 9) }}</p>
              @auth
                <button class="bg-primary hover:opacity-75 text-white px-5 py-2 rounded-full">Apply Now</button>
              @endauth
              @guest
                <a href="/login" class="bg-primary hover:opacity-75 text-white px-5 py-2 rounded-full">Login to Apply</a>
              @endguest
          </div>
      </div>
      <hr class="border-t-2 border-gray-300">
      <div class="overflow-y-auto max-h-[450px]">
          <div class="my-5">
              <h1 class="text-2xl font-extrabold">Job Details</h1>
              <div class="flex flex-col gap-2 my-3">
                  <div class="flex gap-3 text-gray-600">
                      <span class="material-symbols-outlined">medical_services</span>
                      <p>Profession:</p>
                  </div>
                  <div class="flex gap-3 text-gray-600">
                      <span class="material-symbols-outlined">group</span>
                      <p>Pay:</p>
                  </div>
                  <div class="flex gap-3 text-gray-600">
                      <span class="material-symbols-outlined">schedule</span>
                      <p>Assignment Length:</p>
                  </div>
                  <div class="flex gap-3 text-gray-600">
                      <span class="material-symbols-outlined">medical_services</span>
                      <p>Schedule:</p>
                  </div>
                  <div class="flex gap-3 text-gray-600">
                      <span class="material-symbols-outlined">group</span>
                      <p>Openings:</p>
                  </div>
                  <div class="flex gap-3 text-gray-600">
                      <span class="material-symbols-outlined">schedule</span>
                      <p>Start Date:</p>
                  </div>
                  <div class="flex gap-3 text-gray-600">
                      <span class="material-symbols-outlined">medical_services</span>
                      <p>Experience:</p>
                  </div>
              </div>
          </div>
          <hr class="border-t-2 border-gray-300">
          <div class="my-5">
              <h1 class="text-2xl font-extrabold">Full Job Description</h1>
              <p class="my-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, id aut in doloremque vero minus animi, eos ipsam illo voluptatibus culpa impedit? Dolorum excepturi vero fugit dolorem aspernatur laborum facilis?</p>
              <p class="my-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam, autem iure dolorum, impedit ut doloribus explicabo sed necessitatibus deleniti odio laborum dignissimos quo exercitationem? Earum architecto voluptatibus eligendi expedita minus!</p>
          </div>
          <div class="mt-8">
              <h1 class="text-xl font-extrabold">Responsibilities:</h1>
              <p>To perform something</p>
              <p>To perform something else</p>
              <p>To perform something else again</p>
              <p>To perform something</p>
              <p>To perform something</p>
          </div>
          <div class="mt-8">
              <h1 class="text-xl font-extrabold">Requirements:</h1>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, id aut in doloremque vero minus animi, eos ipsam illo voluptatibus culpa impedit? Dolorum excepturi vero fugit dolorem aspernatur laborum facilis?</p>
              <p class="my-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam, autem iure dolorum, impedit ut doloribus explicabo sed necessitatibus deleniti odio laborum dignissimos quo exercitationem? Earum architecto voluptatibus eligendi expedita minus!</p>
          </div>
      </div>
  </div>
</div>