@extends('layouts/admin')
@section('title', 'Category Index')
@section('content')
@include('layouts/include/admin/session')
   <livewire:admin.category.index/>       

@endsection