<?php
namespace App\Mailer;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Constracts\Queue\ShouIdQueue;

class HelloMailer extends Mailable
{
	use Queueable, SerializesModels;

	public function __construct()
	{

	}

	public function build()
	{
		return $this->view('mailer/hello_mailer')->subject('Hello Mailer');
	}
}