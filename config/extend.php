<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel admin database extend settings
    |--------------------------------------------------------------------------
    |
    | Here are database settings for laravel admin builtin model & tables.
    |
    */
    'database' => [

        // Database connection for following tables.
        'connection' => 'extend',

        // Channel table and model.
        'channel_table' => 'channel',
        'channel_model' => App\Admin\Models\Extend\ChannelModel::class,

        // Role channel tables and model.
        'role_channel_table' => 'role_channel',
        'role_channel_model' => App\Admin\Models\Extend\RoleChannelModel::class,

        // Server table and model.
        'channel_server_table' => 'channel_server',
        'channel_server_model' => App\Admin\Models\Extend\ChannelServerModel::class,

        // Server table and model.
        'server_table' => 'server',
        'server_model' => App\Admin\Models\Extend\ServerModel::class,

        // Role server tables and model.
        'role_server_table' => 'role_server',
        'role_server_model' => App\Admin\Models\Extend\RoleServerModel::class,

        // Pivot table for table above.
        'configure_file_table' => 'configure_file',
        'configure_file_model' => App\Admin\Models\GameConfigure\ConfigureFileModel::class,

        // Pivot table for table above.
        'configure_table_table' => 'configure_table',
        'configure_table_model' => App\Admin\Models\GameConfigure\ConfigureTableModel::class,

        // Pivot table for table above.
        'import_log_table' => 'import_log',
        'import_log_model' => App\Admin\Models\GameConfigure\ImportLogModel::class,

        // Pivot table for table above.
        'user_manage_table' => 'user_manage',
        'user_manage_model' => App\Admin\Models\Operation\UserManageModel::class,

        // Pivot table for table above.
        'user_chat_manage_table' => 'user_chat_manage',
        'user_chat_manage_model' => App\Admin\Models\Operation\UserChatManageModel::class,

        // Pivot table for table above.
        'mail_table' => 'mail',
        'mail_model' => App\Admin\Models\Operation\MailModel::class,

        // Pivot table for table above.
        'notice_table' => 'notice',
        'notice_model' => App\Admin\Models\Operation\NoticeModel::class,

        // Pivot table for table above.
        'ssh_key_table' => 'ssh_key',
        'ssh_key_model' => App\Admin\Models\Assistant\SSHKeyModel::class,
    ],

];
