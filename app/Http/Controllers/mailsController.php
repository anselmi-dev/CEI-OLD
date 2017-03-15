<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\correoNotificacion as Notificacion;
use Response;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Http\Controllers\AppBaseController;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class mailsController extends Controller
{

    public function index(Request $request)
    {	
	    	$toEmails = $request->all();
        if ( array_key_exists('ids', $toEmails) ) {
        	$toEmails = $request->all()['ids'];
	    	foreach ($toEmails as $email) {
	       		\Mail::to('carlosanselmi2@gmail.com')
					->cc(\App\Models\estudiante::find($email)->email)
					->send(new Notificacion());
	    	}
            Flash::success('Correos enviados.');
    	}else
			Flash::error('No selecciono un estudiante.');
		return redirect(route('estudiantes.index'));
    }

}
