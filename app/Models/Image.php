<?php

namespace App\Models;

use App\Models\Room;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
   protected $fillable = ['room_id', 'path'];

   public function room(){
    return $this->belongsTo(Room::class);
   }
}
