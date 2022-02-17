<?php

namespace App\DataFixtures;

use App\Module\Category\Entity\Category;

class CategoryFixture extends BaseFixture
{
    public function loadData()
    {
        $this->createMany(Category::class, 10, function(Category $balance) {
            $balance
                ->setName($this->faker->name)
            ;
        });

        $this->manager->flush();
    }
}
