@extends('dashboard.layouts.base')

@section('content')
    <div class="col-12">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">اضافه مدونه جديده </div>

                    <div class="card-body">
                    <form action="{{ route('dashboard.blogs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Title --}}
                        <div class="mb-3">
                            <label for="title" class="form-label fw-bold">العنوان <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>
                            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- content --}}
                        <div class="mb-3">
                            <label for="content" class="form-label fw-bold">المحتوى <span class="text-danger">*</span></label>
                            <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content') }}</textarea>
                            @error('content') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Image --}}
                        <div class="mb-3">
                            <label for="image" class="form-label fw-bold">الصورة</label>
                            <input class="form-control" type="file" id="image" name="image" accept="image/*">
                            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <img id="image-preview" src="#" alt="Image Preview"
                                        style="max-width: 200px; display: none;" class="img-thumbnail mt-2">
                                </div>
                        </div>
                        {{-- Bride Name --}}
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success py-2 fw-bold">➕ إضافة</button>
                        </div>
                    </form>
</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Preview Script -->
    <script>
        document.getElementById('image').addEventListener('change', function(e) {
            const preview = document.getElementById('image-preview');
            const file = e.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }

                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        });
    </script>
@endsection
