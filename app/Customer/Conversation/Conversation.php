<?php

namespace App\Customer\Conversation;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Conversation extends Model
{

//    protected $connection = 'mongodb';
//    protected $collection = 'conversations';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'conversation_id',
        'fb_page_id',
        'type',
        'date',
        'conversation_status',
        'avg_waiting_time',
        'avg_processing_time'
    ];

    const OPENING = 1;
    const DIRECT_SKIP = 2;
    const ESCALATE_SKIP = 3;
    const DIRECT_RESPONSE = 4;
    const ESCALATE_RESPONSE = 5;
    const WAITING_ESCALATE = 6;
    const ANSWER_ESCALATE = 7;
    // Conversation Type
    const MESSAGE = 1;
    const COMMENT = 2;
    const REPLY = 3;
    const POST_ON_WALL = 4;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['_id'];

}
