<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Welcome extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->call->model('Email_model');
	}
	public function email()
	{

		$sentEmail = $this->Email_model->getSentEmails();

		$data = [
			'sentEmail' => $sentEmail
		];

		$this->call->view('email', $data);
	}
	public function send_mail()
	{
		$this->call->library('email');
		$this->call->library('upload', $_FILES["attachment"]);
		$this->upload
			->max_size(5)
			->min_size(1)
			->set_dir('public')
			->allowed_extensions(array('jpg'))
			->allowed_mimes(array('image/jpeg'))
			->is_image()
			->encrypt_name();
		// Get form data
		$recipientEmail = $this->io->post('recipientEmail');
		$subject = $this->io->post('subject');
		$message = $this->io->post('message');
		$attachment = $this->io->post('attachment');

		// Set default sender
		$sender = 'chiwiz1022@gmail.com';

		// Set email properties
		$this->email->sender($sender, 'Jan Dyze');
		$this->email->recipient($recipientEmail);
		$this->email->subject($subject);
		$this->email->email_content($message, 'html');
		$this->email->attachment($attachment);

		$bind = array(
			'recipient' => $recipientEmail,
			'subject' => $subject,
			'content' => $message,
		);

		$this->db->table('email')->insert($bind);
		// Send email
		$this->email->send();
		redirect('/email-sender');
	}

	public function get_email()
	{
	}
}
