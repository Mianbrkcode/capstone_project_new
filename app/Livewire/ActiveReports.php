<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Report;

class ActiveReports extends Component
{
    
    public $reports;


    public function mount()
    {
        // Fetch data from your model or any other source
        $this->reports = Report::where('status', '0')->get();
    }
    
    
    public function render()
    {
        return view('livewire.active-reports');
    }
}
