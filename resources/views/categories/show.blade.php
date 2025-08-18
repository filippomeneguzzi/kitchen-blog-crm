@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center p-8">
    <div class="w-[80%]">
        <h1 class="font-bold text-left text-2xl mb-8">{{ $category->name }}</h1>
    </div>

    <div class="flex flex-col gap-8 w-[80%]">
      @foreach ($categoryRecipes as $recipe)
        <a href="{{ route('recipe.detail', $recipe->id) }}">
            <div class="flex w-full md:gap-10 items-center justify-between h-auto overflow-hidden rounded-xl">
                <div class="flex flex-col w-[80%] h-full">
                    <h3 class="font-bold mt-1 mb-1">{{ $recipe->title }}</h3>
                    <p>{{ $recipe->body }}</p>
    
                    <div class="flex justify-end gap-8">
                        <p class="font-bold">{{ $recipe->recipe_data['difficulty'] }}</p>
                        <p class="font-bold">{{ $recipe->recipe_data['preparation_time'] }}</p>
                    </div>
                </div>
                <div class="w-[150px] h-[150px] overflow-hidden rounded-xl">
                    <img class="rounded-xl" src="{{ $recipe->image_path 
                    ? asset('storage/' . $recipe->image_path) 
                    : asset('images/10249940.jpg') }}" alt="">
                </div>
            </div>
        </a>
      @endforeach
   </div>
</div>
@endsection