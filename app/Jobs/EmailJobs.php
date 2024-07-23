<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\AnnivarsayEmail;

class EmailJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $subject, $dojmail , $employeeName , $companyName , $workedYears;
    public function __construct($dojmail,$subject,$employeeName, $companyName,$workedYears)
    {
        $this->dojmail = $dojmail;
        $this->subject = $subject;
        $this->employeeName = $employeeName;
        $this->companyName = $companyName;
        $this->workedYears = $workedYears;
    }

    public function handle(): void
    {
        Mail::to($this->dojmail)->send(new  AnnivarsayEmail($this->subject,$this->employeeName, $this->companyName,$this->workedYears));
    }
}
