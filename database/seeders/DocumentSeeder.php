<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Document::create([
            'designation' => 'doc1',
            'description' => 'وثيقة1',
            'file'=>'doc1.pdf',
            'type' => 'pdf'
        ]);
        Document::create([
            'designation' => 'doc2',
            'description' => 'وثيقة2',
            'file'=>'doc2.png',
            'type' => 'image'
        ]);
    }
}