<?php

namespace App\Http\Livewire;

use App\Models\Capkin;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Imports\CapkinImport as TheCapkinImport;

class CapkinImport extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    // public $tw1_capkin;
    // public $tw1_ra;
    // public $tw2_capkin;
    // public $tw2_ra;
    // public $tw3_capkin;
    // public $tw3_ra;
    // public $tw4_capkin;
    // public $tw4_ra;
    public $file;
    public $confirmingItemAdd = false;
    public $confirmingItemDeletion = false;

    public function render()
    {
        return view('livewire.capkin-import');
    }

    public function store() {
        $this->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        $fileName = time() . "_" . 'IMPORTED_EXCEL' . "." . $this->file->getClientOriginalExtension();

        Storage::putFileAs('public/fileimport/', $this->file, $fileName);

        Capkin::create([
            'file' => $fileName,
        ]);

        Excel::import(new TheCapkinImport, $this->file);
        
        $this->reset();

        $this->alert('success', 'Sukses!', [
            'position' => 'center',
            'timer' => 4750,
            'toast' => true,
            'text' => 'Import Berhasil!',
           ]);
    }

    public function confirmItemAdd() {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset();
        $this->confirmingItemAdd = true;
    }


}
