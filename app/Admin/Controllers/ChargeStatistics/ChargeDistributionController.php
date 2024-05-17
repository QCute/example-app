<?php

namespace App\Admin\Controllers\ChargeStatistics;

use App\Admin\Builders\Chart;
use App\Admin\Controllers\Extend\StatisticsController;
use App\Admin\Models\ChargeStatistics\ChargeDistributionModel;
use Illuminate\Http\Request;

class ChargeDistributionController extends StatisticsController
{
    public function index(Request $request)
    {
        $begin = $this->getBeginTime($request);
        $end = $this->getEndTime($request);

        $data = ChargeDistributionModel::getRate($begin, $end);

        return (new Chart())
            ->pie($data)
            ->grid(null, null, 32, null)
            ->legend(null, 0, null, null, [
                'orient' => 'vertical',
                'itemGap' => 20,
            ])
            ->color([
                '#0090FF',
                '#36CE9E',
                '#FFC005',
                '#FF515A',
                '#8B5CFF',
                '#00CA69'
            ])
            ->build();
    }
}
