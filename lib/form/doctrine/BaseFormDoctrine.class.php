<?php

/**
 * Project form base class.
 *
<<<<<<< HEAD
 * @package    symfony
=======
 * @package    i-store
>>>>>>> ce54ec20e0f7185057f63fc7bb8cc6645b62d79f
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormBaseTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class BaseFormDoctrine extends sfFormDoctrine
{
  public function setup()
  {
  }

  /**
   * Embeds a form like "mergeForm" does, but will still
   * save the input data.
   */
  public function embedMergeForm($name, sfForm $form)
  {
    // This starts like sfForm::embedForm
    $name = (string) $name;
    if (true === $this->isBound() || true === $form->isBound())
    {
      throw new LogicException('A bound form cannot be merged');
    }
    $this->embeddedForms[$name] = $form;

    $form = clone $form;
    unset($form[self::$CSRFFieldName]);

    // But now, copy each widget instead of the while form into the current
    // form. Each widget ist named "formname|fieldname".
    foreach ($form->getWidgetSchema()->getFields() as $field => $widget)
    {
      $widgetName = "$name|$field";
      if (isset($this->widgetSchema[$widgetName]))
      {
        throw new LogicException("The forms cannot be merged. A field name '$widgetName' already exists.");
      }

      $this->widgetSchema[$widgetName] = $widget;                           // Copy widget
      $this->validatorSchema[$widgetName] = $form->validatorSchema[$field]; // Copy schema
      $this->setDefault($widgetName, $form->getDefault($field));            // Copy default value

      if (!$widget->getLabel())
      {
        // Re-create label if not set (otherwise it would be named 'ucfirst($widgetName)')
        $label = $form->getWidgetSchema()->getFormFormatter()->generateLabelName($field);
        $this->getWidgetSchema()->setLabel($widgetName, $label);
      }
    }

    // And this is like in sfForm::embedForm
    $this->resetFormFields();
  }

  /**
   * Override sfFormDoctrine to prepare the
   * values: FORMNAME|FIELDNAME has to be transformed
   * to FORMNAME[FIELDNAME]
   */
  public function updateObject($values = null)
  {
    if (is_null($values))
    {
      $values = $this->values;
      foreach ($this->embeddedForms AS $name => $form)
      {
        foreach ($form AS $field => $f)
        {
          if (isset($values["$name|$field"]))
          {
            // Re-rename the form field and remove
            // the original field
            $values[$name][$field] = $values["$name|$field"];
            unset($values["$name|$field"]);
          }
        }
      }
    }

    // Give the request to the original method
    parent::updateObject($values);
  }
}
