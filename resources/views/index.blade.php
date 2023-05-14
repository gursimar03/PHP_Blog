@extends('layouts.app')

@section('content')
    
@if($posts->count() > 0)
<div class="relative bg-cover bg-center h-96" style="background-image: url('{{ asset('images/' . $posts->first()->image_path) }}');">
  <div class="absolute left-20 bottom-10  flex items-center justify-center">
    <div class="max-w-lg mx-auto text-center">
      <h1 class="text-4xl font-bold text-white leading-tight">{{ $posts->first()->title }}</h1>
      <!-- author -->
        <div class="text-gray-400 mt-4">{{ $posts->first()->user->name }}</div>
    </div>
  </div>
  <div class="absolute left-0 bottom-0 w-full h-16 bg-gradient-to-t from-black to-transparent"></div>
</div>

 <!-- Top Recent posts -->
 <div class="container mx-auto py-8">
    <h1 class="text-gray-700 font-bold text-2xl pb-4">Recent Posts</h1>

    <div class="flex flex-wrap -mx-4">
        @foreach ($posts->skip(1) as $index => $post)
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/2 xl:w-1/2 px-4 mb-8 {{ $index % 2 == 0 ? 'order-2 lg:order-1' : 'order-1 lg:order-2' }}">
                <div class="flex bg-white shadow-md rounded overflow-hidden">
                    <div class="w-1/2">
                        <img class="w-full h-64 object-cover" src="{{ asset('images/' . $post->image_path) }}" alt="{{ $post->title }}">
                    </div>
                    <div class="w-1/2 px-6 py-4">
                        <div class="font-bold text-xl mb-2">{{ $post->title }}</div>
                        <p class="text-gray-700 text-base">{{ Str::limit($post->body, 100) }}</p>
                        <div class="mt-4">
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{ $post->created_at->format('d M Y') }}</span>
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">{{ $post->user->name }}</span>
                        </div>
                    </div>
                </div>
            </div>
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