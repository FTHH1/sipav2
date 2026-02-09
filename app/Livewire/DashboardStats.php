<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Alat;
use App\Models\User;
use App\Models\Peminjaman;

class DashboardStats extends Component
{
    public $totalAlat;
    public $totalUser;
    public $peminjamanAktif;
    public $pengembalianHariIni;

    public function mount()
    {
        $this->totalAlat = Alat::count();
        $this->totalUser = User::count();
        $this->peminjamanAktif = Peminjaman::where('status', 'aktif')->count();
        $this->pengembalianHariIni = Peminjaman::whereDate('tanggal_kembali', now())->count();
    }

    public function render()
    {
        return view('livewire.dashboard-stats');
    }
}
