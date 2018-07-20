<?php

namespace RGU\Dvoconnector\ViewHelpers;

use TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;
use \TYPO3\CMS\Fluid\Core\ViewHelper\Facets\CompilableInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

/**
 * ### ViewHelper used to override page title
 *
 */
class TitleTagViewHelper extends AbstractViewHelper implements CompilableInterface
{

    use CompileWithRenderStatic;

    /**
     * Arguments initialization
     *
     * @return void
     */
    public function initializeArguments()
    {
        $this->registerArgument('title', 'string', 'Title tag content');
    }

    /**
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return mixed
     */
    public static function renderStatic(
        array $arguments,
        \Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ) {
        if ('BE' === TYPO3_MODE) {
            return;
        }

        if (false === empty($arguments['title'])) {
            $title = $arguments['title'];
        } else {
            $title = $renderChildrenClosure();
        }

        $pageRenderer = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);
        $pageRenderer->setTitle($title);

        if (!empty($GLOBALS['TSFE'])) {
            $GLOBALS['TSFE']->altPageTitle    = $title;
            $GLOBALS['TSFE']->indexedDocTitle = $title;
        }

    }
}
