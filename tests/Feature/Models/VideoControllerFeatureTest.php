<?php

namespace Tests\Feature\Models;

use App\Video;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VideoControllerFeatureTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $video = factory(Video::class)->create();
        //$user = factory(User::class)->create();
        //$this->actingAs($user);
        $response = $this->get(route('videos.index'));
        $response->assertStatus(200)
                ->assertSee('Listagem de videos')
                ->assertSee('ID')
                ->assertSee('Título');
        /** @var Collection $videos */
        $videos = $response->viewData('videos');
        $this->assertEquals([$video->toArray()], $videos->toArray());
    }

    public function testInvalidationData(){
        $response = $this->json('POST', route('videos.store'), []);
        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors(['title', 'file'])
            ->assertJsonFragment([
                \Lang::trans('validation.required', ['attribute' => 'title'])
            ])
            ->assertJsonFragment([
                \Lang::trans('validation.required', ['attribute' => 'file'])
            ]);

        $response = $this->post(route('videos.store'), []);
        $response->assertRedirect('/');
    }

    public function testStore(){
        \Storage::fake(); //Mocks - Duble de testes
        $file = UploadedFile::fake()->create('test.mp4');
        $response = $this->json('POST', route('videos.store'), [
            'title' => 'titulo',
            'file' => $file
        ]);

        $response->assertRedirect(route('videos.index'));

        $this->assertDatabaseHas('videos', [
            'title' => 'titulo',
            'file' => $file->hashName()
        ]);
        $id = Video::find(1)->id;
        \Storage::assertExists("$id/{$file->hashName()}");
    }


}
