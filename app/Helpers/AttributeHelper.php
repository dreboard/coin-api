<?php


namespace App\Helpers;


class AttributeHelper
{

    /**
     * @var array[]
     */
    public array $bandTypes = ['Roosevelt Dime', 'Winged Liberty Dime'];



    /**
     * @var array[]
     */
    public array $fullTypes = [
        'Jefferson Nickel',
        'Standing Liberty',
        'Winged Liberty Dime',
        'Franklin Half Dollar',
        'Roosevelt Dime'
    ];


    /**
     * @var array[]
     */
    public array $snowTypes = ['Indian Head', 'Flying Eagle'];

    /**
     * @var array[]
     */
    public array $vamTypes = ['Morgan Dollar', 'Peace Dollar'];

    /**
     * Array of copper coins to add color attribute
     * @return array
     */
    static public function getColorCategories():array
    {
        return ['Small Cent', 'Large Cent', 'Half Cent'];
    }

    /**
     * @var array[]
     */
    public array $cameoTypes = [
        'Lincoln Wheat', 'Lincoln Memorial', 'Jefferson Nickel',
        'Winged Liberty Dime', 'Roosevelt Dime', 'Washington Quarter',
        'Walking Liberty', 'Kennedy Half Dollar', 'Franklin Half Dollar',
        'Susan B Anthony Dollar', 'Presidential Dollar', 'Sacagawea Dollar',
        'Eisenhower Dollar', 'Commemorative Half Dollar', 'Silver Dollar',
        'Tenth Ounce Gold', 'Quarter Ounce Gold', 'Half Ounce Gold',
        'One Ounce Gold', 'Tenth Ounce Buffalo', 'Quarter Ounce Buffalo',
        'Half Ounce Buffalo', 'One Ounce Buffalo', 'Tenth Ounce Platinum',
        'Quarter Ounce Platinum', 'Half Ounce Platinum', 'One Ounce Platinum'
    ];

    /**
     * @var array[]
     */
    public array $ultraCameoTypes = [
        'Lincoln Wheat', 'Lincoln Memorial', 'Jefferson Nickel',
        'Winged Liberty Dime', 'Roosevelt Dime', 'Washington Quarter',
        'Walking Liberty', 'Kennedy Half Dollar', 'Franklin Half Dollar',
        'Susan B Anthony Dollar', 'Presidential Dollar', 'Sacagawea Dollar',
        'Eisenhower Dollar', 'Commemorative Half Dollar', 'Silver Dollar',
        'Tenth Ounce Gold', 'Quarter Ounce Gold', 'Half Ounce Gold',
        'One Ounce Gold', 'Tenth Ounce Buffalo', 'Quarter Ounce Buffalo',
        'Half Ounce Buffalo', 'One Ounce Buffalo', 'Tenth Ounce Platinum',
        'Quarter Ounce Platinum', 'Half Ounce Platinum', 'One Ounce Platinum'
    ];

    /**
     * @var array[]
     */
    public array $deepCameoTypes = [
        'Lincoln Wheat', 'Lincoln Memorial', 'Jefferson Nickel', 'Winged Liberty Dime',
        'Roosevelt Dime', 'Washington Quarter', 'Walking Liberty',
        'Kennedy Half Dollar', 'Franklin Half Dollar', 'Susan B Anthony Dollar',
        'Presidential Dollar', 'Sacagawea Dollar', 'Eisenhower Dollar',
        'Commemorative Half Dollar', 'Silver Dollar', 'Tenth Ounce Gold',
        'Quarter Ounce Gold', 'Half Ounce Gold', 'One Ounce Gold',
        'Tenth Ounce Buffalo', 'Quarter Ounce Buffalo', 'Half Ounce Buffalo',
        'One Ounce Buffalo', 'Tenth Ounce Platinum', 'Quarter Ounce Platinum',
        'Half Ounce Platinum', 'One Ounce Platinum'
    ];

}
