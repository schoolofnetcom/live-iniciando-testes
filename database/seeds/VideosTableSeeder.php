<?php

use App\Video;
use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \File::deleteDirectory(storage_path('app/public'), true);
        $self = $this;
        factory(Video::class, 50)
            ->create()
            ->each(function ($video) use ($self) {
                $file = $self->getVideoFile();
                \Storage::putFile($video->id, $file);
                $video->file = $file->hashName();
                $video->save();
            });
    }

    public function getVideoFile()
    {
        return new \Illuminate\Http\UploadedFile(
            storage_path('app/files/video_teste.mp4'),
            'video_teste.mp4'
        );
    }
}
