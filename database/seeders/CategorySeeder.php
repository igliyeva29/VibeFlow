<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objs = [
            [
                'name' => 'Cultural places',
                'name_tm' => 'Medeni ýerler',
                'name_ru' => 'Культурные места',
                'subcategories' => [
                    ['name' => "Historical landmarks", 'name_tm' => 'Taryhy ýerler', 'name_ru' => 'Исторические достопримечательности',],
                    ['name' => "Museums", 'name_tm' => 'Muzeýlar', 'name_ru' => 'Музеи',],
                    ['name' => "Theatres", 'name_tm' => 'Teatrlar', 'name_ru' => 'Театры',],
                    ['name' => "Cinemas", 'name_tm' => 'Kinoteatrlar', 'name_ru' => 'Кинотеатры',],
                    ['name' => "Libraries", 'name_tm' => 'Kitaphanalar', 'name_ru' => 'Библиотеки',],
                    ['name' => "Art galleries", 'name_tm' => 'Çeperçilik galereýalary', 'name_ru' => 'Художественные галереи',],
                    ['name' => "Parks", 'name_tm' => 'Seýilgähler', 'name_ru' => 'Парки',],
                ]
            ],
            [
                'name' => 'Cafes and Restaurants',
                'name_tm' => 'Kafelar we Retoranlar',
                'name_ru' => 'Кафе и Рестораны',
                'subcategories' => [
                    ['name' => "Coffee shops", 'name_tm' => 'Kofe dükanlary', 'name_ru' => 'Кофейни',],
                    ['name' => "Bakeries", 'name_tm' => 'Çörek önümleri', 'name_ru' => 'Пекарни',],
                    ['name' => "Tea houses", 'name_tm' => 'Çaýhanalar', 'name_ru' => 'Чайная',],
                    ['name' => "Patisseries", 'name_tm' => 'Süýjülik önümleri', 'name_ru' => 'Кондитерские',],
                    ['name' => "Restaurants", 'name_tm' => 'Toy mekanlar', 'name_ru' => 'Рестораны',],
                ]
            ],
            [
                'name' => 'Education',
                'name_tm' => 'Bilim',
                'name_ru' => 'Образование',
                'subcategories' => [
                    ['name' => "Universities", 'name_tm' => 'Ýokary okuw jaýlary', 'name_ru' => 'Университеты',],
                    ['name' => "Schools", 'name_tm' => 'Mekdepler', 'name_ru' => 'Школы',],
                    ['name' => "Educatoin centers", 'name_tm' => 'Bilim merkezleri', 'name_ru' => 'Образовательные центры',],
                    ['name' => "Workshops", 'name_tm' => 'Ussahanalar', 'name_ru' => 'Мастер классы',],
                ]
            ],
            [
                'name' => 'Hotels',
                'name_tm' => 'Myhmanhanalar',
                'name_ru' => 'Отели',
                'subcategories' => [
                     ['name' => "Resorts", 'name_tm' => 'Şypahanalar', 'name_ru' => 'Курорты',],
                     ['name' => "Motels", 'name_tm' => 'Motellar', 'name_ru' => 'Мотели',],
                     ['name' => "Hotels", 'name_tm' => 'Myhmanhanalar', 'name_ru' => 'Отели',],
                ]
            ],
            [
                'name' => 'Shopping',
                'name_tm' => 'Söwda',
                'name_ru' => 'Торговля',
                'subcategories' => [
                     ['name' => "Department stores", 'name_tm' => 'Söwda merkezleri', 'name_ru' => 'Универмаги',],
                     ['name' => "Supermarkets", 'name_tm' => 'Supermarketler', 'name_ru' => 'Супермаркеты',],
                     ['name' => "Boutiques", 'name_tm' => 'Butikler', 'name_ru' => 'Бутики',],
                     ['name' => "Malls", 'name_tm' => 'Mollar', 'name_ru' => 'Торговые центры',],
                ]
            ],
            [
                'name' => 'Health',
                'name_tm' => 'Saglyk',
                'name_ru' => 'Здоровье',
                'subcategories' => [
                     ['name' => "Hospitals", 'name_tm' => 'Hassahanalar', 'name_ru' => 'Больницы',],
                     ['name' => "Clinics", 'name_tm' => 'kliniklar', 'name_ru' => 'Клиники',],
                     ['name' => "Pharmacies", 'name_tm' => 'Dermanhanalar', 'name_ru' => 'Аптеки',],
                     ['name' => "Spa", 'name_tm' => 'Spa', 'name_ru' => 'Спа',],
                ]
            ],
            [
                'name' => 'Sport',
                'name_tm' => 'Sport',
                'name_ru' => 'Спорт',
                'subcategories' => [
                     ['name' => "Stadiums", 'name_tm' => 'Stadionlar', 'name_ru' => 'Стадионы',],
                     ['name' => "Fitness centers", 'name_tm' => 'Fitnes merkezleri', 'name_ru' => 'Фитнес центры',],
                     ['name' => "Swimming pools", 'name_tm' => 'Suw toplumlary', 'name_ru' => 'Бассейны',],
                ]
            ],
            [
                'name' => 'Airlines',
                'name_tm' => 'Howa ýollary',
                'name_ru' => 'Авиакомпании',
                'subcategories' => [
                     ['name' => "Passenger airlines", 'name_tm' => 'Ýolagçy awiakompaniýalary', 'name_ru' => 'Пассажирские авиакомпании',],
                     ['name' => "Cargo airlines", 'name_tm' => 'Airýük awiakompaniýalary', 'name_ru' => 'Грузовые авиакомпании',],
                ]
            ],
        ];

        foreach ($objs as $obj) {
            $category= Category::create([
                'name' => $obj['name'],
                'name_tm' => $obj['name_tm'],
                'name_ru' => $obj['name_ru'],
            ]);

            foreach ($obj['subcategories'] as $subcategories) {
                Category::create([
                    'parent_id' => $category->id,
                    'name' => $subcategories['name'],
                    'name_tm' => $subcategories['name_tm'],
                    'name_ru' => $subcategories['name_ru'],
                ]);
            }
        }
    }
}
