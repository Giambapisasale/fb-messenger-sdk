<?php

namespace App\Autobot;
use Tgallice\FBMessenger\Model\MessageResponse;

class CustomMessageResponse extends MessageResponse
{
    /**
     * @var string
     */
    private $attachmentId;

    /**
     * @param response $responseData
     */
    public function __construct($responseData)
    {
		parent::__construct($responseData['recipient_id'], $responseData['message_id']);
		if(isset($responseData['attachment_id']))
			$this->attachmentId = $responseData['attachment_id'];
    }
	
    public function serialize(){
    	$array = [];
    	$value = $this->getRecipientId();
    	if(!empty($value))
    		$array['recipient_id'] = $value;
    	
    	$value = $this->getMessageId();
    	if(!empty($value))
    		$array['message_id'] = $value;
    	
    	if(!empty($this->attachmentId))
    		$array['attachment_id'] = $this->attachmentId;
    	return $array;
    }
    /**
     * @return string
     */
    public function getAttachmentId()
    {
    	return $this->attachmentId;
    }
}
