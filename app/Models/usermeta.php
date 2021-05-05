<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class usermeta extends Model
{
    protected $table = 'usermeta';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public static function updateOrNew($user_id, $data)
    {
        foreach ($data as $key => $val) {
            usermeta::updateOrCreate(
                ['user_id' => $user_id, 'option' => $key],
                ['value' => $val]
            );
        }
    }
}
