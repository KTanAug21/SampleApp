<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\OfferType;
use App\Models\PropertyType;
use App\Models\Amenity;


class FilterSection extends Component
{

    public $filters = [];

    public function mount()
    {
        $anyArray = ['id'=>0,'name'=>'Any'];
        $this->filters = [
                'offer_type'=>[
                    'value' => 0,
                    'label'=> 'OFFER TYPE',
                    'options'=> [ $anyArray ]+OfferType::all()->toArray()
                ],
                'property_type'=>[
                    'value' => 0,
                    'label'=>'PROPERTY TYPE',
                    'options'=>[ $anyArray ]+PropertyType::all()->toArray()
                ],
                'amenity'=>[
                    'value' => 0,
                    'label'=>'AMENITIES',
                    'options'=>[ $anyArray ]+Amenity::all()->toArray()
                ]
        ];
    }

    public function filterAmenity( $propertyTypeId )
    {
        $anyArray = ['id'=>0,'name'=>'Any'];
        $this->filters['amenity'] = [
            'value'=>0,
            'label'=>'AMENITIES',
            'options'=>[ $anyArray ]+Amenity::filterPropertyType( $propertyTypeId )
            ->get()->toArray()
        ];
    }

    public function render()
    {
        return view('livewire.filter-section');
    }
}
