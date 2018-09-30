<?php

namespace App\Customer\Dashboard\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;

interface DashboardRepositoryInterface extends BaseRepositoryInterface
{
    public function totalConversation(array $params);

    public function totalResponded(array $params);

    public function totalEscalate(array $params);

    public function totalSkipped(array $params);

    public function totalComment(array $params);

    public function totalMessage(array $params);

    public function avgWaitingTime(array $params);

    public function avgProcessingTime(array $params);

    public function conversations(array $params);
}
