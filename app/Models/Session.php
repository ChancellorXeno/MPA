<?php

namespace App\Models;

use Session;

Class Session
{
    public function deleteSession(){
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}