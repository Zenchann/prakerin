<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Siswa;
use Faker\Factory as Faker;
use App\Kategori;
use App\Tag;
use App\Artikel;
// use DB;

class ExSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artikels')->delete();
        DB::table('users')->delete();
        DB::table('kategoris')->delete();
        DB::table('siswas')->delete();
        DB::table('tags')->delete();
        DB::table('artikel_tag')->delete();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('rahasia')
        ]);

        $faker = Faker::create('id_ID');
        for ($i = 0; $i < 50; $i++) {
            $gender = $faker->randomElement(['male', 'female']);
            $siswa = new Siswa;
            $siswa->nama = $faker->name($gender);
            $siswa->nis = $faker->nik;   //$faker->numberBetween($min = 10000, $max = 90000);
            if ($gender === "male") {
                $gender = "Laki-laki";
            } elseif ($gender == "female") {
                $gender = "Perempuan";
            }
            $siswa->jenis_kelamin = $gender;
            $siswa->alamat = $faker->address;
            $siswa->tgl_lahir = $faker->date;
            $siswa->save();
        }
        for ($i = 0; $i < 50; $i++) {
            $kategori = new Kategori();
            $kategori->nama_kategori = $faker->word;
            $kategori->slug = $faker->slug;
            $kategori->save();
        }

        for ($i = 0; $i < 50; $i++) {
            $tag = new Tag();
            $tag->nama_tag = $faker->word;
            $tag->slug = $faker->slug;
            $tag->save();
        }

        for ($i = 0; $i < 5; $i++) {
            $artikel = new Artikel();
            $artikel->judul = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $artikel->slug = $faker->slug;
            $artikel->deskripsi = $faker->text;
            $artikel->foto = $faker->imageUrl($width = 640, $height = 480);
            $artikel->kategori_id = $faker->numberBetween($min = 1, $max = 5);
            $artikel->user_id = 1;
            $artikel->save();
            $artikel->tag()->attach($faker->numberBetween($min = 1, $max = 5));
        }
    }
}
