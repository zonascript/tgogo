<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	
	function SearchFlight()
	{	
		$post = $this->input->post();
		$departure = $post['departure'];
		$destination = $post['destination'];
		$datedepart = $post['datedepart'];

		$roundtrip = $post['roundtrip'];
		
		if ($roundtrip == 0) {
			$datereturn = $datedepart;
		}else{
			$datereturn = $post['datereturn'];
		}
		$adult = $post['adult'];
		$child = $post['child'];
		$infant = $post['infant'];
		
		$token = $this->ApiTicketFlight->getToken()->token;

		$data['roundtrip'] = $roundtrip;
		$data['ListAirport'] = $this->ApiTicketFlight->ListAirport($token)['all_airport']['airport'];
		$data['result_search'] = $this->ApiTicketFlight->SearchFlight($token,$departure,$destination,$datedepart,$datereturn,$adult,$child,$infant,$roundtrip);
		$this->load->view('searchResult/flight/flight',$data);
	}
	
}
