<?php

namespace Tests\Feature\admin;

//use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Product;
use App\Trait\DefaultOperationsTest;
use Tests\AdminTest;

class ProductAdminTest extends AdminTest
{
    use DefaultOperationsTest;

    public function testCorrectMethodIndex()
    {
        Product::factory()->create();
        Product::factory()->create();

        $response = $this->get(route('admin.products-am.index'));

        $this->statusShouldBeOk($response);
    }

    public function testCorrectMethodStore()
    {
        $params = Product::factory()->raw();
        $response = $this->post(route('admin.products-am.store'), $params);

        $this->statusShouldBeRedirect($response);
    }

    public function testCorrectMethodEdit()
    {
        /** @var Product $product */
        $product = Product::factory()->create();

        $response = $this->get(route('admin.products-am.edit', $product->id));

        $this->statusShouldBeOk($response);
    }

    /*   public function testCorrectMethodUpdate()
       {
           $product = Product::factory()->create();

           $response = $this->post(route('admin.products-am.update', $product->id), [
               'title' => 'test title'
           ]);
           $this->assertEquals('test title', $product->refresh()->title);
           $this->statusShouldBeRedirect($response);
       }
    */
}
