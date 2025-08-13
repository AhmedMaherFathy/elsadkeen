@extends('dashboard.layouts.base')

@section('content')
<section class="content">
    <!-- صندوق المحادثات -->
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row">
                @forelse($chats as $chat)
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                مستخدم رقم #{{ $chat->user->id }}
                                    @if(is_null($chat->admin_seen_at))
                                        <span class="badge bg-danger">جديد</span>
                                    @endif
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-8">
                                        <h2 class="lead"><b>{{ $chat->user->name }}</b></h2>
                                        <p class="text-muted text-sm"><b>البريد: </b> {{ $chat->user->email }}</p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small">
                                                <span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                                {{ $chat->user->country_code }} {{ $chat->user->phone }}
                                            </li>
                                            <li class="small">
                                                <span class="fa-li"><i class="fas fa-lg fa-venus-mars"></i></span>
                                                {{ $chat->user->gender == 'male' ? 'ذكر' : 'أنثى' }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-4 text-center">
                                        <img src="{{ $chat->user->image }}" 
                                             alt="صورة المستخدم" 
                                             class="img-circle img-fluid" 
                                             style="object-fit: cover; width: 80px; height: 80px;">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <a href="{{ route('dashboard.support_chats.show', $chat->user_id) }}" 
                                       class="btn btn-sm bg-teal">
                                        <i class="fas fa-comments"></i> عرض المحادثة
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center text-muted">لا توجد محادثات حالياً</p>
                    </div>
                @endforelse
            </div>
        </div>
        
        <!-- الباجيناشن -->
        <div class="card-footer">
            <nav aria-label="صفحات المحادثات">
                {{ $chats->links('pagination::bootstrap-4') }}
            </nav>
        </div>
    </div>
</section>
@endsection
