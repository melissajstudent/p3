<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoremIpsumController extends Controller
{

    /** Responds to requests to POST /text */
    public function postIndex(Request $request) { 
		$this->validate($request, [
            'numberParagraphs' => 'required|numeric'
            ]);

        $generator = new \Badcow\LoremIpsum\Generator();
        $paragraphs = $generator->getParagraphs(\Input::get("numberParagraphs"));;
        return view('text.index')->with("paragraphs", $paragraphs);

    }
}
