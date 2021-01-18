<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Card extends Controller
{

    public function __construct($suit,$value)
    {
        $this->value = $suit.'-'.$value;
    }

}
