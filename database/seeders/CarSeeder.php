<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create('id_ID');
        $nama=array('Avanza','Innova','Alphard','Camry','Supra',"Pullman","Phantom","Victor","GR Yaris","WRX STI");
        $mesin=array(1300,2400,2400,3500,3000,6000,6750,7000,1500,2000);
        $harga=array(350000,400000,450000,500000,600000,1500000,9000000,12000000,400000,500000);
        $jumlah=array(10,8,6,5,3,2,2,1,4,3);
        $foto=array("https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.autofreaks.com%2Fwp-content%2Fuploads%2F2015%2F10%2FExteriorDI-L_DI-5_1-110915.jpg&f=1&nofb=1","https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fimages.summitmedia-digital.com%2Ftopgear%2Fimages%2F2020%2F10%2F16%2Ftoyota-innova-1-1602823603.jpg&f=1&nofb=1","https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcontent.icarcdn.com%2Fstyles%2Farticle_cover%2Fs3%2Ffield%2Farticle%2Fcover%2F2020%2Ftoyota-alphard-mpv-sultan-yang-tak-punya-lawan-lead.jpg%3Fitok%3DGf7l3xQ4&f=1&nofb=1","https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.ihwanburhan.com%2Fwp-content%2Fuploads%2F2020%2F07%2F2021-Toyota-Camry-Exterior.jpg&f=1&nofb=1","https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwallpapercave.com%2Fwp%2Fwp9086318.jpg&f=1&nofb=1","https://cdn0-production-images-kly.akamaized.net/cHYDEpLbIhpfLCemoVKJUq7mjZg=/640x360/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/1352395/original/037367700_1474509139-mercedes-maybach-s600-pullman-guard.jpg","https://cloud.jpnn.com/photo/arsip/normal/2022/05/14/rolls-royce-phantom-series-ii-foto-rolls-royce-oe8ej-ikan.jpg","https://carro.id/blog/wp-content/uploads/2020/09/aston-martin-victor-front-3-4_800x.jpg","https://asset.kompas.com/crops/FvcSXc6ZMFc_hWeNI625UJWIWAs=/196x174:1732x1198/750x500/data/photo/2020/01/11/5e18c2d7e2b6f.jpg","https://images.carbay.com/subaru/wrx-sti/exterior/500x208/t/subaru-wrx-sti-front-angle-low-view.jpg");
        for($i=0;$i<10;$i++){
            DB::table('cars')->insert([
//                'nama'=>$faker->name(),
//                'mesin'=>$faker->numberBetween(1299,4001),
//                'foto'=>$faker->url(),
//                'harga'=>$faker->numberBetween(49999,200001),
//                'jumlah'=>$faker->numberBetween(4,16),
                'nama'=>$nama[$i],
                'mesin'=>$mesin[$i],
                'foto'=>$foto[$i],
                'harga'=>$harga[$i],
                'jumlah'=>$jumlah[$i],
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ]);
        }
    }
}
