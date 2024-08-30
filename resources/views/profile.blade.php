@extends('layouts')

@section('title')
Data Profile
@endsection

@section('heading')
Data Profile
@endsection

@section('content')
<div class="card-body">
    <ul>
        @foreach ($profile as $item)
            <li>Nama: {{ $item->name }}</li>
            <li>Email: {{ $item->email }}</li>
        @endforeach
    </ul>
</div>
@endsection