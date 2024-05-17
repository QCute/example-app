<?php

namespace App\Admin\Controllers\Statistic;

use App\Admin\Builders\Chart;
use App\Admin\Controllers\Extend\StatisticController;
use App\Admin\Models\Statistic\LevelModel;
use Illuminate\Http\Request;

class LevelController extends StatisticController
{
    public function index(Request $request)
    {
        $paginator = LevelModel::paginate(10, ['*'], 'page', 1);

        $data = collect($paginator->items());

        // $category = $this->getCategory($request);
        $category = $data->pluck('level');
        $value = $this->getValue($request);

        return (new Chart())
            ->key('level')
            ->value([
                'number' => trans('admin.statistic.number'),
            ])
            ->bar($data)
            ->yAxis('category', $category)
            ->xAxis('value', $value)
            ->grid(null, null, 32, 32)
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
