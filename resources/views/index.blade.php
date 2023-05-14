@extends('layouts.app')

@section('content')
    
@if($posts->count() > 0)
<div>
  <a href="/blog/{{ $posts->first()->slug }}">
    <div class="relative bg-cover bg-center top-10 h-96 animate__animated animate__fadeIn" style="background-image: url('{{ asset('images/' . $posts->first()->image_path) }}');">
    <h2 class="text-2xl font-bold m-4 text-white">Recent News</h2>  
    <div class="absolute left-20 bottom-10 flex items-center justify-center">
        <div class="max-w-lg mx-auto text-center">
          <h1 class="text-4xl font-bold text-white leading-tight animate__animated animate__fadeInLeft">{{ $posts->first()->title }}</h1>
          <div class="text-gray-400 mt-4 animate__animated animate__fadeInLeft">{{ $posts->first()->user->name }}</div>
        </div>
      </div>
      <div class="absolute left-0 bottom-0 w-full h-16 bg-gradient-to-t from-black to-transparent"></div>
    </div>
  </a>
</div>


<div class="flex flex-wrap justify-center m-6">
  <div class="mx-5 mt-10 my-10 md:mx-20 md:my-20 lg:m-20 bg-gray-100">
    <div class="bg-white shadow-lg p-4 h-64 font-semibold text-2xl font-sans max-w-md">
      <p class="leading-relaxed">Welcome to our news blog website! Get ready to dive into a world of exciting news stories, insightful opinions, and thought-provoking analysis. Stay informed and entertained with us!</p>
    </div>
  </div>
  <div class="mx-5 mt-10 my-10 md:mx-20 md:my-20 lg:m-20 bg-blue-500 w-80 md:w-96 h-60 text-white p-4 rounded-md">
    <p class="text-lg font-bold mb-2">Join Our Community</p>
    <p class="mb-5">Stay up-to-date with the latest news and connect with other readers.</p>
    <a href="{{ route('register') }}" class=" bg-white text-blue-500 py-2 px-4 rounded-md hover:bg-blue-500 hover:text-white">Sign Up Now</a>
  </div>
</div>


<div class=" mx-auto py-8">
    <h1 class="text-gray-700 font-bold text-2xl pb-4">Recent Posts</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
        @foreach ($posts->skip(1) as $post)
         <a href="/blog/{{ $post->slug }}">
            <div class="bg-white shadow-md rounded  hover:text-pink-600 overflow-hidden">
                <div class="w-full h-64">
                    <img class="w-full h-full object-cover" src="{{ asset('images/' . $post->image_path) }}" alt="{{ $post->title }}">
                </div>
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2 ">{{ $post->title }}</div>
                    <p class="text-gray-700 text-base">{{ Str::limit($post->body, 100) }}</p>
                    <div class="mt-4">
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{ $post->created_at->format('d M Y') }}</span>
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">{{ $post->user->name }}</span>
                    </div>
                </div>
            </div>
            </a>
        @endforeach
    </div>
</div>


<div class="container">

<div class="about-us">
  <h2 class="about-us__title">About Us</h2>
  <div class="about-us__content">
    <p>We are a team of passionate professionals who love what we do. Our mission is to create high-quality products that make a difference in people's lives.</p>
    <p>Whether you're looking for software development, web design, or digital marketing services, we've got you covered. We pride ourselves on delivering exceptional results and exceeding our clients' expectations.</p>
  </div>
</div>


<div class="contact-form">
  <h2 class="contact-form__title">Contact Us</h2>
  <form>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" class="contact-form__input" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" class="contact-form__input" required>

    <label for="message">Message:</label>
    <textarea id="message" name="message" class="contact-form__input" rows="5" required></textarea>

    <button type="submit" class="contact-form__button">Send</button>
  </form>
</div>


<div class="sub">
  <h2 class="sub__title">Subscribe to our newsletter</h2>
  <form>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" class="sub__input" required>

    <button type="submit" class="sub__button">Subscribe</button>
  </form>
    <p class="sub__text">We won't send you spam. Unsubscribe at any time.</p>

    <h3 class="catchy-text"> Already A user ?</h3>
    <a href="#" class="login__link">Login</a>
    <h3 class="catchy-text"> New User ?</h3>
    <a href="#" class="signup__link">Sign up</a>

</div>





@endif
@endsection