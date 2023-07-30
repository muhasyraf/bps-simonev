<?php

namespace App\Http\Livewire;

use App\Models\CapaianKinerja as ModelsCapaianKinerja;
use App\Models\Pusat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class CapaianKinerja extends Component
{
    use WithPagination;
    use WithFileUploads;
    use LivewireAlert;

    public $pusat;
    public $tanggal;
    public $tahun;
    public $triwulan;
    public $file;
    public $q;
    public $sortBy = 'id';
    public $sortAsc = true;
    public $cdID;

    protected $queryString = [
        'q' => ['except' => ''],
        'sortBy' => ['except' => 'id'],
        'sortAsc' => ['except' => true]
    ];

    public $confirmingItemAdd = false;
    public $confirmingItemDeletion = false;

    public function render()
    {
        $capkins = ModelsCapaianKinerja::with('pusat')->when($this->q, function($query){
            return $query->where(function($query){
                $query->where('tahun', 'like', '%'.$this->q.'%')
                        ->orWhereHas('pusat', function($query){
                            return $query->where('name', 'like', '%'.$this->q.'%');
                        });
            });
        })->orderBy($this->sortBy == 'name' ? Pusat::select('name')->whereColumn('pusats.id', 'capaian_kinerjas.pusat_id') : $this->sortBy, $this->sortAsc ? 'ASC' : 'DESC');

        $pusats = DB::table('pusats')->paginate(30);
        $query = $capkins->toSql();
        $capkins = $capkins->paginate(10);
        return view('livewire.capaian-kinerja', [
            'capkins' => $capkins,
            'pusats' => $pusats,
            'query' => $query
        ]);
    }

    public function store() {
        $this->validate([
            'pusat' => 'required',
            'tanggal' => 'required|date',
            'tahun' => 'required|integer',
            'triwulan' => 'required|min:1|max:4|integer',
            'file' => 'required|file|mimes:xlsx,xls',
        ]);

        $fileName = time() . '_' . idate('d', strtotime($this->tanggal)) . idate('m', strtotime($this->tanggal)) . idate('Y', strtotime($this->tanggal)) . '_' . $this->pusat . "." . $this->file->getClientOriginalExtension();

        Storage::putFileAs('public/filefra/', $this->file, $fileName);

        ModelsCapaianKinerja::create([
            'pusat_id' => $this->pusat,
            'tanggal' => $this->tanggal,
            'tahun' => $this->tahun,
            'triwulan' => $this->triwulan,
            'file' => $fileName,
        ]);

        $this->resetExcept(['q', 'sortBy', 'sortAsc']);

        $this->alert('success', 'Sukses!', [
            'position' => 'center',
            'timer' => 4750,
            'toast' => true,
            'text' => 'Data Berhasil ditambahkan!',
           ]);
    }

    public function download($file){
        return response()->download(storage_path('app/public/filefra/'.$file));
     }

    public function confirmItemAdd() {
        $this->confirmingItemAdd = true;
    }

    public function confirmItemDelete($id) {
        $this->cdID = $id;
        $this->confirmingItemDeletion = true;
    }

    public function deleteItem($id) {
        $capkin = ModelsCapaianKinerja::find($id);
        $capkin->delete();
        Storage::delete('public/filefra/'.$capkin->file);
        $this->confirmingItemDeletion = false;
        
        $this->alert('warning', 'Data berhasil dihapus!', [
            'position' => 'center',
            'timer' => '4500',
            'toast' => true,
           ]);
    }

    public function updatingQ() {
        $this->resetPage();
    }

    public function sortBy($field) {
        if ($field == $this->sortBy) {
            $this->sortAsc = !$this->sortAsc;
        }
        $this->sortBy = $field;
    }
}
