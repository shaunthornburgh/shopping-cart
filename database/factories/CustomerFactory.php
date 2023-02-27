<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $counties = [
            "Aberdeenshire",
            "Anglesey",
            "Angus (Forfarshire)",
            "Antrim",
            "Argyllshire",
            "Armagh",
            "Ayrshire",
            "Banffshire",
            "Bedfordshire",
            "Berkshire",
            "Berwickshire",
            "Breconshire",
            "Buckinghamshire",
            "Buteshire",
            "Caernarvonshire",
            "Caithness",
            "Cambridgeshire",
            "Cardiganshire",
            "Carmarthenshire",
            "Cheshire",
            "Clackmannanshire",
            "Cornwall",
            "Cumbria",
            "Denbighshire",
            "Derbyshire",
            "Derry / Londonderry",
            "Devon",
            "Dorset",
            "Down",
            "Dumfries-shire",
            "Dunbartonshire",
            "Durham",
            "East Lothian",
            "East Riding of Yorkshire",
            "East Sussex",
            "Essex",
            "Fermanagh",
            "Fife",
            "Flintshire",
            "Glamorgan",
            "Gloucestershire",
            "Greater London",
            "Greater Manchester",
            "Hampshire",
            "Herefordshire",
            "Hertfordshire",
            "Inverness-shire",
            "Kent",
            "Kincardineshire",
            "Kinross-shire",
            "Kirkcudbrightshire",
            "Lanarkshire",
            "Lancashire",
            "Leicestershire",
            "Lincolnshire",
            "Merionethshire",
            "Merseyside",
            "Midlothianv",
            "Monmouthshire",
            "Montgomeryshire",
            "Morayshire",
            "Nairnshire",
            "Norfolk",
            "North Yorkshire",
            "Northamptonshire",
            "Northumberland",
            "Nottinghamshire",
            "Orkney Islands",
            "Oxfordshire",
            "Peebles-shire",
            "Pembrokeshire",
            "Perthshire",
            "Radnorshire",
            "Renfrewshire",
            "Ross & Cromarty",
            "Roxburghshire",
            "Rutland",
            "Selkirkshire",
            "Shetland Islands",
            "Shropshire",
            "Somerset",
            "South Yorkshire",
            "Staffordshire",
            "Stirlingshire",
            "Suffolk",
            "Surrey",
            "Sutherland",
            "Tyne & Wear",
            "Tyrone",
            "Warwickshire",
            "West Lothian",
            "West Midlands",
            "West Sussex",
            "West Yorkshire",
            "Wigtownshire",
            "Wiltshire",
            "Worcestershire"
        ];

        return [
            'name' => fake()->company(),
            'address_line_1' => fake()->streetAddress,
            'town' => fake()->city,
            'county' => fake()->randomElement($counties),
            'postcode' => fake()->postcode,
            'country' => 'United Kingdom'
        ];
    }
}
