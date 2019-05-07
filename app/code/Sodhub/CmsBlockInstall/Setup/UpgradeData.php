<?php

namespace Sodhub\CmsBlockInstall\Setup;

use Magento\Store\Model\StoreFactory;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Cms\Model\BlockFactory;
use Magento\Cms\Model\BlockRepository;
use Magento\Cms\Api\Data\PageInterfaceFactory;
use Magento\Cms\Api\PageRepositoryInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Psr\Log\LoggerInterface;


/**
 * @codeCoverageIgnore
 */
class UpgradeData implements UpgradeDataInterface
{

    /**
     * @var LoggerInterface
     */
    private $logger;


    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteria;


    /**
     * @var BlockFactory
     */
    private $blockFactory;

    /**
     * @var BlockRepository
     */
    private $blockRepository;

    /**
     * @var PageInterfaceFactory
     */
    private $pageFactory;

    /**
     * @var PageRepositoryInterface
     */
    private $pageRepository;

    /**
     * @var StoreFactory
     */
    private $storeFactory;

    /**
     * InstallData constructor.
     * @param SearchCriteriaBuilder $searchBuilder
     * @param BlockFactory $blockFactory
     * @param BlockRepository $blockRepository
     * @param PageInterfaceFactory $pageFactory
     * @param PageRepositoryInterface $pageRepository
     * @param StoreFactory $storeFactory
     * @param LoggerInterface $logger
     */
    public function __construct(
        SearchCriteriaBuilder $searchBuilder,
        BlockFactory $blockFactory,
        BlockRepository $blockRepository,
        PageInterfaceFactory $pageFactory,
        PageRepositoryInterface $pageRepository,
        StoreFactory $storeFactory,
        LoggerInterface $logger
    ) {
        $this->searchCriteria = $searchBuilder;
        $this->blockFactory = $blockFactory;
        $this->blockRepository = $blockRepository;
        $this->pageRepository = $pageRepository;
        $this->pageFactory = $pageFactory;
        $this->storeFactory = $storeFactory;
        $this->logger = $logger;
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $default = $this->storeFactory->create()->load('default')->getId();
        $estStoreViewId = $this->storeFactory->create()->load('est_view')->getId();
        $allStoreViews = 0;

        if (version_compare($context->getVersion(), '1.0.8', '<')) {
            $cmsBlockData = [
                [  'title' => 'My Custom CMS Block New2',
                    'identifier' => 'my_cms_block_new2',
                    'content' => "<h1>!!Write your custom cms block content......</h1>",
                    'is_active' => 1,
                    'stores' => $estStoreViewId,
                    'sort_order' => 0
                ],
                [  'title' => 'My Custom CMS Block New3',
                    'identifier' => 'my_cms_block_new3',
                    'content' => "<h1>!!Write your custom cms block content....</h1>",
                    'is_active' => 1,
                    'stores' => $default,
                    'sort_order' => 0
                ],
                [  'title' => 'My Custom CMS Block New4',
                    'identifier' => 'my_cms_block_new4',
                    'content' => "<h1>!!Write your custom cms block content....</h1>",
                    'is_active' => 1,
                    'stores' => $allStoreViews,
                    'sort_order' => 0
                ]

            ];
           $this->updateBlocks($cmsBlockData);
           // or just create
           // $newBlock = $this->blockFactory->create(['data' => $cmsBlockData]);
           // $this->blockRepository->save($newBlock);


            $cmsPageData = [
                [
                    'title' => 'Custom cms page3', // cms page title
                    'page_layout' => '1column', // cms page layout
                    'meta_keywords' => 'Page keywords', // cms page meta keywords
                    'meta_description' => 'Page description', // cms page description
                    'identifier' => 'my-cms-page3', // cms page url identifier
                    'content_heading' => 'Custom cms page', // Page heading
                    'content' => "<h1>Write your custom cms page content.......</h1>", // page content
                    'is_active' => 1, // define active status
                    'stores' => [0], // assign to stores
                    'sort_order' => 0 // page sort order
                ],
                [
                    'title' => 'Custom cms page4', // cms page title
                    'page_layout' => '1column', // cms page layout
                    'meta_keywords' => 'Page keywords', // cms page meta keywords
                    'meta_description' => 'Page description', // cms page description
                    'identifier' => 'my-cms-page4', // cms page url identifier
                    'content_heading' => 'Custom cms page', // Page heading
                    'content' => "<h1>Write your custom cms page content.......</h1>", // page content
                    'is_active' => 1, // define active status
                    'stores' => [0], // assign to stores
                    'sort_order' => 0 // page sort order
                ]
            ];
            $this->updatePages($cmsPageData);
           //or just create
           // $newPage = $this->pageFactory->create(['data' => $cmsPageData]);
           // $this->pageRepository->save($newPage);
        }

        if (version_compare($context->getVersion(), '1.0.9', '<')) {

            $cmsPageData = [
                [

                    'identifier' => 'home', // cms page url identifier

                    'content' => "<p>CMS homepage content goes here!</p>                                    
                                    <div id=\"owlslider\" class=\"owl-carousel owl-theme\">
                                    <div class=\"item\">
                                    <h4>1</h4>
                                    </div>
                                    <div class=\"item\">
                                    <h4>2</h4>
                                    </div>
                                    <div class=\"item\">
                                    <h4>3</h4>
                                    </div>
                                    <div class=\"item\">
                                    <h4>4</h4>
                                    </div>
                                    <div class=\"item\">
                                    <h4>5</h4>
                                    </div>
                                    <div class=\"item\">
                                    <h4>6</h4>
                                    </div>
                                    <div class=\"item\">
                                    <h4>7</h4>
                                    </div>
                                    <div class=\"item\">
                                    <h4>8</h4>
                                    </div>
                                    <div class=\"item\">
                                    <h4>9</h4>
                                    </div>
                                    <div class=\"item\">
                                    <h4>10</h4>
                                    </div>
                                    <div class=\"item\">
                                    <h4>11</h4>
                                    </div>
                                    <div class=\"item\">
                                    <h4>12</h4>
                                    </div>
                                    </div>", // page content
                    'is_active' => 1, // define active status
                    'stores' => [0], // assign to stores
                    'sort_order' => 0 // page sort order
                ]
            ];
            $this->updatePages($cmsPageData);

        }


        $setup->endSetup();
    }

