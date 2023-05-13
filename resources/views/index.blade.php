@extends('layouts.app')

@section('content')
    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                    Latest News
                </h1>
                <a 
                    href="/blog"
                    class="text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase">
                    Read More
                </a>
            </div>
        </div>
    </div>

    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <img src="https://cdn.pixabay.com/photo/2014/05/03/01/03/laptop-336704_960_720.jpg" width="700" alt="">
        </div>
        <div class="m-auto sm:m-auto text-left w-4/5 block">
            <h2 class="text-3xl font-extrabold text-gray-600">
                Stay Updated with the Latest Technology, Sports, and Art News
            </h2>
            <p class="py-8 text-gray-500 text-s">
            Get access to breaking news, insightful articles, and in-depth analysis on the latest in technology, sports, and art.
        </p>

        <p class="font-extrabold text-gray-600 text-s pb-9">
            Our team of expert journalists and writers provide you with engaging and accurate news stories that you won't find anywhere else.
        </p>

        <a 
            href="/news"
            class="uppercase bg-blue-500 text-gray-100 text-s font-extrabold py-3 px-8 rounded-3xl">
            Read More
        </a>
    </div>

   

    <div class="text-center py-15">
        <span class="uppercase text-s text-gray-400">
            Blog
        </span>

        <h2 class="text-4xl font-bold py-10">
            Recent Posts
        </h2>

        <p class="m-auto w-4/5 text-gray-500">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque exercitationem saepe enim veritatis, eos temporibus quaerat facere consectetur qui.
        </p>
    </div>
    <div class="overflow-x-auto">
  <div class="flex flex-nowrap">
    @foreach ($posts as $post)
      <div class="flex-shrink-0 w-96 p-4">
        <div class="bg-white rounded-lg overflow-hidden">
          <img src="{{ asset('images/' . $post->image_path) }}" alt="" class="w-full">
          <div class="p-4">
            <h2 class="text-gray-700 font-bold text-2xl pb-4">{{ $post->title }}</h2>
            <span class="text-gray-500">
              By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
            </span>
            <p class="text-gray-700 pt-4 pb-10 leading-8 font-light">{{ $post->description }}</p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>



@endsection