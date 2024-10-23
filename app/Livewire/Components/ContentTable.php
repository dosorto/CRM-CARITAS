<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class ContentTable extends Component
{
    use WithPagination;

    protected $pagination = 30;

    public $colNames;
    public $keys;
    public $itemClass;
    public $textToFind = '';
    public $colSelected;

    public function mount($colNames, $keys, $itemClass)
    {
        $this->colNames = $colNames;
        $this->keys = $keys;
        $this->itemClass = $itemClass;
        $this->colSelected = array_key_first($colNames);
    }

    public function filterData()
    {
        
        return $this->textToFind === '' ?
            $this->itemClass::paginate($this->pagination)
            :
            $this->itemClass::where($this->colSelected, 'LIKE', '%' . $this->textToFind . '%')->paginate($this->pagination);
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

    #[On('pais-created')]
    public function paisCreated(){}
}
