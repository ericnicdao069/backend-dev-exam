<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Luigel\Paymongo\Facades\Paymongo;

class PaymongoWebhooks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'paymongo:webhooks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Register webhooks using Paymongo.';

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
     * @return int
     */
    public function handle()
    {
        $webhook = Paymongo::webhook()->create([
            'url' => route('api.webhook.paymongo.payment-paid'),
            'events' => [
                'payment.paid'
            ]
        ]);

        $webhook = Paymongo::webhook()->create([
            'url' => route('api.webhook.paymongo.payment-failed'),
            'events' => [
                'payment.failed'
            ]
        ]);

        $webhook = Paymongo::webhook()->create([
            'url' => route('api.webhook.paymongo.source-chargeable'),
            'events' => [
                'source.chargeable'
            ]
        ]);

        return Command::SUCCESS;
    }
}
