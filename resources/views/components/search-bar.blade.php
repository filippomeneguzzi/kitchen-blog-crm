<form action="{{ route('search') }}" method="GET" class="w-[80%] mx-auto bg-pink mb-8 overflow-hidden rounded-lg">
    <label for="search" class="mb-2 text-sm font-medium text-brown sr-only">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-brown" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="search" id="search" name="search"
            class="block w-[80%] p-4 pl-10 text-sm text-brown rounded-lg"
            placeholder="Cerca ricette..." required>
        <button type="submit"
            class="text-panna absolute right-2.5 bottom-2.5 bg-brown font-medium rounded-lg text-sm px-4 py-2">
            Cerca
        </button>
    </div>
</form>