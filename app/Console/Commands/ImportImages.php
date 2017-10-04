<?php

namespace App\Console\Commands;

use App\Gallery;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Console\Command;
use Faker;

class ImportImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Images and seed db with images';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        // 1. read image folder  /public/originalimages
        // 2. get list of all images
        // 3. copy image by image to folder /public/images (optimise)
        // 4. add image name by name to db:gallery column title with some random title

        // configure with favored image driver (gd by default)
        Image::configure(array('driver' => 'gd'));

        $pathFrom = public_path() . '/originalimages';

        $faker = Faker\Factory::create();

        foreach (glob("$pathFrom/*.*") as $pathFileName) {

            $pathFileNameArray = explode('/',$pathFileName);
            $path = public_path('images/' . end($pathFileNameArray));
            Image::make($pathFileName)->resize(800, 600)->save($path, 85);

            $gallery = new Gallery();
            $gallery->title = join(' ', $faker->words(3));
            $gallery->image = end($pathFileNameArray);
            $gallery->save();

        }

        echo "Import Images \n";
    }
}
