<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class ContentTable extends Component
{
    use WithPagination;

    protected $items;

    protected $pagination = 30;

    public $colNames;
    public $keys;
    public $itemClass;
    public $textToFind = '';

    // protected $items;

    public function mount($colNames, $keys, $itemClass)
    {
        $this->colNames = $colNames;
        $this->keys = $keys;
        $this->itemClass = $itemClass;

        $this->items = $this->itemClass::paginate($this->pagination);
    }

    public function render()
    {
        return view('livewire.components.content-table')
            ->with('colNames', $this->colNames)
            ->with('keys', $this->keys)
            ->with('items', $this->items);
    }


    #[On('search-text-changed')]
    public function search($textToFind, $colSelected)
    {
        $this->resetPage();
        $this->items = $this->itemClass::where($colSelected, 'LIKE', '%' . $textToFind . '%')->paginate($this->pagination);
    }
}
