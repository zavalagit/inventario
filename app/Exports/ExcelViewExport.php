<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExcelViewExport implements FromView
{
    public $view;
    public $data;
    public $data2;

    public function __construct($view, $data = "")
    {
        $this->view = $view;
        $this->data = $data;
        
    }

    public function view(): View
    {
        return view($this->view,[
            'data' => $this->data
            
        ]);
    }
}
