<?php

namespace App\Models\events;

use Illuminate\Database\Eloquent\Model;

class EventsEventsUsersM extends Model
{
    public $timestamps = false;
    protected $table = "events_events_users";
    protected $fillable = [
        'event_id',
        'user_id',
        'date',
        'attend',
        'price',
        'Payment_details',
        'paid',
    ];
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected function casts(): array
    {
        return [
            "attend" => "boolean",
            "paid" => "boolean",
            "Payment_details" => "json",
        ];
    }
    public function Event()
    {
        return $this->hasOne(EventsEventsM::class, "id", "event_id");
    }
    public function Speakers()
    {
        return $this->hasOne(EventsSpeakersM::class, "id", "speaker_id");
    }
}
