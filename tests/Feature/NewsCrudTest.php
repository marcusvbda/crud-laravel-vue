<?php

namespace Tests\Feature;

use App\Models\NewModel;
use Illuminate\Http\Response;
use Tests\TestCase;

class NewsCrudTest extends TestCase
{
    public function testCreateNews(): void
    {
        $title =  $this->getRandomText(50, 100);
        $description =  $this->getRandomText(100, 150);
        $content =  $this->getRandomText(200, 500);

        $newsData = [
            'title' => $title->text,
            'description' => $description->text,
            'content' => $content->text
        ];

        $response = $this->post(route("news.store"), $newsData);
        $this->assertDatabaseHas('news', $newsData);
    }

    public function testReadNews()
    {
        $entity = NewModel::factory()->create();
        $response = $this->get("/news/{$entity->id}");
        $response->assertStatus(Response::HTTP_OK)
            ->assertJson($entity->toArray());
    }

    public function testUpdateNews()
    {
        $entity = NewModel::factory()->create();

        $newData = [
            'title' => 'Novo Título',
            'content' => 'Novo Conteúdo',
            'description' => 'Nova Descrição',
        ];

        $response = $this->put("/news/{$entity->id}", $newData);
        $response->assertStatus(Response::HTTP_OK);
        $this->assertDatabaseHas('news', $newData);
    }

    public function testNewsListingWithPaginationAndFilters()
    {
        $entities = NewModel::factory()->count(3)->create();
        $response = $this->get('/news?page=1&perPage=2');
        $response->assertStatus(Response::HTTP_OK);

        $newsList = $response->json();
        $ids = array_map(fn ($item) => $item['id'], data_get($newsList, 'data', []));
        $this->assertTrue(in_array($entities[0]->id, $ids));
        $this->assertTrue(in_array($entities[1]->id, $ids));
        $this->assertFalse(in_array($entities[2]->id, $ids));

        $response = $this->get('/news?page=2&perPage=2');
        $response->assertStatus(Response::HTTP_OK);
        $newsList = $response->json();
        $ids = array_map(fn ($item) => $item['id'], data_get($newsList, 'data', []));
        $this->assertFalse(in_array($entities[0]->id, $ids));
        $this->assertFalse(in_array($entities[1]->id, $ids));
        $this->assertTrue(in_array($entities[2]->id, $ids));

        $response = $this->get("/news?filter={$entities[0]->title}");
        $response->assertStatus(Response::HTTP_OK);
        $newsList = $response->json();
        $ids = array_map(fn ($item) => $item['id'], data_get($newsList, 'data', []));
        $this->assertTrue(in_array($entities[0]->id, $ids));
        $this->assertFalse(in_array($entities[1]->id, $ids));
    }

    public function testSoftDeleteNews()
    {
        $entity = NewModel::factory()->create();
        $response = $this->delete("/news/{$entity->id}");
        $response->assertStatus(Response::HTTP_NO_CONTENT);
        $this->assertSoftDeleted('news', ['id' => $entity->id]);
    }
}
