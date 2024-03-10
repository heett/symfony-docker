<?php

namespace App\Tests\Service;

use App\Entity\BookCategory;
use App\Model\BookCategoryListItem;
use App\Model\BookCategoryListResponse;
use App\Repository\BookCategoryRepository;
use App\Service\BookCategoryService;
use App\Tests\AbstractsTestCase;

class BookCategoryServiceTest extends AbstractsTestCase
{
    public function testGetCategories(): void
    {
        $category = (new BookCategory())->setTitle('title')->setSlug('test');
        $this->setEntityId($category, 7);
        $repository = $this->createMock(BookCategoryRepository::class);
        $repository->expects($this->once())
            ->method('findAllSortedByTitle')
            ->willReturn([$category]);

        $service = new BookCategoryService($repository);

        $expected = new BookCategoryListResponse([new BookCategoryListItem(7, 'title', 'test')]);

        $this->assertEquals($expected, $service->getCategories());
    }
}