    /**
     * @param $cmsBlockData
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function updateBlocks ($cmsBlockData) {
        foreach ($cmsBlockData as $blockData) {
            $this->searchCriteria->addFilter('identifier', $blockData['identifier']);
            $this->searchCriteria->addFilter('store_id', $blockData['stores']);
            $blocksList = $this->blockRepository->getList($this->searchCriteria->create());
            $blocksItems = $blocksList->getItems();
            $block = array_shift($blocksItems);
            if (!$block) {
                /** @var \Magento\Cms\Model\Block $block */
                $block = $this->blockFactory->create();

            }
            $block->addData($blockData);
            try {
                $this->blockRepository->save($block);
            } catch (CouldNotSaveException $e) {
                $this->logger->error($e);
            }
        }
    }

    /**
     * @param $cmsPageData
     */
    public function updatePages ($cmsPageData) {
        foreach ($cmsPageData as $pageData) {
            $this->searchCriteria->addFilter('identifier', $pageData['identifier']);
            $this->searchCriteria->addFilter('store_id',  $pageData['stores']);
            $pagesList = $this->pageRepository->getList($this->searchCriteria->create());
            $pagesItems = $pagesList->getItems();
            $page = array_shift($pagesItems);
            if (!$page) {
                /** @var \Magento\Cms\Model\Block $block */
                $page = $this->pageFactory->create();

            }
            $page->addData($pageData);
            try {
                $this->pageRepository->save($page);
            } catch (CouldNotSaveException $e) {
                $this->logger->error($e);
            }
        }
    }


}