<?php

namespace Modules\Console\Console;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Psy\Readline\Hoa\Console;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class GetTokenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'console:get-token {login} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Returns token for login and password';

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
        $user = User::where('email', $this->argument('login'))->first();
        if ($user && (Hash::check($this->argument('password'), $user->password))) {
            $token = $user->createToken('token_name_unused');
        } else {
            throw new \LogicException('Wrong credentials (no such user or incorrect password)');
        }

        $this->info('Token for '.$this->argument('login').':');
        $this->info($token->plainTextToken);
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['login', InputArgument::REQUIRED, 'Login argument.'],
            ['password', InputArgument::REQUIRED, 'Password argument.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
//            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
