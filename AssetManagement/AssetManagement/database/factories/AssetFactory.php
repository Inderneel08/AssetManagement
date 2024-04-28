<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asset>
 */
class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $posssibleAssetTypes=['Computer','Printer','VC Equipment'];

        $possibleAssetType=$this->faker->randomElement($posssibleAssetTypes);

        $possibleAssetCategory='';

        if($possibleAssetType=='Computer'){
            $possibleAssetCategory=$this->faker->randomElement(['Laptop','Desktop','All-In-One']);
        }
        elseif($possibleAssetType== 'Printer'){
            $possibleAssetCategory=$this->faker->randomElement(['Inkjet(BlackAndWhite)','Inkjet(Color)','Laser(BlackAndWhite)','Laser(Color)']);
        }
        elseif($possibleAssetType== 'VC Equipment'){
            $possibleAssetCategory='CODEC';
        }

        return [
            //
            'asset_id' => $this->faker->unique()->asciify('*************'),
            // 'memory' => null,
            'asset_type'=> $possibleAssetType,

            'asset_category' => $possibleAssetCategory,

            'os_type' => $this->faker->randomElement(['Windows','Maya']),

            'make' => $this->faker->randomElement(['Apple','HP','ACER']),

            // ''
        ];
    }
}
