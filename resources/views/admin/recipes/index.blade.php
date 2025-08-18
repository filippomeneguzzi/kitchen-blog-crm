@extends('layouts.app')

@section('content')
    <div class="p-4 md:p-8">

        <div class="flex flex-col p-4 md:p-8">
            <div class="flex w-full justify-end">
                <a href="{{ route('admin.recipes.create') }}" class="bg-black text-white px-4 py-2 rounded-xl">
                    Nuova Ricetta
                </a>
            </div>
        </div>

        <div class="p-4 md:p-8 overflow-x-auto">
            <table class="min-w-full divide-y divide-black border-collapse">
                <thead class="bg-pink">
                    <tr>
                        <th class="py-2 px-4 text-left">Name</th>
                        <th class="py-2 px-4 text-left">Category</th>
                        <th class="py-2 px-4 text-left">Created_at</th>
                        <th class="py-2 px-4 text-left">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-panna">
                    @foreach ($recipes as $recipe)
                        <tr class="p-4">
                            <td class="py-2 px-4 text-left">{{ $recipe->title }}</td>
                            <td class="py-2 px-4 text-left">{{ $recipe->category->name }}</td>
                            <td class="py-2 px-4 text-left">{{ $recipe->created_at->format('d/m/Y') }}</td>
                            <td class="py-2 px-4 text-left action-td">
                                <div class="flex gap-4">
                                    <a href="{{ route('admin.recipes.edit', $recipe->id) }}"
                                        class="text-brown bg-pink border border-brown font-medium rounded-xl text-sm px-5 py-2.5">Edit</a>
                                    <form action="{{ route('admin.recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questa ricetta?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-panna bg-red-600 hover:bg-panna font-medium rounded-xl border-red-600 border hover:text-red-600 text-sm px-5 py-2.5">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pt-8">
                {{ $recipes->links() }}
            </div>
        </div>
    </div>
@endsection
