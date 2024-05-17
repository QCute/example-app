<?php

use App\Admin\Controllers\ActiveStatistics\DailyOnlineTimeController;
use App\Admin\Controllers\ActiveStatistics\UserLoginController;
use App\Admin\Controllers\ActiveStatistics\UserOnlineController;
use App\Admin\Controllers\ActiveStatistics\UserRegisterController;
use App\Admin\Controllers\ActiveStatistics\UserSurvivalController;
use App\Admin\Controllers\Assistant\BuilderTestController;
use App\Admin\Controllers\Assistant\KeyAssistantController;
use App\Admin\Controllers\Auth\AuthController;
use App\Admin\Controllers\Admin\MenuController;
use App\Admin\Controllers\Admin\OperationLogController;
use App\Admin\Controllers\Admin\PermissionController;
use App\Admin\Controllers\Admin\RoleController;
use App\Admin\Controllers\Admin\SettingController;
use App\Admin\Controllers\Admin\UserController;
use App\Admin\Controllers\ChargeStatistics\ArpPuController;
use App\Admin\Controllers\ChargeStatistics\ArpUController;
use App\Admin\Controllers\ChargeStatistics\ChargeDailyController;
use App\Admin\Controllers\ChargeStatistics\ChargeDistributionController;
use App\Admin\Controllers\ChargeStatistics\ChargeRankController;
use App\Admin\Controllers\ChargeStatistics\ChargeRateController;
use App\Admin\Controllers\ChargeStatistics\FirstChargeTimeDistributionController;
use App\Admin\Controllers\ChargeStatistics\LtvController;
use App\Admin\Controllers\Extend\ChannelController;
use App\Admin\Controllers\Extend\ServerController;
use App\Admin\Controllers\Extend\ConfigController;
use App\Admin\Controllers\GameConfigure\ConfigureFileController;
use App\Admin\Controllers\GameConfigure\ConfigureTableController;
use App\Admin\Controllers\GameData\ClientErrorLogController;
use App\Admin\Controllers\GameData\TableDataController;
use App\Admin\Controllers\GameData\TableListController;
use App\Admin\Controllers\HomeController;
use App\Admin\Controllers\Operation\MailController;
use App\Admin\Controllers\Operation\NoticeController;
use App\Admin\Controllers\Operation\ImpeachController;
use App\Admin\Controllers\Operation\MaintainNoticeController;
use App\Admin\Controllers\Operation\SensitiveWordDataController;
use App\Admin\Controllers\Operation\UserChatManageController;
use App\Admin\Controllers\Operation\UserManageController;
use App\Admin\Controllers\ServerManage\ChannelListController;
use App\Admin\Controllers\ServerManage\MergeServerController;
use App\Admin\Controllers\ServerManage\OpenServerController;
use App\Admin\Controllers\ServerManage\ServerListController;
use App\Admin\Controllers\ServerManage\ServerTuningController;
use App\Admin\Controllers\Statistics\AssetConsumeController;
use App\Admin\Controllers\Statistics\AssetProduceController;
use App\Admin\Controllers\Statistics\LevelController;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;

// auth
Route::get('/auth/index', [AuthController::class, 'index'])->name('admin.index');
Route::post('/auth/login', [AuthController::class, 'login'])->name('admin.login');
Route::get('/auth/profile', [AuthController::class, 'profile'])->name('admin.profile');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('admin.logout');

// auth setting
Route::get('/auth/setting', [SettingController::class, 'get'])->name('admin.setting');
Route::post('/auth/setting', [SettingController::class, 'set'])->name('admin.setting');

// auth user/role/permission
Route::resource('/auth/user', UserController::class)->names('admin.auth.user');
Route::resource('/auth/role', RoleController::class)->names('admin.auth.role');
Route::resource('/auth/permission', PermissionController::class)->names('admin.auth.permission');
Route::resource('/auth/menu', MenuController::class)->names('admin.auth.menu');
Route::resource('/auth/log', OperationLogController::class)->names('admin.auth.log');

