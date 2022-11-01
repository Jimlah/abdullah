<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Docker\DockerContainer;
use Spatie\Docker\Exceptions\CouldNotStartDockerContainer;
use Symfony\Component\Console\Command\Command as CommandAlias;

class DockerTester extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'docker:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     * @throws CouldNotStartDockerContainer
     */
    public function handle(): int
    {
        $instance = DockerContainer::create('nginx')
            ->remoteHost('ssh://minaret@192.168.43.128')
            ->mapPort(8002, 80)
//
//            ->setOptionalArgs('-it', '-a')
//            ->command('ls -l ')
//            ->stopOnDestruct()
//                ->daemonize()
            ->start();
        $process = $instance->execute('whoami');

        dd($process->getOutput());
        return CommandAlias::SUCCESS;
    }
}
