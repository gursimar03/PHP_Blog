<footer class="w-full border-t bg-white text-gray-800 pb-12">
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4 px-4 py-7    md:px-8">
  <div class="px-4 md:px-8 flex flex-col items-center">
  <div>
  <h2 class="text-lg font-semibold mb-4 ml-5 md:mb-0 md:self-start md:mr-8">Subscribe to our newsletter</h2>
  <div class="w-20 h-1 float-left bg-pink-600 mb-4"></div>
  </div>
  <form class="flex flex-col m-10 md:flex-row md:items-center">
    <label for="email" class="sr-only">Email:</label>
    <div class="flex items-center border rounded-lg py-2 px-3 mb-4 md:mb-0 md:mr-4">
      <input type="email" id="email" name="email" class="sub__input flex-grow bg-transparent focus:outline-none" placeholder="Your email address" required>
      <button type="submit" class="ml-2 rounded-lg bg-blue-500 text-white px-4 py-2 hover:bg-blue-600 transition duration-200 focus:outline-none">Subscribe</button>
    </div>
  </form>
  <div class="text-sm  m-36 md:text-base  md:mt-0 md:self-end">
    <p class="mb-4">We won't send you spam. Unsubscribe at any time.</p>
    <div class="flex flex-col md:flex-row">
      <h3 class="text-sm font-medium mb-2 md:mr-2">Already a user?</h3>
      <a href="#" class="text-blue-500 hover:text-pink-600 transition duration-200 focus:outline-none">Login</a>
    </div>
    <div class="flex flex-col md:flex-row">
      <h3 class="text-sm font-medium mb-2 md:mr-2">New user?</h3>
      <a href="#" class="text-blue-500 hover:text-pink-600 transition duration-200 focus:outline-none">Sign up</a>
    </div>
  </div>
</div>
    <div class="text-center md:border-l md:border-r md:border-t-0 md:px-8 md:py-12">
      <div>
        <h2 class="text-lg font-semibold text-left ml-5 md:text-center">About Us</h2>
        <div class="w-20 h-1 float-left bg-pink-600 mb-4"></div>  
      </div>
      <br><br>
      <div class="text-sm">
        <p class="mb-4">We are a team of passionate professionals who love what we do. Our mission is to create high-quality products that make a difference in people's lives.</p>
        <p>Whether you're looking for software development, web design, or digital marketing services, we've got you covered. We pride ourselves on delivering exceptional results and exceeding our clients' expectations.</p>
      </div>
    </div>
    <div class="w-full container mx-auto flex flex-col items-center">
            <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
              <div>

                <a href="#" class="uppercase ml-3 hover:text-pink-600 px-3">Privacy Policy</a>
                <div class="w-13 ml-4 h-1 float-left bg-pink-600 mb-4"></div>  
              </div>
              <div>

                <a href="#" class="uppercase ml-3 hover:text-pink-600 px-3">Terms & Conditions</a>
                <div class="w-13 h-1  ml-4 float-left bg-pink-600 mb-4"></div>  
              </div> 
              <div>
                <a id="authentication-link" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="uppercase ml-3 hover:text-pink-600 px-3">Contact US</a>
                <div class="w-13 h-1 ml-4 float-left bg-pink-600 mb-4"></div>  
              </div> 
              </div>
            <div class="uppercase pb-6">&copy; newsNow.com</div>
        </div>
  </div>
</footer>



<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Contact Us</h3>
                <form method="POST" action="{{ route('contact.us.store') }}" class="space-y-6" action="#">
                {{ csrf_field() }}
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="email" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Your name" required>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone:</label>
                        <input type="text" name="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Phone" value="{{ old('phone') }}">
                        @if ($errors->has('phone'))
                        <span class="text-red-500 text-sm">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <div>
                        <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">subject</label>
                        <input type="text" name="subject" id="subject" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Subject" required>
                    </div>
                    <div>
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Message</label>
                        <input type="textarea" name="message" id="message" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Message" required>
                    </div>
                    
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Send</button>

                </form>
            </div>
        </div>
    </div>
</div> 

