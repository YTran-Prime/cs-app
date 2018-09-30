<?php

namespace App\Customer\Conversation\Repositories\Interfaces;

use App\Customer\Conversation\Conversation;
use Jsdecena\Baserepo\BaseRepositoryInterface;

interface ConversationRepositoryInterface extends BaseRepositoryInterface
{
    public function listConversation(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    public function createConversation(array $params) : Conversation;
}
