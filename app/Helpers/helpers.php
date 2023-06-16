<?php

namespace App\Helpers;

class Helpers
{
    static $icons = [
        'bedIcon',
        'wifiIcon',
        'carIcon',
        'snowIcon',
        'barbellIcon',
        'nosmokeIcon',
        'carIcon',
    ];
    static $facilities = [
        [
            'name' => 'Have High Rating',
            'number' => '01',
            'icon' => 'images/facilities1.svg'
        ],
        [
            'name' => 'Quiet Hours',
            'number' => '02',
            'icon' => 'images/facilities2.svg'
        ],
        [
            'name' => 'Best Locations',
            'number' => '03',
            'icon' => 'images/facilities3.svg'
        ],
        [
            'name' => 'Free Cancellation',
            'number' => '04',
            'icon' => 'images/facilities4.svg'
        ],
        [
            'name' => 'Payment Options',
            'number' => '05',
            'icon' => 'images/facilities5.svg'
        ],
        [
            'name' => 'Special Offers',
            'number' => '06',
            'icon' => 'images/facilities6.svg'
        ],
    ];
    static $menues = [
        [
            [
                'id' => 'menuOption1',
                'name' => 'Eggs & Bacon',
                'img' => 'images/foodsMenu/eggsBacon1.webp',
                'path' => 'eggsBacon'
            ],
            [
                'id' => 'menuOption2',
                'name' => 'Tea & Coffee',
                'img' => 'images/foodsMenu/teaCoffe1.webp',
                'path' => 'teaCoffe'
            ],
            [
                'id' => 'menuOption3',
                'name' => 'Chia Oatmeal',
                'img' => 'images/foodsMenu/chiaOat1.webp',
                'path' => 'chiaOat'
            ]
        ],
        [
            [
                'id' => 'menuOption4',
                'name' => 'Fruit Parfait',
                'img' => 'images/foodsMenu/fruit1.webp',
                'path' => 'fruit'
            ],
            [
                'id' => 'menuOption5',
                'name' => 'Marmalade Selection',
                'img' => 'images/foodsMenu/marmalade1.webp',
                'path' => 'marmalade'
            ],
            [
                'id' => 'menuOption6',
                'name' => 'Cheese Plate',
                'img' => 'images/foodsMenu/cheese1.webp',
                'path' => 'cheese'
            ]
        ],
        [
            [
                'id' => 'menuOption7',
                'name' => 'Coctail & Drink',
                'img' => 'images/foodsMenu/coctails1.webp',
                'path' => 'coctails'
            ],
            [
                'id' => 'menuOption8',
                'name' => 'Selected Wines',
                'img' => 'images/foodsMenu/wines1.webp',
                'path' => 'wines'
            ],
            [
                'id' => 'menuOption9',
                'name' => 'Alcohol Free Coctail',
                'img' => 'images/foodsMenu/alcoholFree1.webp',
                'path' => 'alcoholFree'
            ]
        ],
        [
            [
                'id' => 'menuOption10',
                'name' => 'Gourmet Brunch',
                'img' => 'images/foodsMenu/brunch1.webp',
                'path' => 'brunch'
            ],
            [
                'id' => 'menuOption11',
                'name' => 'Dessert & Cake',
                'img' => 'images/foodsMenu/dessert1.webp',
                'path' => 'dessert'
            ],
            [
                'id' => 'menuOption12',
                'name' => 'Chocolate Plate',
                'img' => 'images/foodsMenu/choco1.webp',
                'path' => 'choco'
            ]
        ],
        [
            [
                'id' => 'menuOption13',
                'name' => 'Plant Based Food',
                'img' => 'images/foodsMenu/plant1.webp',
                'path' => 'plant'
            ],
            [
                'id' => 'menuOption14',
                'name' => 'Gluten Free Options',
                'img' => 'images/foodsMenu/glutenFree1.webp',
                'path' => 'glutenFree'
            ],
            [
                'id' => 'menuOption15',
                'name' => 'Salad Bar',
                'img' => 'images/foodsMenu/salad1.webp',
                'path' => 'salad'
            ]
        ],
    ];
    static $counters = [
        [
            'img' => 'images/factPersonIcon.svg',
            'alt' => 'person icon',
            'counter' => '8000',
            'text' => 'Happy Users',
        ],
        [
            'img' => 'images/factStartIcon.svg',
            'alt' => 'stars icon',
            'counter' => '10M',
            'text' => 'Reviews & Appriciate',
        ],
        [
            'img' => 'images/factWorldIcon.svg',
            'alt' => 'world icon',
            'counter' => '100',
            'text' => 'Country Coverage',
        ]
    ];
    static $amenities = [
        'Air Conditioner' => "images/amenities/airCondIcon.svg",
        'High speed WiFi' => "images/amenities/wifiIcon.svg",
        'Breakfast' => "images/amenities/breakIcon.svg",
        'Kitchen' => "images/amenities/kitchenIcon.svg",
        'Cleaning' => "images/amenities/cleanIcon.svg",
        'Shower' => "images/amenities/showerIcon.svg",
        'Grocery' => "images/amenities/groscerIcon.svg",
        'Single Bed' => "images/amenities/bedIcon.svg",
        'Shop near' => "images/amenities/shopIcon.svg",
        'Towels' => "images/amenities/towelIcons.svg"
    ];
    static $bookingMessage  = [
        'success' => ['title' => "¡Thank you for your request!", 'content' => "We have received it correctly. Someone from our Team will get back to you very soon."],
        'notAvailable' => ['title' => "¡We are really sorry!", 'content' => "This room is already occupied. Try selecting another date or choosing another room."]
    ];
    static function text_limit($str, $limit, $endText)
    {
        if (strlen($str) > $limit) {
            return substr($str, 0, $limit) . $endText;
        }
        return $str;
    }
}
