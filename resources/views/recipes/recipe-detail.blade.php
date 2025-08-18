@extends('layouts.app')

@section('content')
    <div class="flex flex-col min-h-screen top-0 w-full p-8 gap-6">
        <h2 class="text-2xl font-bold">{{ $recipe->title }}</h2>
        <div class="w-[300px] h-[300px]">
            <img class="w-[100%] h-[100%]" src="{{ $recipe->image_path 
                ? asset('storage/' . $recipe->image_path) 
                : asset('images/10249940.jpg') }}" alt="">
        </div>
        <div>
            <h2 class="font-bold">Ingredients</h2>
            @foreach ($recipe->recipe_data['ingredients'] as $ingredient)
                <p>{{ $ingredient }}</p>
            @endforeach
        </div>

        <div>
            <h2 class="font-bold">Procedimento</h2>
            <p>{{ $recipe->body }}</p>
        </div>
    </div>
@endsection
