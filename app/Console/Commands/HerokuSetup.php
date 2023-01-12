<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;

class HerokuSetup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'heroku:install {--force : Do not ask for user confirmation}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the ecommerce basic functionalities';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if($this->option('force')) {
            $this->proceed();
        } else if($this->confirm('This will delete all your current data and database and install the default dummy data Are You Sure?')) {
            $this->proceed();
        }            
    }
    
    protected function proceed() {
        File::deleteDirectory(public_path('storage/products/dummy'));
        File::deleteDirectory(public_path('storage/users'));
        $this->info(file_exists(public_path('/images/products')));
        $this->callSilent('storage:link');
        $copySuccess1 = File::copyDirectory(public_path('/images/products'), public_path('storage/products/dummy'));
        $copySuccess2 = File::copyDirectory(public_path('/images/users'), public_path('storage/users'));
        if($copySuccess1 && $copySuccess2) {
            $this->info('Images successfully moved to storage folder');
        }
        // $this->call('migrate:refresh', [
        //     '--seed' => true
        // ]);
        // $this->info('cleared the database and seeded basic tables successfully');
        // $this->call('db:seed', [
        //     '--class' => 'VoyagerDatabaseSeeder'
        // ]);
        // $this->call('db:seed', [
        //     '--class' => 'VoyagerDummyDatabaseSeeder'
        // ]);
        // $this->call('db:seed', [
        //     '--class' => 'DataTypesTableSeederCustom'
        // ]);
        // $this->call('db:seed', [
        //     '--class' => 'DataRowsTableSeederCustom'
        // ]);
        // $this->call('db:seed', [
        //     '--class' => 'MenusTableSeederCustom'
        // ]);
        // $this->call('db:seed', [
        //     '--class' => 'MenuItemsTableSeederCustom'
        // ]);
        // $this->call('db:seed', [
        //     '--class' => 'PermissionsTableSeederCustom'
        //     ]);
        // $this->call('db:seed', [
        //     '--class' => 'PermissionRoleTableSeederCustom'
        // ]);
        // $this->call('db:seed', [
        //     '--class' => 'SettingsTableSeederCustom'
        // ]);
        // $this->call('db:seed', [
        //     '--class' => 'OrdersTableSeeder'
        // ]);
        // $this->call('db:seed', [
        //     '--class' => 'OrderProductTableSeeder'
        // ]);
    }
}
