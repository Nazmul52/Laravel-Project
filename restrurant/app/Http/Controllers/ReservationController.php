<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use validate;

class ReservationController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function reserve(Request $request) {

		// return $request->all();
		$this->validate($request, [
			'name' => 'required',
			'phone' => 'required',
			'email' => 'required|email',
			'message' => 'required',
			'dateandtime' => 'required',
		]);

		$reservation = new Reservation();

		$reservation->name = $request->name;
		$reservation->phone = $request->phone;
		$reservation->email = $request->email;
		$reservation->message = $request->message;
		$reservation->dateAndTime = $request->dateandtime;
		$reservation->status = false;

		$reservation->save();

		Toastr::success('Reservation request sent successfully. we will confirm to you shortly.', 'Success', ["positionClass" => "toast-top-right"]);

		return redirect()->back();
	}

	public function contact(Request $request) {

		// return $request->all();
		$this->validate($request, [
			'name' => 'required',
			'email' => 'required|email',
			'subject' => 'required',
			'message' => 'required',
		]);

		$contact = new Contact();

		$contact->name = $request->name;
		$contact->email = $request->email;
		$contact->message = $request->message;
		$contact->subject = $request->subject;

		$contact->save();

		Toastr::success('Your message request sent successfully. we will contact to you shortly.', 'Success', ["positionClass" => "toast-top-right"]);

		return redirect()->back();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Reservation  $reservation
	 * @return \Illuminate\Http\Response
	 */
	public function show(Reservation $reservation) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Reservation  $reservation
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Reservation $reservation) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Reservation  $reservation
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Reservation $reservation) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Reservation  $reservation
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Reservation $reservation) {
		//
	}
}
