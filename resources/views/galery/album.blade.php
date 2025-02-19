@extends('layouts.galery.basic')

@section('content')
<div>
    <div>
        <a href="{{ route('NewAlbum') }}"><button>buat album</button></a>
    </div>
    <div>
        @foreach ($albums as $album)
            <a href=""><button>{{ $album->nama }}</button></a>
        @endforeach
    </div>
</div>
@endsection
