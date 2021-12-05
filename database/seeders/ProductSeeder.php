<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Acer Aspire',
            'description' => 'Acer Aspire comes with various high-level specs, such as: 6GB RAM, 1TB HDD, 8X DVD, 8th Gen Intel Core i3-8130U processor 2.2GHz with Turbo Boost Technology up to 3.4 GHz, Windows 10 Home, 15.6" Full HD (1920 x 1080) widescreen LED-backlit display, Intel UHD Graphics 620, 6GB Dual Channel Memory, 1TB 5400RPM SATA Hard Drive, 8X DVD Double-Layer Drive RW (M-DISC enabled), Secure Digital (SD) card reader, Acer True Harmony, Two Built-in Stereo Speakers, 802.11ac Wi-Fi featuring MU-MIMO technology (Dual-Band 2.4GHz and 5GHz), Bluetooth 4.1, HD Webcam (1280 x 720) supporting High Dynamic Range (HDR), 1 - USB 3.1 Type C Gen 1 port (up to 5 Gbps), 2 - USB 3.0 ports (one with power-off charging), 1 - USB 2.0 port, 1 - HDMI Port with HDCP support, 6-cell Li-Ion Battery (2800 mAh), Up to 13.5-hours Battery Life, 5.27 lbs. | 2.39 kg (system unit only) (NX.GRYAA.001). Processor Core - Dual-core.',
            'price' => 27720000,
            'category_id' => 1,
            'image' => 'images/acer-laptop.png'
        ]);
        Product::create([
            'name' => 'Vegana',
            'description' => 'Vegana sent this',
            'price' => 42000,
            'category_id' => 2,
            'image' => ' '
        ]);
        Product::create([
            'name' => 'Razor PC',
            'description' => 'RAZORRRRRR',
            'price' => 5000000,
            'category_id' => 3,
            'image' => ' '
        ]);
    }
}
