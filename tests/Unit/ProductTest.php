<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * Create a product test.
     *
     * @return void
     */
    public function testCreateProduct()
    {
        Storage::fake('images');
        $file = UploadedFile::fake()->image('avatar.jpg');
        $response = $this->json('POST', '/product/store', [
            'name' => 'apple',
            'price' => '200.00',
            'description' => 'this is an apple, this is an apple, this is an apple',
            'image' => $file,
        ]);

        $uri = '/products';
        $response->assertRedirect($uri);
        $response->assertStatus(302);
    }

    /**
     * Get product list.
     *
     * @return void
     */
    public function testGetProductList()
    {
        $response = $this->get('/');
        $response->assertSee('apple');
        $response->assertStatus(200);
    }

    /**
     * Update a product test.
     *
     * @return void
     */
    public function testUpdateProduct()
    {
        Storage::fake('images');
        $file = UploadedFile::fake()->image('avatar.jpg');
        $response = $this->json('POST', '/products/update/1', [
            'name' => 'apple',
            'price' => '899900.00',
            'description' => 'this is an apple, this is an apple, this is an apple',
            'image' => $file,
        ]);

        $response = $this->get('/products/show/1');
        $response->assertSee('this is an apple, this is an apple, this is an apple');
        $response->assertStatus(200);
    }

    /**
     * Delete a product test.
     *
     * @return void
     */
    public function testDeleteProduct()
    {
        $response = $this->json('POST', '/products/1', []);
        $response = $this->get('/products/show/1');
        $response->assertStatus(404);
    }
}
