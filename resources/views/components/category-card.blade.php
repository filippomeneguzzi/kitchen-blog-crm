<a class="rounded-2xl overflow-hidden" href="{{ route('categories.show', $category->id) }}">
    <div class="flex flex-col gap-4 w-[220px] h-[270px] ">
        <div class="h-[70%] rounded-2xl">
            <img class="h-full w-full object-cover rounded-2xl"
                src="{{ $category->image_path ? asset('storage/' . $category->image_path) : asset('images/10249940.jpg') }}"
                alt="">
        </div>
        <div class="h-[20%]">
            <p>{{ $category->name }}</p>
        </div>
    </div>
</a>
