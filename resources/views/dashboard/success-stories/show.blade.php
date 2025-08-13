@extends('dashboard.layouts.base')

@section('content')
<div class="container">
    <div class="card mb-4">
        <img src="{{ $story->getRawOriginal('image') == null ? asset('storage/success-story.png') : $story->image }}" 
             class="card-img-top d-flex " alt="Story Image" style="width:20rem;height:20rem;object-fit:cover;">

        <div class="card-body">

    <h3 class="card-title text-primary fw-bold mb-3">{{ $story->title ?? 'بدون عنوان' }}</h3>
            <br>
    <p class="card-text" style="line-height: 1.8;">
        {{ $story->description ?? 'لا يوجد وصف متاح' }}
    </p>

    <ul class="list-group list-group-flush my-3">

        @if($story->bride_name)
            <li class="list-group-item"><strong>العريس:</strong> {{ $story->bride_name }}</li>
        @endif

        @if($story->groom_name)
            <li class="list-group-item"><strong>العروس:</strong> {{ $story->groom_name }}</li>
        @endif

        {{-- Status --}}
        <li class="list-group-item">
            <strong>الحالة:</strong>
            <span class="badge 
                @if($story->status === 'published') bg-success
                @elseif($story->status === 'refused') bg-danger
                @else bg-warning
                @endif">
                @switch($story->status)
                    @case('published') منشورة @break
                    @case('refused') مرفوضة @break
                    @default قيد المراجعة
                @endswitch
            </span>
        </li>

        {{-- Published Status --}}
        <li class="list-group-item">
            <strong>هل تم النشر؟</strong>
            <span class="badge {{ $story->published_status ? 'bg-success' : 'bg-secondary' }}">
                {{ $story->published_status ? 'نعم' : 'لا' }}
            </span>
        </li>

    </ul>
</div>

    </div>
</div>
@endsection
