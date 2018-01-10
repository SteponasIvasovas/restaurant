<?php
use Illuminate\Database\Seeder;
use App\Dish;
use App\Menu;
use Faker\Factory as Faker;
class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $dish;
    protected $faker;
    protected $menu;
    public function __construct(Dish $dish, Faker $faker, Menu $menu) {
        $this->dish = $dish;
        $this->faker = $faker;
        $this->menu = $menu;
    }
     public function run()
        {
          $faker = $this->faker->create();
          $menu_ids = $this->menu->pluck('id');
          
          foreach (range(1, 10) as $x) {
            $this->dish->create([
            'title' => $faker->name(),
            'photo' => $faker->imageUrl(300, 300, 'food'),
            'menu_id' => $menu_ids->random(),
            'description' =>$faker->sentence(200),
            'price'=> $faker->randomDigit(),
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
           ]);
          }
        }
}
