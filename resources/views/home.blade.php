@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($items as $item)
        <div class="col-lg-8 col-md-12 m-3">
            <div class="rounded card m-6 p-4 bg-white entry">
                @if ($item->image)
                <a href="{{ $item->url }}" class="image">
                    <div class="date">
                        @svg('calendar')
                        {{ $item->starts_at->format("M d, Y") }}
                    </div>
                    <img src="{{ $item->fullimage }}" alt="" style="margin-bottom: 20px;">
                </a>
                @endif
                <h2><a href="{{ $item->url }}">{{ $item->title }}</a></h2>
                <p>{!! nl2br($item->description) !!}</p>
                <div class="footer d-flex justify-content-around">
                    <div>
                    @svg('location')
                    {{ $item->location }}
                    </div>
                    <div>
                    @svg('ticket') Price:
                    {{ $item->price }}
                    </div>
                    <div class="d-none d-sm-none d-md-block">
                        @svg('calendar')
                        {{ $item->starts_at->format("M d, Y") }}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        {{ $items->links() }}
    </div>
</div>
@endsection
