<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Report;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;



class AcceptedReports extends Component
{
    
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $from_date = "";
    public $to_date = "";

    public $orderColumn = "report_id";
    public $sortOrder = "asc";

    public function updated(){
         $this->resetPage();
    }

    
    
    public function render()
    {

        $reports = Report::orderby($this->orderColumn,$this->sortOrder)->select('*')->where('status', '1');
        if(!empty($this->from_date) && !empty($this->to_date)){
             $reports->whereBetween('dateandTime', [$this->from_date, $this->to_date]);
        }
        $reports = $reports->paginate(7);

        return view('livewire.accepted-reports', ['reports' => $reports]);
    }


   
}