// config
Route::get('/config/{data}', [ConfigController::class, 'index'])->name('admin.config');

// admin extend channel/server
Route::get('/channel/get', [ChannelController::class, 'index']);
Route::post('/channel/change', [ChannelController::class, 'change']);
Route::get('/server/get', [ServerController::class, 'index']);
Route::post('/server/change', [ServerController::class, 'change']);

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// User Active Statistics
Route::get('/active-statistics/user-online', [UserOnlineController::class, 'index']);
Route::get('/active-statistics/user-register', [UserRegisterController::class, 'index']);
Route::get('/active-statistics/user-login', [UserLoginController::class, 'index']);
Route::get('/active-statistics/user-survival', [UserSurvivalController::class, 'index']);
Route::get('/active-statistics/daily-online-time', [DailyOnlineTimeController::class, 'index']);

// User Charge Statistics
Route::get('/charge-statistics/ltv', [LtvController::class, 'index']);
Route::get('/charge-statistics/arp-u', [ArpUController::class, 'index']);
Route::get('/charge-statistics/arp-pu', [ArpPuController::class, 'index']);
Route::get('/charge-statistics/charge-rate', [ChargeRateController::class, 'index']);
Route::get('/charge-statistics/charge-daily', [ChargeDailyController::class, 'index']);
Route::get('/charge-statistics/charge-rank', [ChargeRankController::class, 'index']);
Route::get('/charge-statistics/charge-distribution', [ChargeDistributionController::class, 'index']);
Route::get('/charge-statistics/first-charge-time-distribution', [FirstChargeTimeDistributionController::class, 'index']);

// User Statistics
Route::get('/statistics/level', [LevelController::class, 'index']);
Route::get('/statistics/asset-produce', [AssetProduceController::class, 'index']);
Route::get('/statistics/asset-consume', [AssetConsumeController::class, 'index']);

// Game Data(user/configure/log)
Route::get('/game-table/{type}/{action?}', [TableListController::class, 'index']);
Route::get('/game-data/{table}/{action?}', [TableDataController::class, 'index']);
Route::resource('/game-admin/client-error-log', ClientErrorLogController::class);

// Configure Data
Route::get('/configure-table', [ConfigureTableController::class, 'index']);
Route::get('/configure-file/erl', [ConfigureFileController::class, 'index']);
Route::get('/configure-file/lua', [ConfigureFileController::class, 'index']);
Route::get('/configure-file/js', [ConfigureFileController::class, 'index']);

// Server Manage
Route::resource('/server-manage/channel-list', ChannelListController::class);
Route::resource('/server-manage/server-list', ServerListController::class);
Route::get('/server-manage/server-tuning/index', [ServerTuningController::class, 'index']);
Route::get('/server-manage/server-tuning/get-server-time', [ServerTuningController::class, 'getServerTime']);
Route::get('/server-manage/server-tuning/get-server-state', [ServerTuningController::class, 'getServerState']);
Route::get('/server-manage/open', [OpenServerController::class, 'index']);
Route::post('/server-manage/open-server', [OpenServerController::class, 'submit']);
Route::get('/server-manage/merge', [MergeServerController::class, 'index']);
Route::post('/server-manage/merge-submit', [MergeServerController::class, 'submit']);

// Operation
Route::resource('/operation/user-manage', UserManageController::class);
Route::resource('/operation/user-chat-manage', UserChatManageController::class);
Route::resource('/operation/mail', MailController::class);
Route::resource('/operation/notice', NoticeController::class);
Route::resource('/operation/maintain-notice', MaintainNoticeController::class);
Route::resource('/operation/impeach', ImpeachController::class);
Route::resource('/operation/sensitive-word-data', SensitiveWordDataController::class);

// Assistant
Route::get('/assistant/key-assistant', [KeyAssistantController::class, 'index']);
Route::post('/assistant/key-assistant-make', [KeyAssistantController::class, 'make']);
Route::resource('/assistant/builder-test', BuilderTestController::class);
