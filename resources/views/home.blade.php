@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center p-8">
   <x-search-bar/>
   <div class="flex flex-col w-[80%] overflow-hidden">
      <div class="flex flex-col mb-8">
         <h2 class="mb-4 text-xl font-bold">New</h2>
         <div class="flex flex-col md:flex-row gap-8">
            @foreach ($recipes as $recipe)
               <x-recipeCard :recipe="$recipe" />
            @endforeach
         </div>
      </div>
   
      <div class="flex flex-col mb-8">
         <h2 class="mb-4 text-xl font-bold">Category</h2>
         <div class="flex flex-col md:flex-row gap-8">
            @foreach ($categories as $category)
               <x-category-card :category="$category" />
            @endforeach
         </div>
      </div>
   </div>
</div>
@endsection