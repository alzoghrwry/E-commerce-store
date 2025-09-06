@extends('layouts.app')

@section('title', 'About Us | RedStore')

@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <p>{{ $description }}</p>
    <div>{!! $rawHtml !!}</div>
    <p>© {{ date('Y') }} RedStore</p>
</div>
@endsection
