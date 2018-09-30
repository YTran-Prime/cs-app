<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Customer\Dashboard\Repositories\Interfaces\DashboardRepositoryInterface;
use App\Customer\Dashboard\Transformations\DashboardTransformable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    CONST Paginate = 10;

    use DashboardTransformable;

    private $dashboardRepo;

    public function __construct(DashboardRepositoryInterface $dashboardRepository) {
        $this->dashboardRepo = $dashboardRepository;
    }

    public function getTotalConversation(Request $request)
    {
        return $this->dashboardRepo->totalConversation($request->all());
    }

    public function getTotalResponded(Request $request)
    {
        return $this->dashboardRepo->totalResponded($request->all());
    }

    public function getTotalEscalate(Request $request)
    {
        return $this->dashboardRepo->totalEscalate($request->all());
    }

    public function getTotalSkipped(Request $request)
    {
        return $this->dashboardRepo->totalSkipped($request->all());
    }

    public function getTotalComment(Request $request)
    {
        return $this->dashboardRepo->totalComment($request->all());
    }

    public function getTotalMessage(Request $request)
    {
        return $this->dashboardRepo->totalMessage($request->all());
    }

    public function getAvgWaitingTime(Request $request)
    {
        return $this->dashboardRepo->avgWaitingTime($request->all());
    }

    public function getAvgProcessingTime(Request $request)
    {
        return $this->dashboardRepo->avgProcessingTime($request->all());
    }

    public function getConversation(Request $request)
    {
        return $this->dashboardRepo->conversations($request->all());
    }

}
