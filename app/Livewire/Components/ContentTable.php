<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Livewire\WithoutUrlPagination;

class ContentTable extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $colNames;
    public $keys;
    public $paginationSize;
    public $itemClass;
    public $actions = [];

    public $textToFind = '';
    public $colSelected;
    public $tableSize = 'md';
    public $textSize = 'base';


    public function filterData()
    {
        return $this->textToFind === '' ?
            $this->itemClass::paginate($this->paginationSize)
            :
            $this->itemClass::where($this->colSelected, 'LIKE', '%' . $this->textToFind . '%')->paginate($this->paginationSize);
    }

    public function mount($colNames, $keys, $paginationSize = 15, $itemClass, $actions, $tableSize = '', $textSize = 'base')
    {
        $this->colNames = $colNames;
        $this->keys = $keys;
        $this->paginationSize = $paginationSize;
        $this->itemClass = $itemClass;
        $this->actions = $actions;
        $this->tableSize = $tableSize;
        $this->textSize = $textSize;
        

        $this->colSelected = array_key_first($colNames);
    }

    public function render()
    {
        $items = $this->filterData();
        return view('livewire.components.content-table')
            ->with('colNames', $this->colNames)
            ->with('keys', $this->keys)
            ->with('items', $items)
            ->with('actions', $this->actions);
    }


    #[On('search-text-changed')]
    public function search($textToFind, $colSelected)
    {
        $this->resetPage();
        $this->textToFind = $textToFind;
        $this->colSelected = $colSelected;
    }

    #[On('item-created')]
    public function itemCreated() {}
    #[On('item-edited')]
    public function itemEdited() {}
    #[On('item-deleted')]
    public function itemDeleted() {}
}
