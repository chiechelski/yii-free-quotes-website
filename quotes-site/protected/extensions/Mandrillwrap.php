<?php

class Mandrillwrap extends CApplicationComponent {

	public $mandrillKey;
    public $html;
	public $fromEmail;
	public $fromName;
	public $toEmail;
	public $toName;
	public $text;
	public $subject;

	public function __construct()
	{
		Yii::import('application.vendors.mandrill.Mandrill');
		define('MANDRILL_APIKEY','F0Pqy5EN5AFKZ-wX5v0rXg');
	}

	public function sendEmail()
    {
        try {
            $mandrill = new Mandrill(MANDRILL_APIKEY);
            $message = array(
                'html' => $this->html,
                'subject' => $this->subject,
                'from_email' => $this->fromEmail,
                'from_name' =>  $this->fromName,
                'to' => array(
                    array(
                        'email' =>  $this->toEmail,
                        'name' => $this->toName,
                        'type' => 'to'
                    )
                ),
                'headers' => array('Reply-To' => 'info@donedusted.co.nz'),
                'important' => false,
                'track_opens' => null,
                'track_clicks' => null,
                'auto_text' => null,
                'auto_html' => null,
                'inline_css' => null,
                'url_strip_qs' => null,
                'preserve_recipients' => null,
                'view_content_link' => null,
                'bcc_address' => 'info@donedusted.co.nz',
                'tracking_domain' => null,
                'signing_domain' => null,
                'return_path_domain' => null,
                /*
                'merge' => true,
                'global_merge_vars' => array(
                    array(
                        'name' => 'merge1',
                        'content' => 'merge1 content'
                    )
                ),
                'merge_vars' => array(
                    array(
                        'rcpt' => 'recipient.email@example.com',
                        'vars' => array(
                            array(
                                'name' => 'merge2',
                                'content' => 'merge2 content'
                            )
                        )
                    )
                ),*/
                'tags' => array('password-resets'),
                /*
                'subaccount' => 'customer-123',
                'google_analytics_domains' => array('example.com'),
                'google_analytics_campaign' => 'message.from_email@example.com',
                'metadata' => array('website' => 'www.example.com'),

                'recipient_metadata' => array(
                    array(
                        'rcpt' => 'recipient.email@example.com',
                        'values' => array('user_id' => 123456)
                    )
                ),
                'attachments' => array(
                    array(
                        'type' => 'text/plain',
                        'name' => 'myfile.txt',
                        'content' => 'ZXhhbXBsZSBmaWxl'
                    )
                ),
                'images' => array(
                    array(
                        'type' => 'image/png',
                        'name' => 'IMAGECID',
                        'content' => 'ZXhhbXBsZSBmaWxl'
                    )
                )
                */
            );
            $async = false;
            $ip_pool = 'Main Pool';

            // $send_at = date("Y-m-d H:i:s");

            $result = $mandrill->messages->send($message, $async, $ip_pool, @$send_at);

        }
        catch(Mandrill_Error $e)
        {
            // Mandrill errors are thrown as exceptions
            // echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
            // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
            // throw $e;
        }
    }
}
