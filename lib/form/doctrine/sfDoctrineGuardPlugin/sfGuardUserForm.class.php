<?php

/**
 * sfGuardUser form.
 *
 * @package    i-store
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserForm extends PluginsfGuardUserForm
{
  public function configure()
  {
      parent::configure();

      // on configure les champs à afficher dans le formulaire
      $this->useFields(
              array(
                  'username',       /*  nom de l'utisateur ou login */
                  'password',        /*  password de l'utilisateur */
                  'email_address',  /*  adresse mail de l'utilisateur */

                  'last_name',
                  'first_name'       /*  prenom de l'utilisateur */
                  ));
      
      // on modifie le widget du champs password pour mettre un champ
      //        mot de passe
      $this->widgetSchema['password'] = new sfWidgetFormInputPassword();

      // on ajoute des zones de saisie pour la confirmation
      //    du mot de passe et de l'addresse mail
      $this->setWidget('repassword', new sfWidgetFormInputPassword());
      $this->setWidget('re_email_address', new sfWidgetFormInputText());

      // on configure la position des champs du formulaire
      $this->getWidgetSchema()->setPositions(
              array(
                  'id',
                  'username',
                  'password',
                  'repassword',
                  'email_address',
                  're_email_address',
                  'last_name',
                  'first_name'
         ));

        // on configure tous les champs de type string
        $validatorString = new sfValidatorString(
                    array(
                        'required' => true,
                        'min_length' => 3,
                        'max_length' => 40
                    ),
                array(
                    'min_length' => 'Mot de passe trop court (3 caractères minimum)',
                    'max_length' => 'Mot de passe trop long (40 caractères maximum)',
                    'required'   => 'champ non renseigné'
              ));

        $this->validatorSchema['username'] = $validatorString;
        $this->validatorSchema['last_name'] = $validatorString;
        $this->validatorSchema['first_name'] = $validatorString;

        // on ajoute les filtres pour valider le mot de passe
        $validatorPassword = new sfValidatorString(
                array(
                    'required' => true,
                    'min_length' => 6,
                    'max_length' => 20
                ),
                array(
                    'min_length' => 'Mot de passe trop court (6 caractères minimum)',
                    'max_length' => 'Mot de passe trop long (20 caractères maximum)',
                    'required'   => 'champ non renseigné'
              ));
        $this->validatorSchema['password'] = $validatorPassword;
        $this->validatorSchema['repassword'] = $validatorPassword;
        

        // vérifie que les deux mot de passe sont identiques
      	$this->validatorSchema->setPostValidator(
            new sfValidatorSchemaCompare('password',  sfValidatorSchemaCompare::EQUAL, 'repassword',
                array(), array( 'invalid' => 'Les deux mot de passe ne sont pas identiques.'))
         );


        // active le filtre permettant de vérifier l'adresse e-mail
        $validatorMail = new sfValidatorEmail (
                    array('max_length' => 255, 'required' => true),
                    array(
                        'invalid' => 'Le format de l\'adresse e-mail est invalide',
                        'required' => 'champ non renseigné'
                    )
                );
        $this->validatorSchema['email_address'] = $validatorMail;
        $this->validatorSchema['re_email_address'] = $validatorMail;

      	// verifie que les deux adresses e-mail sont identiques
        $this->validatorSchema->setPostValidator(
            new sfValidatorSchemaCompare('email_address',  sfValidatorSchemaCompare::EQUAL, 're_email_address',
                    array(), array( 'invalid' => 'Les deux adresses e-mail ne sont pas identiques.'))
	);


      // on personnalise les labels
      $this->widgetSchema->setLabels(
              array(
                 'username' => 'Nom d\'utilisateur* :',
                 'password' => 'Mot de passe* :',
                 'repassword' => 'Confirmation du mot de passe* :',
                 'email_address' => 'Adresse e-mail* :',
                  're_email_address' =>  'Confirmation de l\'adresse e-mail* :',
                 'last_name' => 'Nom* :',
                 'first_name' => 'Prenom* :'
              ));

      $profileForm = new IStoreCustomerForm($this->object->Profile);
      $this->embedMergeForm('Informations Personnelles', $profileForm);

  }
}
