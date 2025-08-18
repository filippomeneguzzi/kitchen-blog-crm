@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center p-8">
   <x-search-bar/>
   <div class="flex flex-col md:flex-row gap-8 w-[80%] overflow-hidden">
      @foreach ($recipes as $recipe)
         <x-recipeCard :recipe="$recipe" />
      @endforeach
   </div>
</div>
@endsection
