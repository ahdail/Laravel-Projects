<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TestController extends Controller
{
    public function index($nome)
    {

        return view('test.index', ['nome' => $nome]);
        //or
        //return view('test/index');
    }

    public function notas()
    {
        $notas = [
            0 => 'Nota 1',
            1 => 'Nota 2',
            2 => 'Nota 3',
            3 => 'Nota 4',
            4 => 'Nota 5'
        ];

        //return view('test.notas', ['notas' => $notas]);
        return view('test.notas', compact ('notas'));
    }

}
