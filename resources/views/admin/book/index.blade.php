@extends('layouts/admin')
@section('title', 'book_index')
@section('content')
@include('layouts/include/admin/session')
   <livewire:admin.book.index/>       

@endsection