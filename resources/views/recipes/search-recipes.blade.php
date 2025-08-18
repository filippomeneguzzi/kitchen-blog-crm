@extends('layouts.app')

@section('content')
<div class="flex flex-col justify-center items-center p-8">
   <x-search-bar/>
   <div class="flex flex-col gap-8 w-[80%]">
      @foreach ($searchedRecipes as $result)
        <a href="{{ route('recipe.detail', $result->id) }}">
            <div class="flex w-full md:gap-10 items-center justify-between h-auto overflow-hidden rounded-xl">
                <div class="flex flex-col w-[80%] h-full">
                    <p>{{ $result->category->name }}</p>
                    <h3 class="font-bold mt-1 mb-1">{{ $result->title }}</h3>
                    <p>{{ $result->body }}</p>
    
                    <div class="flex justify-end gap-8">
                        <p class="font-bold">{{ $result->recipe_data['difficulty'] }}</p>
                        <p class="font-bold">{{ $result->recipe_data['preparation_time'] }}</p>
                    </div>
                </div>
                <div class="w-[150px] h-[150px] overflow-hidden rounded-xl">
                    <img class="rounded-xl" src="{{ $result->image_path 
                    ? asset('storage/' . $result->image_path) 
                    : asset('images/10249940.jpg') }}" alt="">
                </div>
            </div>
        </a>
      @endforeach

      {{ $searchedRecipes->links() }}
   </div>
</div>
@endsection