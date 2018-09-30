<?php
namespace App\Customer\Dashboard\Repositories;

use App\Customer\Conversation\Conversation as C;
use App\Customer\Dashboard\Repositories\Interfaces\DashboardRepositoryInterface;
use Jsdecena\Baserepo\BaseRepository;

class DashboardRepository extends BaseRepository implements DashboardRepositoryInterface
{

    /**
     * DashboardRepository constructor.
     * @param C $conversations
     */
    public function __construct(C $conversations)
    {
        parent::__construct($conversations);
        $this->model = $conversations;
    }

    /**
     * Total Conversation
     * @param array $params
     * @return int
     */
    public function totalConversation(array $params)
    {
        $total = $this->filter($params)
            ->groupBy('conversation_id')
            ->count();
        return (int) $total;
    }

    /**
     * Total Responded
     * @param array $params
     * @return int
     */
    public function totalResponded(array $params)
    {
        $total = $this->filter($params)
            ->whereIn('conversation_status',[C::DIRECT_RESPONSE, C::ESCALATE_RESPONSE])
            ->groupBy('conversation_id')
            ->count();
        return (int) $total;
    }

    /**
     * Total Escalate
     * @param array $params
     * @return int
     */
    public function totalEscalate(array $params)
    {
        $total = $this->filter($params)
            ->whereIn('conversation_status',[C::ESCALATE_SKIP, C::ESCALATE_RESPONSE, C::WAITING_ESCALATE, C::ANSWER_ESCALATE])
            ->groupBy('conversation_id')
            ->count();
        return (int) $total;
    }

    /**
     * Total Skipped
     * @param array $params
     * @return int
     */
    public function totalSkipped(array $params)
    {
        $total = $this->filter($params)
            ->whereIn('conversation_status',[C::ESCALATE_SKIP, C::DIRECT_SKIP])
            ->groupBy('conversation_id')
            ->count();
        return (int) $total;
    }

    /**
     * Total Comment
     * @param array $params
     * @return int
     */
    public function totalComment(array $params)
    {
        $total = $this->filter($params)
            ->whereIn('type',[C::COMMENT, C::REPLY])
            ->groupBy('conversation_id')
            ->count();
        return (int) $total;
    }

    /**
     * Total Message
     * @param array $params
     * @return int
     */
    public function totalMessage(array $params)
    {
        $total = $this->filter($params)
            ->whereIn('type',[C::MESSAGE])
            ->groupBy('conversation_id')
            ->count();
        return (int) $total;
    }

    /**
     * Get all avg_waiting_time and Avg avg_waiting_time
     * @param array $params
     */
    public function avgWaitingTime(array $params)
    {
        // TODO: Implement avgWaitingTime() method.
    }

    /**
     * Get all avg_processing_time and Avg avg_processing_time
     * @param array $params
     */
    public function avgProcessingTime(array $params)
    {
        // TODO: Implement avgProcessingTime() method.
    }

    /**
     * Get all conversations
     * @param array $params
     * @return mixed
     */
    public function conversations(array $params)
    {
        // TODO: Implement conversations() method.
        return $this->filter($params)
            ->groupBy('conversation_id');
    }

    /**
     * Filter
     * @param array $params
     * @return bool
     */
    private function filter(array $params)
    {
        if (empty($params['fb_page_id'])) {
            return false;
        }

        $filter = $this->model->where('fb_page_id', $params['fb_page_id']);

        if (!empty($params['start_date']) && !empty($params['end_date'])) {
            $filter->whereDate('date', '>=', $params['start_date']);
            $filter->whereDate('date', '<=', $params['end_date']);
        }

        $filter = $filter->orderBy('date')->get();

        return $filter;
    }
}
