<?php

class EnquiryQuotesWidget extends CWidget
{
    public $title = 'Simple Quote Form';
    public $visible = true;

    public $enquiry = null;
    public $supplier = null;
    public $type = '';

    public function init()
    {

    }

    public function run()
    {
        $this->renderContent();
    }

    protected function renderContent()
    {
        if (!is_null($this->enquiry))
            $quotes = $this->enquiry->getQuotes($this->type);
        else
            $quotes = $this->supplier->getQuotes();

		$model = new DBCategory();
        $this->render('EnquiryQuotesWidget' . $this->type, array(
            'quotes' => $quotes,
            'enquiry' => $this->enquiry,
            'supplier' => $this->supplier,
		));
    }
}