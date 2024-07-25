<form 
  id="job-application-form" 
  method="POST" 
  action="{{ route('applicant.apply-job', $jobPost->id) }}" 
  hx-target="#job-info-section"
  hx-post="{{ route('applicant.apply-job', $jobPost->id) }}"
  hx-disabled-elt="textarea, button"
  hx-indicator="#question-modal-apply-btn .htmx-indicator"
  enctype="multipart/form-data"
  >
  @csrf
  <div class="w-full max-w-3xl px-3 py-5 m-auto bg-white rounded-lg shadow-lg modal-box animate-fade-in">
      <div class="flex flex-col p-3 modal-content">
          <div class="mb-4">
              <h1 class="mb-2 text-xl font-bold text-center">Want to apply to this job?</h1>
              <p class="p-2 text-center">The employer wants to know more about you.</p>
              <p class="p-2 italic text-center text-gray-400">Please answer the questions with honesty to the best of your knowledge and belief.</p>
          </div>
          <div class="flex flex-col gap-10">
            @if ($jobPost->question_1)
              <div class="space-y-3">
                  <label for="answer_1">{{ $jobPost->question_1 }}</label>
                  <textarea name="answer_1" id="answer_1" class="block w-full px-4 py-3 border-gray-200 rounded-lg focus:border-primary focus:ring-primary disabled:opacity-50 disabled:pointer-events-none" rows="3" placeholder="Answer..." required></textarea>
              </div>
            @endif
            @if ($jobPost->question_2)
              <div class="space-y-3">
                  <label for="answer_2">{{ $jobPost->question_2 }}</label>
                  <textarea name="answer_2" id="answer_2" class="block w-full px-4 py-3 border-gray-200 rounded-lg focus:border-primary focus:ring-primary disabled:opacity-50 disabled:pointer-events-none" rows="3" placeholder="Answer..." required></textarea>
              </div>
            @endif
            @if ($jobPost->question_3)
              <div class="space-y-3">
                <label for="answer_3">{{ $jobPost->question_3 }}</label>
                <textarea name="answer_3" id="answer_3" class="block w-full px-4 py-3 border-gray-200 rounded-lg focus:border-primary focus:ring-primary disabled:opacity-50 disabled:pointer-events-none" rows="3" placeholder="Answer..." required></textarea>
              </div>
            @endif
            @if (!empty($jobPost->requiredAttachment))   
              <div class="space-y-4">
                <p class="font-bold text-center" for="">File Attachment</p>
                @foreach (explode(',', $jobPost->requiredAttachment->label) as $ra)    
                  @php
                    $normalizedRa = strtolower(str_replace(' ', '_', $ra));
                  @endphp             
                  <div class="space-y-2">
                    <label for="">{{ ucwords($ra) }}</label>
                    <input class="block p-1 bg-white border rounded-lg disabled:pointer-events-none" name="attachments[{{ $normalizedRa }}]" type="file" required>
                  </div>
                @endforeach          
              </div>
            @endif
          </div>
          <div class="flex flex-row justify-center gap-10 p-2 mt-5">
              <button class="hover:opacity-75 cancel-btn" type="button" onclick="$('#modal-center').addClass('hidden'); $('body').removeClass('overflow-hidden').addClass('overflow-auto')">Cancel</button>
              <button id="question-modal-apply-btn" class="px-5 py-2 font-semibold text-white rounded-full hover:opacity-75 submit-applicant-btn bg-cyan-800" type="submit" onclick="$('body').removeClass('overflow-hidden').addClass('overflow-auto')">
                Apply
                <svg class="w-5 h-5 text-white animate-spin htmx-indicator" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
              </svg>
              </button>
          </div>
      </div>
  </div>
</form>