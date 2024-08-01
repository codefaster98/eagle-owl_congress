<?php

namespace App\Models\events;

use Illuminate\Database\Eloquent\Model;

class EventsEventsSpeakersM extends Model
{
    public $timestamps = false;
    protected $table = "events_events_speakers";
    protected $fillable = [
        'speaker_id',
        'event_id',
    ];
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected function casts(): array
    {
        return [];
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
