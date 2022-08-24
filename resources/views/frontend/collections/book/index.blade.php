@extends('layouts/app')
@section('title', $category->meta_title)
@section('title', $category->meta_keyword)
@section('title', $category->meta_description)

@section('content')
<div class="container px-4">
  <h1 class="text-primary"> Avaiable books for {{$category->name}}</h1>
    <div class="row gx-5">
        <livewire:frontend.book.index :books="$books" :category="$category" />
    </div>
  </div>
@endsection

