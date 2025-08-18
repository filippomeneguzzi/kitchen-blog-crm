@extends('layouts.app')

@section('content')
    <div class="p-4 md:p-8">
        <div class="p-4 md:p-8 min-w-full">
            <h4>Users manage</h4>
        </div>

        <div class="p-4 md:p-8 overflow-x-auto">
            <table class="min-w-full divide-y divide-black border-collapse">
                <thead class="bg-pink">
                    <tr>
                        <th class="py-2 px-4 text-left">Name</th>
                        <th class="py-2 px-4 text-left">Surname</th>
                        <th class="py-2 px-4 text-left">Email</th>
                        <th class="py-2 px-4 text-left">Created_at</th>
                        <th class="py-2 px-4 text-left">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-panna">
                    @foreach ($users as $user)
                        <tr class="p-4">
                            <td class="py-2 px-4 text-left">{{ $user->name }}</td>
                            <td class="py-2 px-4 text-left">{{ $user->surname }}</td>
                            <td class="py-2 px-4 text-left">{{ $user->email }}</td>
                            <td class="py-2 px-4 text-left">{{ $user->created_at->format('d/m/Y') }}</td>
                            <td class="py-2 px-4 text-left action-td">
                                <div class="flex gap-4">
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questo utente?');">
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
                {{ $users->links() }}
            </div>
        </div>

    </div>
@endsection
