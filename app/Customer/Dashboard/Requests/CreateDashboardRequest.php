<?php

namespace App\Customer\Conversation\Requests;

use App\Customer\Base\BaseFormRequest;

class CreateDashboardRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'conversation_id' => ['required'],
            'fb_page_id' => ['required'],
            'conversation_status' => ['required'],
            'type' => ['required'],
            'date' => ['required|date'],
            'avg_waiting_time' => ['required'],
            'avg_processing_time' => ['required']
        ];
    }
}
