<?php

namespace Tests\Feature\public;

//use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Product;
use App\Trait\DefaultOperationsTest;
use Tests\ClientTest;

class ProductTest extends ClientTest
{
    use DefaultOperationsTest;

    public function testCorrectMethodIndex()
    {
        /** @var Product $product1 */
        /** @var Product $product2 */

        $product1 = Product::factory()->create();
        $product2 = Product::factory()->create();

        $this->user->products()->attach([$product1->id => ['price' => 111], $product2->id => ['price' => 222]]);

        $response = $this->get(route('products.index'));

        $this->statusShouldBeOk($response);
    }

    public function testCorrectMethodStore()
    {
        $params = Product::factory()->raw();
        $response = $this->post(route('admin.products-am.store'), $params);

        $this->statusShouldBeRedirect($response);
    }

    public function testCorrectRelations()
    {
        /** @var Product $product1 */
        /** @var Product $product2 */

        $product1 = Product::factory()->create();
        $product2 = Product::factory()->create();

        $this->user->products()->attach(
            [
                $product1->id => ['price' => 111],
                $product2->id => ['price' => 222]
            ]
        );
        $this->assertEquals(2, $this->user->products()->count());
        $this->assertEquals(222, $product2->getPrice());
    }

    public function testCorrectMethodEdit()
    {
        /** @var Product $product */
        $product = Product::factory()->create();

        $this->user->products()->attach([$product->id => ['price' => 111]]);

        $response = $this->get(route('products.edit', $product->id));

        $this->statusShouldBeOk($response);
    }

    public function testCorrectMethodUpdate()
    {
        /** @var Product $product */
        $product = Product::factory()->create();

        $this->user->products()->attach([$product->id => ['price' => 111]]);

        $response = $this->patch(route('products.update', $product->id),
            [
                'price' => 222
            ]
        );
        $this->assertEquals(222, $product->refresh()->getPrice());
        $this->statusShouldBeRedirect($response);
    }
}
