<?php

namespace App\Models\events;

use Illuminate\Database\Eloquent\Model;

class EventsEventsSponsorsM extends Model
{
    public $timestamps = false;
    protected $table = "events_events_sponsors";
    protected $fillable = [
        'sponsors_id',
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
    public function Sponsors()
    {
        return $this->hasOne(EventsSponsorsM::class, "id", "sponsors_id");
    }
}
