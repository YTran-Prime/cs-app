<?php

namespace App\Customer\Conversation\Transformations;

use App\Customer\Conversation\Conversation;

trait ConversationTransformable
{
    /**
     * @param Conversation $conversation
     * @return Conversation
     */
    public function transformConversation(Conversation $conversation)
    {
        $obj = new Conversation;
        $obj->conversation_id = (int) $conversation->conversation_id;
        $obj->fb_page_id = $conversation->fb_page_id;
        $obj->conversation_status = (int) $conversation->conversation_status;
        $obj->type = (int) $conversation->type;
        $obj->date =  $conversation->date;
        $obj->avg_waiting_time = (int) $conversation->avg_waiting_time;
        $obj->avg_processing_time = (int) $conversation->avg_processing_time;

        return $obj;
    }
}
