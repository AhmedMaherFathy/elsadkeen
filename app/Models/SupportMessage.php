<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportMessage extends Model
{
    protected $fillable = [
        'support_chat_id',
        'user_id',
        'admin_id',
        'message',
        'type',
        'user_seen_at',
        'admin_seen_at',
    ];

    public function supportChat()
    {
        return $this->belongsTo(SupportChat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
