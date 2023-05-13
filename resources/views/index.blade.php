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

@endif
@endsection