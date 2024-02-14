<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegalNoticeController extends Controller
{
    public function showLegalNoticeForm()
    {
        return view('legal-notice');
    }
}
