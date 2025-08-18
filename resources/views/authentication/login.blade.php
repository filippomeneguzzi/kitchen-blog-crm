@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center w-full p-8">
        <div class="text-center mb-8 mt-8">
            <h2 class="text-xl font-bold">Log in to your account</h2>
        </div>
        <form action="/login" method="post" class="flex flex-col justify-around items-start w-[80%] align-center p-8 gap-6">
            @csrf
            <div class="flex flex-col gap-2">
                <label for="email" class="font-bold">Email</label>
                <input class="border border-brown rounded-lg p-1 text-brown w-[300px]" type="email" name="email" id="" placeholder="Email">
            </div>
            <div class="flex flex-col gap-2">
                <label for="password" class="font-bold">Password</label>
                <input class="border border-brown rounded-lg p-1 text-brown w-[300px]" type="password" name="password" placeholder="Password">
            </div>
            <button type="submit" class="bg-orange text-panna p-1 rounded-lg w-[350px]">Login</button>
        </form>

        <div class="mt-4">
            <p class="text-sm">Don't have an account? <a href="/register" class="text-blue-500 hover:underline">Register here</a></p>
        </div>
    </div>
@endsection
