<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class MessageUserList extends Component
{
    public $keyword;
    public function render()
    {
        if ($this->keyword != null) {
            $users = User::where('id', '!=', Auth::id())
                ->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->keyword . '%')
                        ->orWhere('username', 'like', '%' . $this->keyword . '%');
                })
                ->limit(8) // Pastikan limit dipanggil sebelum get()
                ->get();
        } else {
            $users = User::where('id', '!=', Auth::id())->get();
        }
        return view('livewire.message-user-list', compact('users'));
    }
}
