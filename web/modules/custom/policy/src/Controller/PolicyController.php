<?php

namespace Drupal\policy\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Config\ConfigFactoryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Controller for display a Policy terms.
 */
class PolicyController extends ControllerBase {

  /**
   * Config object for PolicyController configuration.
   *
   * @var \Drupal\Core\Config\Config
   */
  protected $config;

  /**
   * PolicyController constructor.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   Configuration object factory.
   */
  public function __construct(ConfigFactoryInterface $config_factory) {
    $this->config = $config_factory->get('policy.settings');
  }

  /**
   * {@inheritdoc}
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   The Drupal service container.
   *
   * @return static
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory')
    );
  }

  /**
   * {@inheritDoc}
   */
  public function content() {
    $message = $this->config->get('message');
    return [
      '#type' => 'markup',
      '#markup' => $message,
    ];
  }
}
