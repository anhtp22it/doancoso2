<?php

namespace App\Console\Commands;

use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateJobStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-job-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update job status based on dealine';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        Job::where('deadline', '<', now())
            ->update(['status' => 'Expried']);
    }
}
