@php
    $ingredientsText = old('ingredients.0') ?? (isset($recipe->recipe_data['ingredients']) ? implode("\n", $recipe->recipe_data['ingredients']) : '');
@endphp

<form class="flex flex-col w-[80%] p-8"
    action="{{ isset($recipe) ? route('admin.recipes.update', $recipe) : route('admin.recipes.store') }}" method="POST"
    enctype="multipart/form-data">
    @csrf

    @if (isset($recipe))
        @method('PUT')
    @endif

    <div class="w-full">

        <div class="flex flex-col mb-4">
            <label for="title" class="block mb-2 text-sm font-medium text-black">Title</label>
            <input type="text" id="title" name="title"
                class="bg-pink border border-black focus:border-black text-black text-sm rounded-lg block w-full p-2.5"
                value="{{ old('title', $recipe->title ?? '') }}" placeholder="Title" required />
            @error('title')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="md:flex md:justify-between w-full gap-6 mb-4">
            <div class="flex flex-col md:w-[40%]">
                <label for="category_id" class="block mb-2 text-sm font-medium text-black">Category</label>
                <select name="category_id" id="category_id"
                    class="bg-pink border border-black focus:border-black text-black text-sm rounded-lg block w-full p-2.5">
                    <option value="">Seleziona categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $recipe->category_id ?? '') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col md:w-[40%]">
                <label for="tags" class="block mb-2 text-sm font-medium text-black">Tags</label>
                <select name="tags[]" id="tags" multiple
                    class="bg-pink border border-black focus:border-black text-black text-sm rounded-lg block w-full p-2.5">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" @if (collect(old('tags', $recipe->tags->pluck('id') ?? []))->contains($tag->id)) selected @endif>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>

                @error('tags')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex flex-col mb-4">
            <label for="body" class="block mb-2 text-sm font-medium text-black">Descrizione / Corpo ricetta</label>
            <textarea name="body" id="body" rows="6"
                class="block p-2.5 w-full text-sm text-black bg-pink rounded-lg border border-black focus:border-black"
                placeholder="Scrivi qui la descrizione completa della ricetta...">{{ old('body', $recipe->body ?? '') }}</textarea>

            @error('body')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col mb-4">
            <label for="image" class="mb-2 text-sm font-medium text-black">Immagine</label>
            <input type="file" name="image" id="image"
                class="block w-full text-sm text-black border border-black focus:border-black rounded-lg cursor-pointer bg-pink" />

            @error('image')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="md:flex gap-6 mb-4">
            <div class="flex flex-col md:w-1/3">
                <label for="preparation_time" class="mb-2 text-sm font-medium text-black">Tempo (min)</label>
                <input type="number" name="preparation_time" id="preparation_time"
                    value="{{ old('preparation_time', $recipe->recipe_data['preparation_time'] ?? '') }}"
                    class="bg-pink border border-black focus:border-black text-black text-sm rounded-lg block w-full p-2.5" />
            </div>
            <div class="flex flex-col md:w-1/3">
                <label for="difficulty" class="mb-2 text-sm font-medium text-black">Difficoltà</label>
                <select name="difficulty" id="difficulty"
                    class="bg-pink border border-black focus:border-black text-black text-sm rounded-lg block w-full p-2.5">
                    <option value="">Seleziona</option>
                    @foreach (['Facile', 'Media', 'Difficile'] as $diff)
                        <option value="{{ $diff }}"
                            {{ old('difficulty', $recipe->recipe_data['difficulty'] ?? '') == $diff ? 'selected' : '' }}>
                            {{ $diff }}
                        </option>
                    @endforeach
                </select>

                @error('difficulty')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col md:w-1/3">
                <label for="portions" class="mb-2 text-sm font-medium text-black">Porzioni</label>
                <input type="number" name="portions" id="portions"
                    value="{{ old('portions', $recipe->recipe_data['portions'] ?? '') }}"
                    class="bg-pink border border-black focus:border-black text-black text-sm rounded-lg block w-full p-2.5" />
            </div>
        </div>

        {{-- INGREDIENTI --}}
        <div class="flex flex-col mb-4">
            <label for="ingredients" class="mb-2 text-sm font-medium text-black">Ingredienti (uno per riga)</label>
            <textarea name="ingredients[]" id="ingredients" rows="5"
                class="bg-pink border border-black focus:border-black text-black text-sm rounded-lg block w-full p-2.5"
                placeholder="Inserisci ogni ingrediente su una riga separata...">{{ $ingredientsText }}</textarea>

            @error('ingredients')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- NOTE --}}
        <div class="flex flex-col mb-4">
            <label for="note" class="mb-2 text-sm font-medium text-black">Note</label>
            <textarea name="note" id="note" rows="3"
                class="bg-pink border border-black focus:border-black text-black text-sm rounded-lg block w-full p-2.5"
                placeholder="Eventuali note...">{{ old('note', $recipe->recipe_data['note'] ?? '') }}</textarea>

            @error('note')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

    </div>

    <button type="submit" class="bg-black text-white px-4 py-2 rounded-xl hover:bg-pink hover:text-black">
        {{ isset($recipe) ? 'Aggiorna Ricetta' : 'Crea Ricetta' }}
    </button>
</form>