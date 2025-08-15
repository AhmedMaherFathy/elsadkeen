@extends('dashboard.layouts.base')

@section('content')
<div class="col-12">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header fw-bold">تعديل من نحن</div>

                <div class="card-body">
                    <form action="{{ route('dashboard.about-us.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- WYSIWYG Input --}}
                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">المحتوى</label>
                            <textarea id="description" name="description" class="form-control" rows="8">{{ old('description', $about->description ?? '') }}</textarea>
                            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success py-2 fw-bold">💾 حفظ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Summernote CSS & JS --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>

<script>
    $('#description').summernote({
        placeholder: 'اكتب المحتوى هنا...',
        tabsize: 2,
        height: 300,
        lang: 'ar-AR',
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['fontsize', 'color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link']],
            ['view', ['fullscreen', 'codeview']]
        ]
    });
</script>
@endsection
