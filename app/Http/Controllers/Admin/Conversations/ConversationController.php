<?php

namespace App\Http\Controllers\Admin\Conversations;

use App\Customer\Conversation\Conversation;
use App\Customer\Conversation\Repositories\Interfaces\ConversationRepositoryInterface;
use App\Customer\Conversation\Transformations\ConversationTransformable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    CONST Paginate = 10;

    use ConversationTransformable ;

    private $conversationRepo;

    public function __construct(ConversationRepositoryInterface $conversationRepository) {
        $this->conversationRepo = $conversationRepository;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $list = $this->conversationRepo->listConversation('created_at', 'desc');
        $conversations = $list->map(function (Conversation $conversation) {
            return $this->transformConversation($conversation);
        })->all();
        return $this->conversationRepo->paginateArrayResults($conversations, self::Paginate);
    }

    /**
     * @param Request $request
     * @return \App\Customer\Conversation\Conversation
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request) : Conversation
    {
        $this->validate($request, [
            'conversation_id' => 'required',
            'fb_page_id' => 'required',
            'type' => 'required',
            'date' => 'required|date',
            'conversation_status' => 'required',
            'avg_waiting_time' => 'required',
            'avg_processing_time' => 'required'
        ]);

        $conversations = $this->conversationRepo->createConversation($request->all());
        return $conversations;
    }

}
