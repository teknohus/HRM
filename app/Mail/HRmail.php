<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class HRmail extends Mailable
{
    use Queueable, SerializesModels;
    public $popup , $popupremain , $anniversarypopup , $popupanniversarypopupremain;
    public function __construct($popup , $popupremain , $anniversarypopup , $popupanniversarypopupremain)
    {
        $this->popup = $popup;
        $this->popupremain = $popupremain;
        $this->anniversarypopup = $anniversarypopup;
        $this->popupanniversarypopupremain = $popupanniversarypopupremain;
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Birthdays and Anniversary Alerts!',
        );
    }
    public function content(): Content
    {
        return new Content(
            view: 'HRmail.hr',
        );
    }
    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
