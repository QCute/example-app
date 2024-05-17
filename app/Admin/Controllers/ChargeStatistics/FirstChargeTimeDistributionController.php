<?php

namespace App\Admin\Controllers\ChargeStatistics;

use App\Admin\Builders\Chart;
use App\Admin\Controllers\Extend\StatisticsController;
use App\Admin\Models\ChargeStatistics\FirstChargeTimeDistributionModel;
use Illuminate\Http\Request;

class FirstChargeTimeDistributionController extends StatisticsController
{
    public function index(Request $request)
    {
        $data = FirstChargeTimeDistributionModel::getRate();
        $data = collect(self::slice($data));

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

    private static function slice($data): array
    {
        // 1, 2, 3, 4, 5, 6, 7, 8, 9, 10
        // 20, 30, 40, 50, 60, 70, 80, 90, 100, ..
        $range = [1, 2, 3, 4, 5, 6, 7, 8, 9, 11, 12, 13, 14, 30];
        $result = self::buildRange($range);

        foreach ($data as $row) {
            $number = ($row->time / 86400);
            $key = self::findRange($range, $number);
            $result[$key]['value']++;
        }

        return array_values($result);
    }

    private static function buildRange(array $range): array
    {
        $pre = 0;
        $result = [];
        foreach($range as $item) {

            $key = $pre . '-' . $item;
            $result[$key] = [
                'name' => $key . trans('admin.word.gap') . trans('admin.time.day'),
                'value' => 0,
                'label' => [
                    'formatter' => '{b}: {c} ({d}%)'
                ]
            ];

            $pre = $item;
        }

        $key = $pre . '-' . '∞';
        $result[$key] = [
            'name' => $key . trans('admin.word.gap') . trans('admin.time.day'),
            'value' => 0,
            'label' => [
                'formatter' => '{b}: {c} ({d}%)'
            ]
        ];

        return $result;
    }

    private static function findRange(array $range, int $number): string
    {
        $pre = 0;
        foreach($range as $item) {
            if($number < $item) {
                return $pre . '-' . $item;
            }

            $pre = $item;
        }

        $last = $range[array_key_last($range)];
        return $last . '-' . '∞';
    }
}
