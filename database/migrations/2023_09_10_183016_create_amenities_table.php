<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      
        Schema::create('amenities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('property_types');
            $table->timestamps();
        });

       $this->initialize();
    }

    function initialize()
    {
        $propertyTypes = ['apartment'=>1,'commercial'=>2,'condominium'=>3,'house'=>4];
        $list =  json_decode( file_get_contents('/home/kath/development/flyio/reviews/onehome_ph/test.json','r'), 1);

        $output = [];
        foreach( $list['amenities'] as $propertyType => $propertyItems ){
            $propertyTypeId = $propertyTypes[ $propertyType ];

            foreach( $propertyItems as $amenity ){
                $label = strtoupper($amenity['label']);
                if( !isset($output[ $label ]) )
                    $output[$label] = [];

                if(!in_array( $propertyTypeId, $output[$label] ) )
                    $output[$label][] = $propertyTypeId;
                
            }
                
        }

        foreach( $output as $name => $propertyTypes ){
            \App\Models\Amenity::create([
                'name'=>$name, 
                'property_types'=> implode( ',',$propertyTypes )
            ]);
        }
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amenities');
    }
};
