@extends('dashboard.layouts.base')
@section('content')
    <style>
        .card-header::after {
            content: none !important;
        }
    </style>
    <div class="col-12">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">اضافه مشرف جديد</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('dashboard.admin.store') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Name Field -->
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">الاسم</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email Field -->
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end"> البريد الالكترونى
                                </label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Password Field -->
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">الرقم السرى</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">تاكيد الرقم
                                    السرى</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <!-- Image Upload Field -->
                            <div class="row mb-3">
                                <label for="image" class="col-md-4 col-form-label text-md-end">الصوره الشخصيه</label>

                                <div class="col-md-6">
                                    <input id="image" type="file"
                                        class="form-control @error('image') is-invalid @enderror" name="image">

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <small class="text-muted">Max 2MB (JPEG, PNG, JPG)</small>
                                </div>
                            </div>

                            <!-- Image Preview -->
                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <img id="image-preview" src="#" alt="Image Preview"
                                        style="max-width: 200px; display: none;" class="img-thumbnail mt-2">
                                </div>
                            </div>

                            <!-- Permissions -->
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">الصلاحيات</label>
                                <div class="col-md-6">
                                    <div class="row">
                                        @foreach ($permissions as $permission)
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input type="checkbox" name="permissions[]"
                                                        value="{{ $permission->name }}" class="form-check-input"
                                                        id="perm_{{ $permission->id }}">
                                                    <label class="form-check-label" for="perm_{{ $permission->id }}">
                                                        {{ __($permission->name) }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-0 d-flex justify-content-right">
                                <div class="col-md-6 ">
                                    <button type="submit" class="btn btn-primary">
                                        تسجيل
                                    </button>
                                </div>
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
