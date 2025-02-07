<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\tugas;

class Tambahtugass extends Component
{
    public $nama;
    public $hari;
    public $statusnya;
    public $bukaform = false;
    public $bukaupdate = false;
    public $selected;

    public function buka(){
        $this->bukaform = true;
    }

    public function tutup(){
        $this->bukaform = false;
    }

    protected $rules = [
        'nama' => 'required|min:3|max:255',
        'statusnya' => 'required|in:selesai,belum selesai',
        'hari' => 'required|min:3|max:255',
    ];

    protected $messages = [
        'nama.required' => 'Nama tugas wajib diisi.',
        'statusnya.required' => 'Status wajib dipilih.',
        'statusnya.in' => 'Status yang dipilih tidak valid.',
    ];

    public function openedit($id){
        $this->selected = $id;
        $this->bukaupdate = true;
    }

    public function closeedit(){
        $this->bukaupdate = false;
        $this->selected = null;
    }


    public function simpan(){
        $this->validate();
        $simpan = new tugas();
        $simpan->namatugas = $this->nama;
        $simpan->harinya = $this->hari;
        $simpan->status = $this->statusnya;
        $simpan->save();
        $this->reset(['nama', 'statusnya','hari', 'bukaform']);
        $this->render();
    }

    public function hapus($id){
        tugas::destroy($id);
    }

    public function update($id){

        $tugas = Tugas::find($id);
        if ($tugas) {
            $tugas->status = $this->statusnya;
            $tugas->save();
        }
        $this->closeedit();
    }
    public function render()
    {
        $tugas = tugas::all();
        return view('livewire.tambahtugass', compact('tugas'));
    }
}
