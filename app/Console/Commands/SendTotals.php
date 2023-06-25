<?php
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Vote;
use App\Mail\DailyTotalsMail;

class SendTotals extends Command
{
    protected $signature = 'send:totals';

    protected $description = 'Send email with totals of scores';

    public function handle()
    {
        // Calculate totals
        $totals = Vote::groupBy('option_id')
            ->select('option_id', DB::raw('COUNT(*) as count'))
            ->get();

        // Build email content
        $content = '';
        foreach ($totals as $total) {
            $content .= "Option {$total->option_id} voted for {$total->count} times\n";
        }

        // Send email
        Mail::to('dev@steadfastcollective.com')->send(new DailyTotalsMail($content));

        $this->info('Email sent with totals of scores.');
    }
}
