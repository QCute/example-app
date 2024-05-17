<?php

namespace App\Admin\Controllers\Statistics;

use App\Admin\Builders\Chart;
use App\Admin\Controllers\Extend\StatisticsController;
use App\Admin\Models\Statistics\LevelModel;
use Illuminate\Http\Request;

class LevelController extends StatisticsController
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
                'number' => trans('admin.statistics.number'),
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
