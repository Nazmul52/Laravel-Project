<?php

namespace App\Http\Controllers\Admin;
use App\Contact;
use App\Http\Controllers\Controller;
use App\Notifications\ReservationConfirmed;
use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class AdminReservationController extends Controller {

	public function index() {
		$reservations = Reservation::all();
		return view('admin.reservation.index', compact('reservations'));
	}

	public function status(Request $request, $id) {
		$reserve = Reservation::find($id);
		$reserve->status = true;
		$reserve->save();
		Notification::route('mail', $reserve->email)->notify(new ReservationConfirmed());

		Toastr::success('Reservation  successfully confirmed.', 'Success', ["positionClass" => "toast-top-right"]);

		return redirect()->back();

	}

	public function destroy($id) {
		$reservation = Reservation::find($id);

		$reservation->delete();
		Toastr::success('Reservation deleted successfully.', 'Success', ["positionClass" => "toast-top-right"]);

		return redirect()->back();
	}

	public function contactIndex() {
		$contacts = Contact::all();
		return view('admin.contact.index', compact('contacts'));
	}

	public function contactDestroy($id) {
		$contact = Contact::find($id);

		$contact->delete();
		Toastr::success('Contact Information deleted successfully.', 'Success', ["positionClass" => "toast-top-right"]);

		return redirect()->back();
	}

}
