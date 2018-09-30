<?php
namespace App\Customer\Conversation\Repositories;

use App\Customer\Conversation\Conversation;
use App\Customer\Conversation\Exceptions\CreateConversationErrorException;
use App\Customer\Conversation\Repositories\Interfaces\ConversationRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
use Jsdecena\Baserepo\BaseRepository;

class ConversationRepository extends BaseRepository implements ConversationRepositoryInterface
{

    /**
     * DashboardRepository constructor.
     * @param Conversation $conversations
     */
    public function __construct(Conversation $conversations)
    {
        parent::__construct($conversations);
        $this->model = $conversations;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return Collection
     */
    public function listConversation(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }
    /**
     * @param array $data
     * @return Conversation
     * @throws CreateConversationErrorException
     */
    public function createConversation(array $data) : Conversation
    {
        try {
            return $this->create($data);
        } catch (QueryException $e) {
            throw new CreateConversationErrorException('Conversation creation error');
        }
    }
}
