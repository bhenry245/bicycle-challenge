<?php
namespace App\Console\Commands;



use Illuminate\Console\Command;
use App\Entities\Bicycle;


class BicycleCommands extends Command 
{

    protected $signature = 'bicycle:action {action}';
    protected $description = 'Perform actions on a bicycle.';

    public function handle() {
        $action = $this->argument('action');
        $bicycle = new Bicycle();

        switch ($action) {
            case 'ride':
                $bicycle->pedal();
                break;
    
            case 'brake':
                $bicycle->brake();
                break;
    
            default:
                $this->error('Invalid action. Please specify "ride" or "brake".');
                break;
        }
    }

}