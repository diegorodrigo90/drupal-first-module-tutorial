<?php

namespace Drupal\policy\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines a form to update the Policy message config.
 */
class PolicySettingsForm extends ConfigFormBase {

  /**
   * {@inheritDoc}
   */
  public function getFormId() {
    return 'policy_form_update';
  }

  /**
   * {@inheritDoc}
   */
  protected function getEditableConfigNames() {
    return [
      'policy.settings',
    ];
  }

  /**
   * {@inheritDoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Form Constructor.
    $form = parent::buildForm($form, $form_state);
    $config = $this->config('policy.settings');
    $form['message'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Update Policy Terms'),
      '#default_value' => $config->get('message'),
      '#description' => $this->t('Write policy terms'),
    ];
    return $form;
  }

  /**
   * {@inheritDoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('policy.settings');
    $config->set('message', $form_state->getValue('message'));
    $config->save();
    return parent::submitForm($form, $form_state);
  }
}
