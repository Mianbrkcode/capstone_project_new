<?php

namespace App\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Hotline;

class Contacts extends Component
{
    
    use WithPagination;
 
    protected $paginationTheme = 'bootstrap';
 
    public $hotlines_number, $userfrom, $responder_name, $responder_id, $hotlines_id;
    public $search = '';
 
  




    protected function rules()
    {
        return [
            'hotlines_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'userfrom' => 'required|string',
            // 'responder_name' => 'required|string',
            // 'responder_id' => 'required|integer',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
 
    public function saveContacts()
    {
       $this->validate();
        $userName = auth()->user()->responder_name;
        $userId =  auth()->user()->id; 

        Hotline::create([
            'hotlines_number' => $this->hotlines_number,
            'userfrom' => $this->userfrom,
            'responder_name' => $userName,
            'responder_id' => $userId
        ]);

        return redirect()->route('hotlines.index')->with('success', 'Contact Number Successfully Added');

        $this->resetInput();
        $this->dispatch('close-modal');
    }

    public function editContact(int $hotlines_id)
    {
        $contact = Hotline::find($hotlines_id);
        if($contact){
            $this->hotlines_number = $contact->hotlines_number;
            $this->userfrom = $contact->userfrom;
            $this->responder_name = $contact->responder_name;
            $this->responder_id = $contact->responder_id;
        }else{
            return redirect()->to('/admin/hotlines');
        }
    }

    public function updateContacts()
    {
        $validatedData = $this->validate();
 
        Hotline::where('hotlines_id',$this->hotlines_id)->update([
            'hotlines_number' => $validatedData['hotlines_number'],
            'userfrom' => $validatedData['userfrom'],
            'responder_name' => $validatedData['responder_name'],
            'responder_id' => $validatedData['responder_id'],
            
        ]);
        // session()->flash('success','Student Updated Successfully');
        return redirect()->route('hotlines.index')->with('success', 'Update Successful');
        $this->resetInput();
        $this->dispatch('close-modal');
    }
    
    
    public function deleteContact(int $hotlines_id)
    {
        $this->hotlines_id = $hotlines_id;
    }
 
    public function destroyContact()
    {
        Hotline::find($this->hotlines_id)->delete();
        // session()->flash('success','Student Deleted Successfully');
        return redirect()->route('hotlines.index')->with('success', 'Delete Successful');

        $this->dispatch('close-modal');
    }
 
    public function closeModal()
    {
        $this->resetInput();
    }
 
    public function resetInput()
    {
        $this->hotlines_number ='';
        $this->userfrom ='';
        $this->responder_name = '';
        $this->responder_id = '';
    }


    public function render()
    {
        $contacts = Hotline::where('hotlines_number', 'like', '%'.$this->search.'%')->orderBy('hotlines_id','DESC')->paginate(3);
        return view('livewire.contacts', ['contacts' => $contacts]);
    }
}

