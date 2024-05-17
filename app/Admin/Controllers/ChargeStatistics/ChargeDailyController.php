<?php

namespace App\Admin\Controllers\ChargeStatistics;

use App\Admin\Builders\Form;
use App\Admin\Builders\Table;
use App\Admin\Builders\Table\Header;
use App\Admin\Controllers\Extend\StatisticsController;
use App\Admin\Models\ChargeStatistics\ChargeDailyModel;
use Illuminate\Http\Request;

class ChargeDailyController extends StatisticsController
{
    public function index(Request $request)
    {
        $begin = $this->getBeginTime($request);
        $end = $this->getEndTime($request);

        $data = ChargeDailyModel::getDaily($begin, $end);

        $header = collect([
            (new Header())->field('date')->title(trans('admin.time.date'))->align(),

            (new Header())->field('register')->title(trans('admin.statistics.register'))->align(),
            (new Header())->field('login')->title(trans('admin.statistics.login'))->align(),

            (new Header())->field('new_user')->title(trans("admin.statistics.new.user"))->align(),
            (new Header())->field('new_times')->title(trans("admin.statistics.new.times"))->align(),
            (new Header())->field('new_money')->title(trans("admin.statistics.new.money"))->align(),

            (new Header())->field('user')->title(trans("admin.statistics.user"))->align(),
            (new Header())->field('times')->title(trans("admin.statistics.times"))->align(),
            (new Header())->field('money')->title(trans("admin.statistics.money"))->align(),

            (new Header())->field('arp_u')->title('ARP-U')->align(),
            (new Header())->field('arp_pu')->title('ARP-PU')->align(),
            (new Header())->field('rate')->title(trans('admin.statistics.rate'))->align(),
        ]);

        $form = new Form();
        $form->method('GET')->inline()->align('right');
        $form->dateRange('date')->begin(date('Y-m-d', $begin))->end(date('Y-m-d', $end));

        return (new Table())
            ->form($form)
            ->header($header)
            ->data($data)
            ->build();
    }
}