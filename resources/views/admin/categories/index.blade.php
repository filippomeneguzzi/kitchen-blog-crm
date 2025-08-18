@extends('layouts.app')

@section('content')
    <div class="p-4 md:p-8">

        <div class="flex justify-end width-full p-4 md:p-8">
            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                class="bg-black text-white px-4 py-2 rounded-xl" type="button">
                Aggiungi Categoria
            </button>
        </div>
        <div class="flex flex-col p-4 md:p-8">
            <h2 class="mb-4 text-xl font-bold">Category</h2>
            <div class="flex flex-col md:flex-row gap-4 md:p-8 md:flex-wrap">
                @foreach ($categories as $category)
                    <x-category-card :category="$category" />
                @endforeach
            </div>
        </div>

        <!-- Main modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-panna rounded-lg shadow-sm">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-black">
                        <h3 class="text-lg font-semibold text-black">
                            Create New Category
                        </h3>
                        <button type="button"
                            class="text-black bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" action="{{ route('admin.categories.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-black">Name</label>
                                <input type="text" name="name" id="name"
                                    class="bg-panna border border-black text-black text-sm rounded-lg focus:border-black focus:border-black block w-full p-2.5"
                                    placeholder="Type category name" required>
                            </div>
                            <div class="col-span-2">
                                <label for="image_path" class="mb-2 mt-4 text-sm font-medium text-black">Immagine</label>
                                <input type="file" name="image_path" id="image_path"
                                    class="block w-[40%] text-sm text-black border border-black focus:border-black rounded-lg cursor-pointer bg-green">
                            </div>
                        </div>
                        <button type="submit"
                            class="bg-black text-white px-4 py-2 rounded-xl hover:bg-panna hover:text-black">
                            Salva
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
