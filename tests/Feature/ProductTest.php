<?php

namespace Tests\Feature;

use Database\Seeders\ProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test if index is redirecting to products page
     */
    public function test_redirect(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }
    /**
     * Test if products page is working
     */
    public function test_products_page_working(): void
    {
        $response = $this->get('/products');

        $response->assertStatus(200);
    }

    /**
     * Test if create product page is working
     */
    public function test_create_product_page_working(): void
    {
        $response = $this->get('/products/create');

        $response->assertStatus(200);
    }

    /**
     * Test if store product page is working
     */
    public function test_store_product_page_working(): void
    {
        $response = $this->post('/products', [
            'sku' => '1234567',
            'name' => 'Test Product',
            'group' => 'Test Group',
            'expiring_at' => '2025-03-25',
            'description' => 'Test Description',
        ]);

        $response->assertRedirect('/products');
    }

    /**
     * Test if show product page is working
     */
    public function test_show_product_page_working(): void
    {
        $product = \App\Models\Product::factory()->create();
        $response = $this->get('/products/' . $product->id);

        $response->assertStatus(200);
    }

    /**
     * Test if edit product page is working
     */
    public function test_edit_product_page_working(): void
    {
        $product = \App\Models\Product::factory()->create();
        $response = $this->get('/products/' . $product->id . '/edit');

        $response->assertStatus(200);
    }

    /**
     * Test if update product page is working
     */
    public function test_update_product_page_working(): void
    {
        $product = \App\Models\Product::factory()->create();
        $response = $this->put('/products/' . $product->id, [
            'sku' => '1234567',
            'name' => 'Test Product',
            'group' => 'Test Group',
            'expiring_at' => '2025-03-25',
            'description' => 'Test Description',
        ]);

        $response->assertRedirect('/products');
    }

    /**
     * Test if delete product page is working
     */
    public function test_delete_product_page_working(): void
    {
        $product = \App\Models\Product::factory()->create();
        $response = $this->delete('/products/' . $product->id);

        $response->assertRedirect('/products');
    }

    /**
     * Test if export product page is working
     */
    public function test_export_product_page_working(): void
    {
        $this->seed(ProductSeeder::class);
        $response = $this->get('/products?export=excel');

        $response->assertStatus(200);
    }

    /**
     * Test if export product page is working csv
     */
    public function test_export_product_page_working_csv(): void
    {
        $this->seed(ProductSeeder::class);
        $response = $this->get('/products?export=csv');

        $response->assertStatus(200);
    }

}
