@extends('layouts/front')

@section('content')
    <div class="container">
        @if (!is_null($profiles))
            @foreach ($profiles as $profile)
                <p>名前：{{ $profile->name }}</p>
                <p>性別：{{ $profile->gender }}</p>
                <p>趣味：{{ $profile->hobby }}</p>
                <p>自己紹介：{{ $profile->instruction }}</p>
                <hr color="#c0c0c0">
            @endforeach
        @endif
    </div>   
@endsection