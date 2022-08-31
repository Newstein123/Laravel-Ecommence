@extends('layouts/app')
@section('title', $books->meta_title)
@section('title', $books->meta_keyword)
@section('title', $books->meta_description)

@section('content')
<livewire:frontend.book.view :books="$books" :category="$category" >
@endsection