@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-8 bg-gradient-to-br from-white to-blue-50 dark:from-gray-800 dark:to-gray-900 shadow-2xl rounded-2xl mt-12 transition-colors duration-500">
    <h1 class="text-4xl font-extrabold mb-8 text-center text-gray-900 dark:text-white">Contact Us</h1>

    @if(session('success'))
        <div class="mb-6 rounded-xl bg-green-50 dark:bg-green-900 p-4 border border-green-200 dark:border-green-700 text-green-800 dark:text-green-200 animate-fadeIn">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-6 rounded-xl bg-red-50 dark:bg-red-900 p-4 border border-red-200 dark:border-red-700 text-red-800 dark:text-red-200 animate-fadeIn">
            <ul class="list-disc ml-6">
                @foreach ($errors->all() as $e) 
                    <li>{{ $e }}</li> 
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('contact.submit') }}" class="space-y-6">
        @csrf

        <div>
            <label class="block mb-2 text-gray-700 dark:text-gray-300 font-semibold">Name</label>
            <input 
                name="name" 
                value="{{ old('name') }}" 
                placeholder="Your Name"
                class="w-full border border-gray-300 dark:border-gray-600 rounded-xl p-4 focus:outline-none focus:ring-2 focus:ring-blue-400 dark:focus:ring-blue-500 transition-all duration-300 shadow-sm hover:shadow-md"
                required
            >
        </div>

        <div>
            <label class="block mb-2 text-gray-700 dark:text-gray-300 font-semibold">Email</label>
            <input 
                type="email" 
                name="email" 
                value="{{ old('email') }}" 
                placeholder="you@example.com"
                class="w-full border border-gray-300 dark:border-gray-600 rounded-xl p-4 focus:outline-none focus:ring-2 focus:ring-blue-400 dark:focus:ring-blue-500 transition-all duration-300 shadow-sm hover:shadow-md"
                required
            >
        </div>

        <div>
            <label class="block mb-2 text-gray-700 dark:text-gray-300 font-semibold">Message</label>
            <textarea 
                name="message" 
                rows="5" 
                placeholder="Write your message here..."
                class="w-full border border-gray-300 dark:border-gray-600 rounded-xl p-4 focus:outline-none focus:ring-2 focus:ring-blue-400 dark:focus:ring-blue-500 transition-all duration-300 shadow-sm hover:shadow-md"
                required
            >{{ old('message') }}</textarea>
        </div>

        <button class="w-full py-4 rounded-xl bg-gradient-to-r from-blue-500 to-blue-700 text-white font-bold text-lg hover:from-blue-600 hover:to-blue-800 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
            Send Message
        </button>
    </form>
</div>

<style>
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-10px);}
  to { opacity: 1; transform: translateY(0);}
}
.animate-fadeIn {
  animation: fadeIn 0.5s ease-out;
}
</style>
@endsection
