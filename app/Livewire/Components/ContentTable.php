<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class ContentTable extends Component
{
    use WithPagination;

    protected $paginationSize;

    public $colNames;
    public $keys;
    public $itemClass;
    public $textToFind = '';
    public $colSelected;

    public $actions = [];

    public function mount($colNames, $keys, $itemClass, $paginationSize, $actions = [0])
    {
        $this->colNames = $colNames;
        $this->keys = $keys;
        $this->itemClass = $itemClass;
        $this->colSelected = array_key_first($colNames);
        $this->paginationSize = $paginationSize;
        $this->actions = $actions;
    }

    public function filterData()
    {
        
        return $this->textToFind === '' ?
            $this->itemClass::paginate($this->paginationSize)
            :
            $this->itemClass::where($this->colSelected, 'LIKE', '%' . $this->textToFind . '%')->paginate($this->paginationSize);
    }

    public function render()
    {
        $items = $this->filterData();
        return view('livewire.components.content-table')
            ->with('colNames', $this->colNames)
            ->with('keys', $this->keys)
            ->with('items', $items);
    }


    #[On('search-text-changed')]
    public function search($textToFind, $colSelected)
    {
        $this->resetPage();
        $this->textToFind = $textToFind;
        $this->colSelected = $colSelected;
    }

    #[On('item-created')]
    public function itemCreated(){}
}
