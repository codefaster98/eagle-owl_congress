<?php

namespace App\Models\events;

use Illuminate\Database\Eloquent\Model;

class EventsEventsM extends Model
{
    public $table = "events_events";
    protected $fillable = [
        'code',
        'category_id',
        'name',
        'short_details',
        'long_details',
        'date',
        'from_time',
        'to_time',
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
            'date' => 'date:Y-m-d',
            'from_time' => 'date:H:i',
            'to_time' => 'date:H:i',
            'name' => 'array',
            'short_details' => 'array',
            'long_details' => 'array',
        ];
    }
    public function Category()
    {
        return $this->hasOne(EventsCategoryM::class, "id", "category_id");
    }
    public function Speakers()
    {
        return $this->hasMany(EventsEventsSpeakersM::class, "event_id", "id")->with("Speakers");
    }
    public function Sponsors()
    {
        return $this->hasMany(EventsEventsSponsorsM::class, "event_id", "id");
    }
}
