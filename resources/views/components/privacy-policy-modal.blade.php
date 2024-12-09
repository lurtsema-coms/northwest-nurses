<div id="privacy-policy-modal" class="fixed inset-0 z-10 hidden w-full h-screen p-4 overflow-y-auto bg-black bg-opacity-75 modal-center privacy-policy">
  <div class="w-full max-w-[60rem] m-auto bg-white rounded-lg shadow-lg modal-box animate-fade-in">
    <div class="flex flex-col p-3 ">
      <div class="p-5 mb-4 text-2xl font-bold shadow-sm bg-cyan-800">
        <span class="text-white ">PRIVACY POLICY</span>
      </div>
      <div class="px-8 text-justify">
        <strong class="text-lg">Introduction</strong>
        <p class="mb-4">
          NORTHWEST NURSES & ALLIED HEALTH LLC, and its subsidiaries <i class="text-gray-700 ">(collectively “Northwest Nurses & Allied Health LLC” or “we”)</i> is committed to protecting your online privacy while providing you with a useful and enjoyable web experience. This Privacy Policy outlines our policies and practices regarding the collection and use of information <i class="text-gray-700">(defined below)</i> through our websites, including northwestnursesllc.com. 
        </p>
        <strong class="text-lg">Overview</strong>
        <p class="mb-2">
          We may collect certain information from you as discussed below, but be reassured of the following: 
        </p>
        <div class="pl-5 mb-4">
          <ul class="pl-5 list-disc">
            <li>We will not disclose information you provide through the NORTHWEST NURSES & ALLIED HEALTH LLC Site unless authorized by you, needed to deliver a service or product, for legitimate business purposes, or under the circumstances set forth in this Privacy Policy.</li>
            <li>You can access and correct your information at any time as required by applicable laws.</li>
            <li>Unless you ask us not to, we may use your information to contact you regarding our services or changes to this Privacy Policy.</li>
          </ul>
        </div>
        <strong class="text-lg">Categories of Personal Information Collected</strong> 
        <p class="mb-2">
          We collect the following categories of personal information <i class="text-gray-700">(“Information”)</i>: 
        </p>
        <div class="pl-5 mb-4">
          <ol class="pl-5 list-decimal">
            <li><strong>Contact Information:</strong> Name, address, telephone number, email address, and emergency contact details.</li>
            <li><strong>Employment and Demographic Information:</strong> Licensure, certifications, education, employment history, identification numbers, and health information.</li>
            <li><strong>Location Information:</strong> IP address from which you accessed the NORTHWEST NURSES & ALLIED HEALTH LLC Site.</li>
            <li><strong>Communications:</strong> Written communications between you and NORTHWEST NURSES & ALLIED HEALTH LLC Site.</li>
            <li><strong>Advertising Information:</strong> Preferences and abilities to improve your user experience.</li>
            <li><strong>Site Activity Information:</strong> Information collected through “cookies” and similar technologies.</li>
          </ol>
        </div>
        <strong class="text-lg">Business Purposes for Collecting Information</strong>
        <p class="mb-4">
          We use the information collected for business operations, service performance, relationship management, payment processing, and marketing activities. We also use information to investigate fraud, security incidents, and policy violations.
        </p>
        <strong class="text-lg">Commercial Purposes for Collecting Information</strong> 
        <p class="mb-4">
          Your information may be used to evaluate credentials, skills, and experience for job offers, and to provide information about employment opportunities.
        </p>
        <strong class="text-lg">Sharing Your Information</strong>
        <p class="mb-2">
          We share your information with the following third parties: 
        </p>
        <div class="pl-5 mb-4">
          <ol class="pl-5 list-decimal" start="7">
            <li><strong>NORTHWEST NURSES & ALLIED HEALTH LLC and Its Subsidiaries:</strong> Our family of companies, including parent, subsidiary, and related companies.</li>
            <li><strong>Service Providers:</strong> Third-party providers for hosting, marketing, payment processing, and customer service.</li>
            <li><strong>Clients and Business Partners:</strong> Clients, customers, and vendors for employment-related purposes.</li>
            <li><strong>As Required by Law:</strong> In response to legal requests and compliance needs.</li>
            <li><strong>Business Transfers:</strong> In the event of a reorganization, merger, sale, or similar proceedings.</li>
          </ol>
        </div>
        <strong class="text-lg">Security</strong>
        <p class="mb-4">
          We prioritize security and take measures to protect your information. However, no data transmission over the Internet can be guaranteed as completely secure. You transmit information at your own risk.
        </p>
        <strong class="text-lg">Consent</strong>
        <p class="mb-4">
          By using our websites, you consent to our collection and use of your information as described in this policy.
        </p>
        <strong class="text-lg">Minors</strong> 
        <p class="mb-4">
          We do not knowingly collect information from individuals under 18. If you are under 18, do not use our sites or provide personal information.
        </p>
        <strong class="text-lg">Access and Changes to Your Information</strong> 
        <p class="mb-4">
          You can correct and update your information via your online profile or by emailing us at  <span href="" class="text-blue-500 underline hover:text-blue-700">info@northwestnursesllc.com</span>. 
        </p>
        <strong class="text-lg">Links to Third-Party Websites</strong> 
        <p class="mb-4">
          We are not responsible for third-party websites linked from our sites. Review the privacy policies of those websites for information on how they handle your personal information. 
        </p>
        <strong class="text-lg">Changes to This Policy</strong>
        <p class="mb-4">
          We may update this Privacy Policy periodically. Changes will be posted on this page.
        </p>
      </div>
      <div class="flex flex-row justify-center gap-10 p-2 ">
        <button id="privacy-policy-modal-close-button" type="button" class="px-4 py-2 font-semibold text-white bg-cyan-800 btn-close-policy">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
  const privacyPolicyButtons = document.querySelectorAll('.privacy-policy-button');
  const privacyPolicyModal = document.querySelector('#privacy-policy-modal');
  const privacyPolicyModalCloseButton = document.querySelector('#privacy-policy-modal-close-button');
  privacyPolicyButtons?.forEach(button => {
    button.addEventListener('click', function() {
      privacyPolicyModal.classList.remove('hidden');
    });
  });
  privacyPolicyModalCloseButton?.addEventListener('click', function() {
    privacyPolicyModal.classList.add('hidden');
  });
</script>