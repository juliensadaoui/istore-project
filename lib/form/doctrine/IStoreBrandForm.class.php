<?php

/**
 * IStoreBrand form.
 *
<<<<<<< HEAD
 * @package    symfony
=======
 * @package    i-store
>>>>>>> ce54ec20e0f7185057f63fc7bb8cc6645b62d79f
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class IStoreBrandForm extends BaseIStoreBrandForm
{
  public function configure()
  {
     unset($this['created_at'], $this['updated_at']);
  }
}
