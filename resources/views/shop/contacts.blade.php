@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Contact Us</h1>

    @if(session('success'))
        <div class="mb-4 rounded-lg bg-green-100 p-3 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-4 rounded-lg bg-red-100 p-3 text-red-800">
            <ul class="list-disc ml-6">
                @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('contact.submit') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block mb-1">Name</label>
            <input name="name" value="{{ old('name') }}" class="w-full border rounded-lg p-2" required>
        </div>

        <div>
            <label class="block mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded-lg p-2" required>
        </div>

        <div>
            <label class="block mb-1">Message</label>
            <textarea name="message" rows="5" class="w-full border rounded-lg p-2" required>{{ old('message') }}</textarea>
        </div>

        <button class="px-4 py-2 rounded-lg bg-blue-600 text-white">Send</button>
    </form>
</div>
@endsection
