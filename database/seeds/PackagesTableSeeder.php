ds<?php

use Illuminate\Database\Seeder;
use App\Package;
use App\Category;
use App\PackageImage;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        factory(Category::class, 5)->create();
        factory(Package::class, 100)->create();
        factory(PackageImage::class, 200)->create();*/

        $categories = factory(Category::class, 4) -> create();
        $categories->each(function ($category) {
            $packages = factory(Package::class, 5) -> make();
            $category -> packages()->saveMany($packages);

            $packages->each(function ($p){
                $images = factory(PackageImage::class,3)->make();
                $p->images()->saveMany($images);
            });
        });

        /*$users=factory(App\User::class,3)
            ->create()
            ->each(function ($u){
                $u->posts()->save(factory(App\Post::class)->make());
            });*/
    }
}
