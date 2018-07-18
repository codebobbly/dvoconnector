<?php

/**
 * Abstract controller.
 */
declare(strict_types=1);

namespace RGU\Dvoconnector\Controller;

use TYPO3\CMS\Core\Messaging\FlashMessage;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\HttpUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Security\Cryptography\HashService;
use TYPO3\CMS\Extbase\SignalSlot\Dispatcher;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;
use TYPO3\CMS\Extbase\Mvc\Controller\Arguments;
use TYPO3\CMS\Extbase\Property\PropertyMapper;
use TYPO3\CMS\Extbase\Property\PropertyMappingConfiguration;

use RGU\Dvoconnector\Domain\Filter\AssociationsFilter;
use RGU\Dvoconnector\Domain\Filter\EventsFilter;
use RGU\Dvoconnector\Domain\Filter\AnnouncementsFilter;
use RGU\Dvoconnector\Domain\Filter\FunctionariesFilter;

use \RGU\Dvoconnector\Domain\Model\Association;

/**
 * Abstract controller.
 */
abstract class AbstractController extends ActionController {

    /**
     * @var string
     */
    const SEPARATOR_KEY_VALUE = '=';

    /**
     * @var string
     */
    const SEPARATOR_ENTRY = ',';

    /**
     * typeConverterObjectConverter
     * @var RGU\Dvoconnector\Property\TypeConverter\ObjectConverter
     * @inject
    */
    protected $typeConverterObjectConverter;

    /**
  	 * associationRepository
  	 * @var RGU\Dvoconnector\Domain\Repository\AssociationRepository
  	 * @inject
    */
  	protected $associationRepository;

