@extends('dashboard.layouts.base')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header">
            <h4>Admin Details</h4>
        </div>
        <div class="card-body">
            <p><strong>الاسم:</strong> {{ $admin->name }}</p>
            <p><strong>البريد الالكترونى:</strong> {{ $admin->email }}</p>
            
            <h5 class="mt-4">الصلاحيات</h5>
            @if($admin->permissions->isEmpty())
                <p class="text-muted">لا توجد صلاحيات.</p>
            @else
                <div class="row">
    @foreach ($admin->permissions->chunk(ceil($admin->permissions->count() / 2)) as $chunk)
        <div class="col-md-6">
            <ul class="list-group mb-3">
                @foreach ($chunk as $permission)
                    <li class="list-group-item">{{ $permission->name }}</li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>

            @endif
        </div>
    </div>
</div>
@endsection