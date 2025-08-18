@extends('layouts.app')

@section('content')
    <div class="flex flex-col min-h-screen top-0 w-full p-8">
        <div class="flex w-full justify-end">
            <a href="{{ route('admin.recipes.edit', $recipe->id) }}" class="bg-black text-white px-4 py-2 rounded-xl hover:bg-green hover:text-black">
                Edit
            </a>
        </div>
        <h2 class="text-2xl font-bold">{{ $recipe->title }}</h2>
        <div class="w-[230px] h-[300px] mb-4">
            <img class="w-[100%] h-[100%] object-cover" src="{{ $recipe->image_path 
                ? asset('storage/' . $recipe->image_path) 
                : asset('images/10249940.jpg') }}" alt="">
        </div>
        <div>
            @foreach ($recipe->recipe_data['ingredients'] as $ingredient)
                <p>{{ $ingredient }}</p>
            @endforeach
        </div>
    </div>
@endsection