<div class="flex flex-col w-[100%] h-[300px] max-w-[360px] md:w-[200px] rounded-2xl overflow-hidden">
    <a href="{{ route('recipe.detail', $recipe->id) }}">
        <div class="overflow-hidden w-full rounded-2xl">
            <img src="{{ $recipe->image_path 
                ? asset('storage/' . $recipe->image_path) 
                : asset('images/10249940.jpg') }}" alt="" class="w-full h-[200px] object-cover">
        </div>
        <div class="flex flex-col">
            <div class="flex pt-2 items-center justify-between">
                <h4 >{{ $recipe->title }}</h4>
                <p>{{ $recipe->recipe_data['difficulty'] }}</p>
            </div>
            <div class="flex pt-2 items-center justify-between">
                {{ $recipe->category->name }}
            </div>
        </div>
    </a>
</div>