    /**
     * @param ConfigurationManagerInterface $configurationManager
     */
    public function injectConfigurationManager(ConfigurationManagerInterface $configurationManager) {

      $this->configurationManager = $configurationManager;

      $this->settings = $this->configurationManager->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS);

    }

    /**
     * Extend the view by the slot class and name and assign the variable to the view.
     *
     * @param array  $variables
     * @param string $signalClassName
     * @param string $signalName
     */
    protected function slotExtendedAssignMultiple(array $variables, $signalClassName, $signalName) {

      // use this variable in your extension to add more custom variables
      $variables['settings'] = $this->settings;

      $dispatcher = $this->objectManager->get(Dispatcher::class);
      $variables = $dispatcher->dispatch($signalClassName, $signalName, $variables);

      $this->view->assignMultiple($variables);

    }

    /**
     * Check if the static template is included.
     */
    protected function checkStaticTemplateIsIncluded() {

      /*if (!isset($this->settings['dateFormat'])) {
        $this->addFlashMessage(
          'Basic configuration settings are missing. It seems, that the Static Extension TypoScript is not loaded to your TypoScript configuration. Please add the calendarize TS to your TS settings.',
          'Configuration Error',
          FlashMessage::ERROR
        );
      }*/

    }

    /**
     * Check if the settings.
     */
    protected function checkSettings() {

      if(empty($this->settings['additional']['detailPid'])) {
        $this->settings['additional']['detailPid'] = $GLOBALS['TSFE']->id;
      }

      if(empty($this->settings['additional']['listPid'])) {
        $this->settings['additional']['listPid'] = $GLOBALS['TSFE']->id;
      }

      if(empty($this->settings['associationID'])) {

        $this->addFlashMessage(
          'Please set a association',
          'Configuration Error',
          FlashMessage::ERROR
        );

      }

    }

    /**
  	 * Get the default association filter.
  	 *
  	 * @return AssociationFilter
  	 */
  	protected function getDefaultAssociationFilter() {

  		$filter = new AssociationFilter();
      $filter->setInsideAssociationID($this->settings['associationID']);

      return $filter;

  	}

  	/**
  	 * Get the associations filter.
  	 * @param string $filter Filter
  	 *
  	 * @return AssociationsFilter
  	 */
  	protected function getAssociationsFilter(string $filter = null) {

      $mappingConfiguration = new PropertyMappingConfiguration();
      $mappingConfiguration->setTypeConverter($this->typeConverterObjectConverter);
      $mappingConfiguration->setTypeConverterOption(\RGU\Dvoconnector\Property\TypeConverter\ObjectConverter::class, \RGU\Dvoconnector\Property\TypeConverter\ObjectConverter::CONFIGURATION_OBJECT, $this->getDefaultAssociationsFilter());

      return $this->convertAssociationsFilter($mappingConfiguration, $filter);

  	}

    /**
  	 * Get the associations filter.
     * @param PropertyMappingConfiguration $mappingConfiguration PropertyMappingConfiguration
  	 * @param string $filter Filter
  	 *
  	 * @return AssociationsFilter
  	 */
  	protected function convertAssociationsFilter($mappingConfiguration, string $filter = null) {

      $this->updateMappingConfigurationForAllowedPoperties($mappingConfiguration, $this->settings['filterAssociations']['allowedProperty']);

  		return $this->objectManager->get(PropertyMapper::class)->convert($this->filtertextToArray($filter), AssociationsFilter::class, $mappingConfiguration);

  	}

    /**
  	 * Get the associations filter.
  	 * @param string $filter Filter
  	 *
  	 * @return AssociationsFilter
  	 */
  	protected function getUserAssociationsFilter(string $filter = null) {

      $mappingConfiguration = new PropertyMappingConfiguration();
      return $this->convertAssociationsFilter($mappingConfiguration, $filter);

  	}

  	/**
  	 * Get the default associations filter.
  	 *
  	 * @return AssociationsFilter
  	 */
  	protected function getDefaultAssociationsFilter() {

      $filter = new AssociationsFilter();
      $filter->setInsideAssociationID($this->settings['associationID']);

      return $filter;

  	}

  	/**
  	 * Get the events filter.
  	 * @param string $filter Filter
  	 *
  	 * @return EventsFilter
  	 */
  	protected function getEventsFilter(string $filter = null) {

      $mappingConfiguration = new PropertyMappingConfiguration();
      $mappingConfiguration->setTypeConverter($this->typeConverterObjectConverter);
      $mappingConfiguration->setTypeConverterOption(\RGU\Dvoconnector\Property\TypeConverter\ObjectConverter::class, \RGU\Dvoconnector\Property\TypeConverter\ObjectConverter::CONFIGURATION_OBJECT, $this->getDefaultEventsFilter());

      return $this->convertEventsFilter($mappingConfiguration, $filter);

  	}

    /**
  	 * Get the events filter.
     * @param PropertyMappingConfiguration $mappingConfiguration PropertyMappingConfiguration
  	 * @param string $filter Filter
  	 *
  	 * @return EventsFilter
  	 */
  	protected function convertEventsFilter($mappingConfiguration, string $filter = null) {

      $this->updateMappingConfigurationForAllowedPoperties($mappingConfiguration, $this->settings['filterEvents']['allowedProperty']);

  		// Adjust configuration to allow mapping of sub property 'usergroup'
  		$mappingConfiguration->forProperty('startDate')->setTypeConverterOption(
        \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::class,
        \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,
        'd.m.Y'
      );

  		$mappingConfiguration->forProperty('endDate')->setTypeConverterOption(
        \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::class,
        \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,
        'd.m.Y'
      );

  		return $this->objectManager->get(PropertyMapper::class)->convert($this->filtertextToArray($filter), EventsFilter::class, $mappingConfiguration);

  	}

    /**
  	 * Get the events filter.
  	 * @param string $filter Filter
  	 *
  	 * @return EventsFilter
  	 */
  	protected function getUserEventsFilter(string $filter = null) {

      $mappingConfiguration = new PropertyMappingConfiguration();

      return $this->convertEventsFilter($mappingConfiguration, $filter);

  	}

  	/**
  	 * Get the default events filter.
  	 *
  	 * @return EventsFilter
  	 */
  	protected function getDefaultEventsFilter() {

  		$filter = new EventsFilter();

      $filter->setInsideAssociationID($this->settings['associationID']);

      if($this->settings['filterEvents']['defaultValue']['startDate']) {
        $filter->setStartDate(new \DateTime('now'));
      }

      $filter->setChilds($this->settings['filterEvents']['defaultValue']['childs']);
      $filter->setPrivateEvents($this->settings['filterEvents']['defaultValue']['private_events']);

  		return $filter;

  	}

  	/**
  	 * Get the announcements filter.
  	 * @param string $filter Filter
  	 *
  	 * @return AnnouncementsFilter
  	 */
  	protected function getAnnouncementsFilter(string $filter = null) {

  		$mappingConfiguration = new PropertyMappingConfiguration();
      $mappingConfiguration->setTypeConverter($this->typeConverterObjectConverter);
      $mappingConfiguration->setTypeConverterOption(\RGU\Dvoconnector\Property\TypeConverter\ObjectConverter::class, \RGU\Dvoconnector\Property\TypeConverter\ObjectConverter::CONFIGURATION_OBJECT, $this->getDefaultAnnouncementsFilter());

  		return $this->convertAnnouncementsFilter($mappingConfiguration, $filter);

  	}

    /**
  	 * Get the announcements filter.
  	 * @param PropertyMappingConfiguration $mappingConfiguration PropertyMappingConfiguration
  	 * @param string $filter Filter
  	 *
  	 * @return AnnouncementsFilter
  	 */
  	protected function convertAnnouncementsFilter($mappingConfiguration, string $filter = null) {

      $this->updateMappingConfigurationForAllowedPoperties($mappingConfiguration, $this->settings['filterAnnouncements']['allowedProperty']);

  		// Adjust configuration to allow mapping of sub property 'usergroup'
  		$mappingConfiguration->forProperty('startDate')->setTypeConverterOption(
        \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::class,
        \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,
        'd.m.Y'
      );

  		$mappingConfiguration->forProperty('endDate')->setTypeConverterOption(
        \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::class,
        \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,
        'd.m.Y'
      );

  		return $this->objectManager->get(PropertyMapper::class)->convert($this->filtertextToArray($filter), AnnouncementsFilter::class, $mappingConfiguration);

  	}

    /**
  	 * Get the announcements filter.
  	 * @param string $filter Filter
  	 *
  	 * @return AnnouncementsFilter
  	 */
  	protected function getUserAnnouncementsFilter(string $filter = null) {

  		$mappingConfiguration = new PropertyMappingConfiguration();
      return $this->convertAnnouncementsFilter($mappingConfiguration, $filter);

  	}

  	/**
  	 * Get the default announcements filter.
  	 *
  	 * @return AnnouncementsFilter
  	 */
  	protected function getDefaultAnnouncementsFilter() {

  		$filter = new AnnouncementsFilter();

      $filter->setInsideAssociationID($this->settings['associationID']);

      if($this->settings['filterAnnouncements']['defaultValue']['startDate']) {
        $filter->setStartDate(new \DateTime('now'));
      }

      $filter->setChilds($this->settings['filterAnnouncements']['defaultValue']['childs']);

  		return $filter;

  	}

  	/**
  	 * Get the functionaries filter.
  	 * @param string $filter Filter
  	 *
  	 * @return FunctionariesFilter
  	 */
  	protected function getFunctionariesFilter(string $filter = null) {

      $mappingConfiguration = new PropertyMappingConfiguration();
      $mappingConfiguration->setTypeConverter($this->typeConverterObjectConverter);
      $mappingConfiguration->setTypeConverterOption(\RGU\Dvoconnector\Property\TypeConverter\ObjectConverter::class, \RGU\Dvoconnector\Property\TypeConverter\ObjectConverter::CONFIGURATION_OBJECT, $this->getDefaultFunctionariesFilter());

      return $this->convertFunctionariesFilter($mappingConfiguration, $filter);

  	}

    /**
  	 * Get the functionaries filter.
     * @param PropertyMappingConfiguration $mappingConfiguration PropertyMappingConfiguration
  	 * @param string $filter Filter
  	 *
  	 * @return FunctionariesFilter
  	 */
  	protected function convertFunctionariesFilter($mappingConfiguration, string $filter = null) {

      $this->updateMappingConfigurationForAllowedPoperties($mappingConfiguration, $this->settings['filterFunctionaries']['allowedProperty']);

  		return $this->objectManager->get(PropertyMapper::class)->convert($this->filtertextToArray($filter), FunctionariesFilter::class, $mappingConfiguration);

  	}

    /**
  	 * Get the functionaries filter.
  	 * @param string $filter Filter
  	 *
  	 * @return FunctionariesFilter
  	 */
  	protected function getUserFunctionariesFilter(string $filter = null) {

      $mappingConfiguration = new PropertyMappingConfiguration();
      return $this->convertFunctionariesFilter($mappingConfiguration, $filter);

  	}

  	/**
  	 * Get the default functionaries filter.
  	 *
  	 * @return FunctionariesFilter
  	 */
  	protected function getDefaultFunctionariesFilter() {

  		$filter = new FunctionariesFilter();

      $filter->setInsideAssociationID($this->settings['associationID']);

      $filter->setRole($this->settings['filterFunctionaries']['defaultValue']['role']);

      return $filter;

  	}

  	/**
  	 * Transfer json to filtertext.
  	 *
  	 * @param array $filter Filter
  	 *
  	 * @return String
  	 */
  	protected function arrayToFiltertext(array $filterArray = null) {

      $resultArray = array();

      foreach ($filterArray as $key => $value) {
        if($value) {
          $resultArray[] = implode(self::SEPARATOR_KEY_VALUE, array($key, $value));
        }
      }

  		return implode(self::SEPARATOR_ENTRY, $resultArray);

  	}

  	/**
  	 * Transfer filtertext to json.
  	 *
  	 * @param string $filter Filter
  	 *
  	 * @return String
  	 */
  	protected function filtertextToArray(string $filter = null) {

      $resultArray = array();

      if(!empty($filter)) {

        $filterArray = explode(self::SEPARATOR_ENTRY , $filter);

        foreach ($filterArray as $key => $value) {

          $entryArray = explode(self::SEPARATOR_KEY_VALUE, $value);
          $resultArray[$entryArray[0]] = $entryArray[1];

        }

      }

  		return $resultArray;

  	}

    /**
  	 * filter action
  	 * @param array $filter Filter
     */
  	public function filterAction(array $filter) {

  		$this->checkStaticTemplateIsIncluded();

  		$arguments = $this->request->getArguments();

  		$filtertext = $this->arrayToFiltertext($filter);

  		$arguments['filter'] = $filtertext;

  		$this->redirect('dynamic', null, null, $arguments);

  	}

    /**
  	 * Get the association
  	 *
  	 * @param PropertyMappingConfiguration $mappingConfiguration
     * @param array $settings settings for allowed properties
  	 * @return void
  	 */
  	protected function updateMappingConfigurationForAllowedPoperties($mappingConfiguration, $settings) {

      $mappingConfiguration->skipUnknownProperties();

      if(isset($settings)) {

        foreach ($settings as $key => $value) {
          if($value) {
            $mappingConfiguration->allowProperties($key);
          }
        }

      }

  	}

}
