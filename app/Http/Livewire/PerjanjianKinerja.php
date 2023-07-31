<?php

namespace App\Http\Livewire;

use App\Models\PerjanjianKinerja as ModelsPerjanjianKinerja;
use App\Models\Pusat;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class PerjanjianKinerja extends Component
{
    use WithPagination;
    use WithFileUploads;
    use LivewireAlert;

    public $pk;
    public $pusat;
    public $tanggal;
    public $tahun;
    public $review;
    public $link;
    public $oldFile;
    public $q;
    public $sortBy = 'id';
    public $sortAsc = true;
    public $cdID;
    public $editMode;

    protected $queryString = [
        'q' => ['except' => ''],
        'sortBy' => ['except' => 'id'],
        'sortAsc' => ['except' => true]
    ];

    public $confirmingItemAdd = false;
    public $confirmingItemDeletion = false;

    public function render()
    {
        $perjanjianKinerjas = ModelsPerjanjianKinerja::with('pusat')->when($this->q, function($query){
            return $query->where(function($query){
                $query->where('tahun', 'like', '%'.$this->q.'%')
                        ->orWhereHas('pusat', function($query){
                            return $query->where('name', 'like', '%'.$this->q.'%');
                        });
            });
        })->orderBy($this->sortBy == 'name' ? Pusat::select('name')->whereColumn('pusats.id', 'perjanjian_kinerjas.pusat_id') : $this->sortBy, $this->sortAsc ? 'ASC' : 'DESC');

        $pusats = DB::table('pusats')->paginate(30);
        $query = $perjanjianKinerjas->toSql();
        $perjanjianKinerjas = $perjanjianKinerjas->paginate(10);
        return view('livewire.perjanjian-kinerja', [
            'perjanjianKinerjas' => $perjanjianKinerjas,
            'pusats' => $pusats,
            'query' => $query
        ]);
    }

    public function store() {
        $this->validate([
            'pusat' => 'required',
            'tanggal' => 'required|date',
            'tahun' => 'required|integer',
            'review' => 'required|integer',
            'link' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $fileName = 'PK' . time() . '_' . idate('d', strtotime($this->tanggal)) . idate('m', strtotime($this->tanggal)) . idate('Y', strtotime($this->tanggal)) . '_' . $this->pusat . $this->review . "." . $this->link->getClientOriginalExtension();

        Storage::putFileAs('public/filepk/', $this->link, $fileName);

        ModelsPerjanjianKinerja::create([
            'pusat_id' => $this->pusat,
            'tanggal' => $this->tanggal,
            'tahun' => $this->tahun,
            'review' => $this->review,
            'link' => $fileName,
        ]);

        $this->resetExcept(['q', 'sortBy', 'sortAsc']);

        $this->alert('success', 'Sukses!', [
            'position' => 'center',
            'timer' => 4750,
            'toast' => true,
            'text' => 'Data Berhasil ditambahkan!',
           ]);
    }

    public function confirmItemAdd() {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->resetExcept(['q', 'sortBy', 'sortAsc']);
        $this->confirmingItemAdd = true;
    }

    public function download($file){
        return response()->download(storage_path('app/public/filepk/'.$file));
     }

    public function confirmItemEdit(ModelsPerjanjianKinerja $pk) {
        $this->pk = $pk;
        $this->pusat = $this->pk->pusat_id;
        $this->tanggal = $this->pk->tanggal;
        $this->tahun = $this->pk->tahun;
        $this->review = $this->pk->review;
        $this->oldFile = $this->pk->link;
        $this->editMode = true;
        $this->confirmingItemAdd = true;

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function confirmItemDelete($id) {
        $this->cdID = $id;
        $this->confirmingItemDeletion = true;
    }

    public function deleteItem($id) {
        $this->pk = ModelsPerjanjianKinerja::find($id);
        $this->pk->delete();
        Storage::delete('public/filepk/'.$this->pk->link);
        $this->confirmingItemDeletion = false;
        
        $this->alert('warning', 'Data berhasil dihapus!', [
            'position' => 'center',
            'timer' => '4500',
            'toast' => true,
           ]);
    }

    public function saveItemEdit() {

        $newFile = $this->pk->link;

        if ($this->link) {

            $this->validate([
                'pusat' => 'required',
                'tanggal' => 'required|date',
                'tahun' => 'required|integer',
                'review' => 'required|integer',
                'link' => 'file|mimes:pdf,doc,docx'
            ]);

            $fileName = 'PK' . time() . '_' . idate('d', strtotime($this->tanggal)) . idate('m', strtotime($this->tanggal)) . idate('Y', strtotime($this->tanggal)) . '_' . $this->pusat . $this->review . "." . $this->link->getClientOriginalExtension();

            Storage::putFileAs('public/filepk/', $this->file, $fileName);
            Storage::delete('public/pk/'.$this->pk->file);


            $this->pk->update([
                'pusat_id' => $this->pusat,
                'tanggal' => $this->tanggal,
                'tahun' => $this->tahun,
                'review' => $this->review,
                'link' => $newFile,
            ]);
        } elseif (!$this->link) {
            $this->validate([
                'pusat' => 'required',
                'tanggal' => 'required|date',
                'tahun' => 'required|integer',
                'review' => 'required|min:1|max:4|integer',
            ]);

            $this->pk->update([
                'pusat_id' => $this->pusat,
                'tanggal' => $this->tanggal,
                'tahun' => $this->tahun,
                'review' => $this->review,
            ]);
        }
        $this->resetErrorBag();
        $this->resetValidation();
        $this->resetExcept(['q', 'sortBy', 'sortAsc']);

        $this->alert('success', 'Update Data Berhasil!', [
            'position' => 'center',
            'timer' => '4500',
            'toast' => true,
           ]);
    }
    
    public function sortBy($field) {
        if ($field == $this->sortBy) {
            $this->sortAsc = !$this->sortAsc;
        }
        $this->sortBy = $field;
    }
    
    public function updatingQ() {
        $this->resetPage();
    }
    
}
