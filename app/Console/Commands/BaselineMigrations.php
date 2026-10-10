<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class BaselineMigrations extends Command
{
    protected $signature = 'migrations:baseline
        {--apply : Register the reviewed pending migrations}
        {--names= : Comma-separated migration names}
        {--all : Select all pending migration files}';

    protected $description = 'Register existing migrations without running them';

    public function handle()
    {
        if (! Schema::hasTable('migrations')) {
            $this->error('Migrations table is missing.');

            return 1;
        }

        $existing = DB::table('migrations')
            ->pluck('migration')
            ->all();

        $pending = [];

        foreach (File::files(database_path('migrations')) as $file) {
            $name = pathinfo(
                $file->getFilename(),
                PATHINFO_FILENAME
            );

            if (! in_array($name, $existing, true)) {
                $pending[] = $name;
            }
        }

        sort($pending);

        if (empty($pending)) {
            $this->info('No pending migrations.');

            return 0;
        }

        if ($this->option('all')) {
            $selected = $pending;
        } else {
            $selected = array_filter(
                array_map(
                    'trim',
                    explode(',', $this->option('names') ?? '')
                )
            );
        }

        if (! $this->option('apply')) {
            foreach ($pending as $name) {
                $this->line($name);
            }

            $this->info('Pending migrations: '.count($pending));
            $this->warn('No changes were made.');

            return 0;
        }

        if (empty($selected)) {
            $this->error('Specify --names or --all.');

            return 1;
        }

        foreach ($selected as $name) {
            if (! in_array($name, $pending, true)) {
                $this->error("Invalid or already registered: {$name}");

                return 1;
            }
        }

        $this->warn(
            'This will mark '.count($selected).
            ' migrations as executed WITHOUT running them.'
        );

        if (! $this->confirm(
            'Have you verified ALL selected migrations match the current database?',
            false
        )) {
            $this->info('Cancelled.');

            return 0;
        }

        $batch = ((int) DB::table('migrations')->max('batch')) + 1;

        DB::transaction(function () use ($selected, $batch) {
            foreach ($selected as $name) {
                DB::table('migrations')->insert([
                    'migration' => $name,
                    'batch' => $batch,
                ]);
            }
        });

        $this->info(
            count($selected).' migrations registered successfully.'
        );

        return 0;
    }
}
