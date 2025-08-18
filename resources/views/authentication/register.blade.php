@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center w-full p-6 gap-6">
    <div class="text-center mb-6 mt-6">
        <h2 class="text-xl font-bold">Register your account</h2>
    </div>

    <form action="/register" method="post" class="flex flex-col gap-6 w-full max-w-2xl mx-auto">
        @csrf

        <div class="flex flex-col md:flex-row gap-6 w-full">
            <div class="flex flex-col gap-2 flex-1">
                <label for="name" class="font-bold">Name</label>
                <input class="border border-brown rounded-lg p-2 text-brown w-full max-w-[300px]" 
                       type="text" name="name" placeholder="Name">
            </div>
            <div class="flex flex-col gap-2 flex-1">
                <label for="surname" class="font-bold">Surname</label>
                <input class="border border-brown rounded-lg p-2 text-brown w-full max-w-[300px]" 
                       type="text" name="surname" placeholder="Surname">
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-6 w-full">
            <div class="flex flex-col gap-2 flex-1">
                <label for="email" class="font-bold">Email</label>
                <input class="border border-brown rounded-lg p-2 text-brown w-full max-w-[300px]" 
                       type="email" name="email" placeholder="Email">
            </div>
            <div class="flex flex-col gap-2 flex-1">
                <label for="phone" class="font-bold">Phone</label>
                <input class="border border-brown rounded-lg p-2 text-brown w-full max-w-[300px]" 
                       type="text" name="phone" placeholder="Phone">
            </div>
        </div>

        <div class="flex flex-col gap-2 w-full max-w-[300px]">
            <label for="password" class="font-bold">Password</label>
            <input class="border border-brown rounded-lg p-2 text-brown w-full" 
                   type="password" name="password" placeholder="Password">
        </div>

        <button type="submit" class="bg-orange text-panna p-2 rounded-lg w-full max-w-[350px] md:mx-auto">
            Register
        </button>
    </form>

    <div>
        <p class="text-sm">Already have an account? <a href="/login" class="text-blue-500 hover:underline">Log in</a></p>
    </div>
</div>
@endsection