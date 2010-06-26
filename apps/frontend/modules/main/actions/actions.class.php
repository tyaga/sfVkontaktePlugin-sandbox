<?php
class mainActions extends sfVkontakteActions {

	public function executeIndex(sfWebRequest $request) {
		
	}

	public function executeNotification(sfWebRequest $request) {
		return $this->returnJSON (
			$this->getUser()->sendNotification(
				array(
					'uids' => $this->getUser()->id,
					'message'=>$request->getParameter('message', 'It works!')
				)
			)
		);
	}
}
