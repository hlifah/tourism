<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttractionController extends Controller
{
    // List all attractions
    public function index()
    {
        $attractions = $this->getAttractions();

        return view('attractions.index', compact('attractions'));
    }

    // Show details for a specific attraction
    public function show($name)
    {
        $attractions = $this->getAttractions();

        $attraction = collect($attractions)->firstWhere('slug', $name);

        if (!$attraction) {
            abort(404);
        }

        return view('attractions.show', ['attraction' => $attraction]);
    }

    // Shared data for all attractions
    private function getAttractions()
    {
        return [
            [
                'name' => 'Mount Kilimanjaro',
                'slug' => 'kilimanjaro',
                'region' => 'Kilimanjaro Region',
                'description' => 'Climb Africa’s tallest peak for an unforgettable adventure.',
                'full_description' => 'Mount Kilimanjaro is the highest mountain in Africa. It attracts adventurers and nature lovers from all over the world for its breathtaking hikes and glacial views.',
                'image' => 'peak.jpg',
                'gallery' => ['peak.jpg', 'trail.jpg', 'view.jpg']
            ],
            [
                'name' => 'Serengeti National Park',
                'slug' => 'serengeti',
                'region' => 'Simiyu & Mara Region',
                'description' => 'Home to the Great Migration and rich savannah wildlife.',
                'full_description' => 'The Serengeti offers one of the most dramatic safari experiences with the Great Migration, endless plains, and abundant wildlife.',
                'image' => 'lions.webp',
                'gallery' => ['lions.webp', 'migration.jpg', 'plains.jpg']
            ],
            [
                'name' => 'Stone Town',
                'slug' => 'stone-town',
                'region' => 'Zanzibar (Unguja South)',
                'description' => 'UNESCO Heritage Site known for Swahili-Arab architecture.',
                'full_description' => 'Stone Town is a historic trading hub full of culture, winding alleys, spice markets, and ancient architecture.',
                'image' => 'doors.jpg',
                'gallery' => ['doors.jpg', 'market.jpg', 'fort.jpg']
            ],
            [
                'name' => 'Ngorongoro Crater',
                'slug' => 'ngorongoro',
                'region' => 'Arusha Region',
                'description' => 'A vast volcanic caldera full of wildlife.',
                'full_description' => 'Ngorongoro Crater is a wildlife paradise set within a collapsed volcano, home to rhinos, lions, elephants, and flamingos.',
                'image' => 'crater.jpg',
                'gallery' => ['crater.jpg', 'rhino.jpg', 'safari.jpg']
            ],
            [
                'name' => 'Ruaha National Park',
                'slug' => 'ruaha',
                'region' => 'Iringa Region',
                'description' => 'Remote and rugged with vast elephant herds.',
                'full_description' => 'Ruaha offers an off-the-beaten-path safari with baobab-studded landscapes and abundant elephants.',
                'image' => 'elephants.jpg',
                'gallery' => ['elephants.jpg', 'baobab.jpg', 'lions.jpg']
            ],
            [
                'name' => 'Lake Victoria',
                'slug' => 'lake-victoria',
                'region' => 'Mwanza Region',
                'description' => 'Africa’s largest lake with stunning island escapes.',
                'full_description' => 'Lake Victoria offers scenic beauty, local fishing villages, and unique rock formations like Bismarck Rock.',
                'image' => 'rock.jpg',
                'gallery' => ['rock.jpg', 'boat.jpg', 'sunset.jpg']
            ],
            [
                'name' => 'Selous Game Reserve',
                'slug' => 'selous',
                'region' => 'Morogoro Region',
                'description' => 'Wild and remote safaris with rivers and wetlands.',
                'full_description' => 'Selous, now part of Nyerere National Park, is a wild expanse known for boat safaris and untamed beauty.',
                'image' => 'river.jpg',
                'gallery' => ['river.jpg', 'hippos.jpg', 'wild.jpg']
            ],
            [
                'name' => 'Mikumi National Park',
                'slug' => 'mikumi',
                'region' => 'Morogoro Region',
                'description' => 'Easily accessible and full of plains wildlife.',
                'full_description' => 'Mikumi is a mini-Serengeti with great chances to see lions, giraffes, and elephants close to Dar es Salaam.',
                'image' => 'giraffe.jpg',
                'gallery' => ['giraffe.jpg', 'plains.jpg', 'elephants.jpg']
            ],
            [
                'name' => 'Matema Beach',
                'slug' => 'matema',
                'region' => 'Mbeya Region',
                'description' => 'Tranquil beach at Lake Nyasa’s northern tip.',
                'full_description' => 'Matema Beach is perfect for peaceful getaways with scenic mountain-lake views and cultural encounters.',
                'image' => 'lake.jpg',
                'gallery' => ['lake.jpg', 'beach.jpg', 'canoe.jpg']
            ],
            [
                'name' => 'Kondoa Rock Art',
                'slug' => 'kondoa',
                'region' => 'Dodoma Region',
                'description' => 'Ancient rock art in dramatic cliff settings.',
                'full_description' => 'The Kondoa Rock-Art Sites are a UNESCO World Heritage treasure showcasing prehistoric paintings and cultural legacy.',
                'image' => 'rockart1.jpg',
                'gallery' => ['rockart1.jpg', 'rockart2.jpg', 'cliff.jpg']
            ]
        ];
    }
}
