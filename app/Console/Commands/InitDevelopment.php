<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;

class InitDevelopment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init:dev';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize/ReInitialize whole DB and stuff';

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
        try {
            if (App::environment(['production'])) {
                $this->confirm('Do you really want to reset the database?');
            }
            $this->call('migrate:fresh');
            User::flushEventListeners();
            $this->call('db:seed');
            $this->call('passport:keys');
            $this->createPassportPasswordClientAndSetEnv();
        }catch (Exception $e){
            $this->error($e->getMessage());
            exit;
        }
        return;
    }

    public function createPassportPasswordClientAndSetEnv(){
        Artisan::call('passport:client',[
            '--password' => null,
            '--no-interaction' => true,
            ]);
        $arr = str_replace(' ', '', explode("\n", Artisan::output()));
        $envArguments = [
            'PASSPORT_PASSWORD_GRANT_CLIENT_ID' => substr($arr[1], strpos($arr[1], ":") + 1),
            'PASSPORT_PASSWORD_GRANT_CLIENT_SECRET' => substr($arr[2], strpos($arr[2], ":") + 1)
        ];
        $this->setEnvironmentValue($envArguments);
        $this->info('Password Grant Client generated and updated .env');
    }

    public function setEnvironmentValue(array $values)
    {

        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {

                $str .= "\n"; // In case the searched variable is in the last line without \n
                $keyPosition = strpos($str, "{$envKey}=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

                // If key does not exist, add it
                if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                    $str .= "{$envKey}={$envValue}\n";
                } else {
                    $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
                }

            }
        }

        $str = substr($str, 0, -1);
        if (!file_put_contents($envFile, $str)) return false;
        return true;

    }
}
