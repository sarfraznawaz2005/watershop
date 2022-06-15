<?php

namespace Modules\Main\Http\Actions\Backup;

use File;
use Sarfraznawaz2005\Actions\Action;

class StoreBackup extends Action
{
    public function __invoke()
    {
        $itemsToBackup = [
            base_path('app'),
            base_path('config'),
            base_path('Modules'),
            base_path('public'),
            base_path('resources'),
            base_path('routes'),
        ];

        $backupPath = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'watershop/backup.tar';

        // db backup
        shell_exec(
            'mysqldump -u' . config('database.connections.mysql.username') . ' ' . config('database.connections.mysql.database') . ' > ' . public_path('backup.sql')
        );

        // files backup

        $itemsToBackup = array_map(static function ($item) {
            return realpath($item);
        }, $itemsToBackup);

        File::makeDirectory(dirname($backupPath), 0777, true, true);

        @unlink($backupPath);

        $itemsToBackup = implode(' ', $itemsToBackup);

        $command = 'cd ' . str_replace('\\', '/', base_path()) . " && tar -cpzf $backupPath $itemsToBackup";
        //exit($command);

        shell_exec($command . ' 2>&1');

        if (file_exists($backupPath)) {
            // download $backupPath
            return response()->download($backupPath);
        }

        return back()->withErrors(['Something went wrong']);
    }
}
