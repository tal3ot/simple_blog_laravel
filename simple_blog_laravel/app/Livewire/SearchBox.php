<?php

namespace App\Livewire;

use Livewire\Component;

class SearchBox extends Component
{
    public $search = '';
    /* as we don't use live search so we don't need hook
    //hooks to notify when somthing of updating or event happens on your components 
    //it'll executed after the name of the property updated so we use it to sent or dispatch an event
    public function updatedSearch() {  //name of the hook which is updated then name of the property which is Search
        $this->dispatch('search', search: $this->search); //'search' is the event, then the value of the search 
    } */
    //just a method not a hook
    public function updateSearch() {  
        $this->dispatch('search', search: $this->search);
    }
    public function render()
    {
        return view('livewire.search-box');
    }
}
