@extends('layouts.app')

@section('content')

<!-- <div class="h-13 w-full bg-red-400">
  <div class="flex items-center justify-center h-full">
    <span class="text-white">By the people, for the people.</span>
  </div>
</div> -->


@if($posts->count() > 0)
<div>
  <a href="/blog/{{ $posts->first()->slug }}">
    <div  class="relative bg-cover  h-96 bg-centeranimate__animated animate__fadeIn" style="background-image: url('{{ asset('images/' . $posts->first()->image_path) }}');">
     
      <h2 class="text-2xl font-bold top-36 left-5 absolute text-pink-600" >Recent News:</h2>    
      <div class="absolute left-20 bottom-10 flex items-center justify-center">
      <div class="max-w-lg  text-center">
          <h1 class="text-4xl hover:text-pink-600 font-bold text-white leading-tight animate__animated animate__fadeInLeft">{{ $posts->first()->title }}</h1>
          <div class="text-gray-400 mt-4 animate__animated animate__fadeInLeft">{{ $posts->first()->user->name }}</div>
        </div>
      </div>
      <div class="absolute left-0 bottom-0 w-full h-16 bg-gradient-to-t from-black to-transparent"></div>
    </div>
  </a>
</div>

<div class="w-4/5 mx-auto">

<ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400">
    @isset($tags)

    @foreach ($tags as $tag)
   
    <form action="{{ route('search.tag', $tag->name) }}" method="GET">
      <li class=" text-2xl">
          <button type="submit" class="inline-block px-4 py-3 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">{{ $tag->name }}</button>
      </li>
    </form>
   
    @endforeach    
    @endisset
    
  @guest
  <li class="mr-2">
    <a href="{{ route('register') }}" class="inline-block px-5 py-4  text-white bg-pink-600 hover:bg-pink-700">{{ __('BECOME A MEMBER!') }}</a>
  </li>
  @endguest
</ul>




<div class=" mx-auto py-8">
    <h1 class="text-gray-700 font-bold text-2xl ml-5 ">Latest News</h1>
    <div class="w-20 h-3 bg-pink-600 mb-4"></div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
        @foreach ($posts->skip(1) as $post)
         <a href="/blog/{{ $post->slug }}">
            <div class="bg-white shadow-md hover:shadow-2xl rounded  hover:text-pink-600 overflow-hidden">
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


</div>



@endif
@endsection