<?php

use Illuminate\View\Component;


class Modal extends Component
{

    public $var;
    public function __construct(
        public string $indentifier,
    ) {
      
    }


    public function render()
    {   
        return view('components.modals');
    }
    
    public function method()
    {
        
    }

} 