@extends('dashboard.layouts.base')

@section('content')
<section class="content">
    <div class="card">
        <!-- عنوان المحادثة -->
        <div class="card-header bg-primary text-white d-flex ">
            <h3 class="card-title">محادثة الدعم الفني</h3>
        </div>

        <!-- الرسائل -->
        <div class="card-body" style="height: 500px; overflow-y: auto; background-color: #f8f9fa;">
            @forelse($messages as $msg)
                @if($msg->type === 'user')
                    <!-- رسالة المستخدم -->
                    <div class="d-flex mb-3">
                        <div class="p-2 rounded bg-light" style="max-width: 70%;">
                            <strong>المستخدم:</strong> {{ $msg->message }}
                            <div class="text-muted" style="font-size: 12px;">
                                {{ \Carbon\Carbon::parse($msg->created_at)->format('Y-m-d h:i A') }}
                            </div>
                        </div>
                    </div>
                @else
                    <!-- رسالة الأدمن -->
                    <div class="d-flex mb-3 justify-content-end">
                        <div class="p-2 rounded text-white bg-primary" style="max-width: 70%;">
                            <strong>الأدمن:</strong> {{ $msg->message }}
                            <div class="text-white-50" style="font-size: 12px;">
                                {{ \Carbon\Carbon::parse($msg->created_at)->format('Y-m-d h:i A') }}
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <p class="text-center text-muted">لا توجد رسائل حتى الآن</p>
            @endforelse
        </div>

        <!-- صندوق الرد -->
        <div class="card-footer">
            <form action="{{ route('dashboard.support_chats.reply', $userId) }}" method="POST">
                @csrf
                <div class="input-group">
                    <textarea name="message" class="form-control" placeholder="اكتب رسالتك..." required></textarea>
                    <button type="submit" class="btn btn-primary">إرسال</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
