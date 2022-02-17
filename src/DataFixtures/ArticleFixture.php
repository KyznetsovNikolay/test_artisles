<?php

namespace App\DataFixtures;

use App\Module\Article\Entity\Article;
use App\Module\Category\Entity\Category;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ArticleFixture extends BaseFixture implements DependentFixtureInterface
{

    public function loadData()
    {
        $this->createMany(Article::class, 100, function(Article $balance) {
            $balance
                ->setTitle($this->faker->name)
                ->setDescription($this->faker->paragraph)
                ->setImage(sprintf('images/%s', $this->faker->randomElement($this->getImageUrls())))
                ->setCategory($this->getRandomReference(Category::class))
            ;
        });

        $this->manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixture::class,
        ];
    }

    private function getImageUrls(): array
    {
        return [
            'image_1.jpg',
            'image_2.jpg',
            'image_3.jpg',
            'image_4.jpg',
            'image_5.jpg',
            'image_6.jpg',
            'image_7.jpg',
            'image_8.jpg',
            'image_9.jpg',
            'image_10.jpg',
            'image_11.jpg',
            'image_12.jpg',
            'image_13.jpg',
        ];
    }
}
