@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        
        <h1 class="text-6xl px-10">
            <span class="border-b-4 border-pink-600">C</span>reate Post
        </h1>
        
    </div>
</div>

@if ($errors->any())
    <div class="w-4/5 m-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif

<div class="w-4/5 m-auto pt-20">
    <form 
        action="/blog"
        method="POST"
        enctype="multipart/form-data">
        @csrf

        <input 
            type="text"
            name="title"
            placeholder="Title..."
            class="bg-transparent block border-b-2 w-full h-20 text-6xl m-10 outline-none">

        <textarea 
            name="description"
            placeholder="Description..."
            class="py-20 bg-transparent block border-b-2 w-full h-60 mt-10 ml-10 text-xl outline-none"></textarea>

            <div class="bg-grey-lighter m-10">
  <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
    <span id="filename" class=" text-base leading-normal">
      Select a file
    </span>
    <input 
      type="file"
      name="image"
      class="hidden"
      onchange="document.getElementById('filename').textContent = this.files[0].name;">
  </label>
 
</div>
<div class="w-62 m-10">
  <label for="tags" class="block text-sm font-medium text-gray-700 mb-1">Tags</label>
  <select name="tags[]" class="w-full js-choices" multiple>
    @foreach($tags as $tag)
      <option value="{{ $tag->id }}">{{ $tag->name }}</option>
    @endforeach
  </select>

  <button type="submit" class="uppercase mt-8 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
    Submit Post
  </button>
</div>

    </form>
</div>

@endsection

