<?php
/**
 * EvaEngine
 *
 * @link      https://github.com/AlloVince/eva-engine
 * @copyright Copyright (c) 2012 AlloVince (http://avnpc.com/)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * @package   Eva_Api.php
 * @author    AlloVince
 */

namespace User\Form;

/**
 * Eva Form will automatic combination form Elements & Validators & Filters
 * Also allow add sub forms and unit validate
 * 
 * @category   Eva
 * @package    Eva_Form
 */
class FieldForm extends \Eva\Form\RestfulForm
{
    protected $subFormGroups = array(
        'default' => array(
            'FieldRole' => 'User\Form\FieldRoleForm',
            'Fieldoption' => array(
                'formClass' => 'User\Form\FieldoptionForm',
                'collection' => true,
                'skipEmpty' => true,
            ),
        )
    );

    /**
     * Form basic elements
     *
     * @var array
     */
    protected $baseElements = array (
        'id' => array (
            'name' => 'id',
            'type' => 'hidden',
            'options' => array (
                'label' => 'Id',
            ),
            'attributes' => array (
                'value' => '',
            ),
        ),
        'fieldKey' => array (
            'name' => 'fieldKey',
            'type' => 'text',
            'options' => array (
                'label' => 'Field Key',
            ),
            'attributes' => array (
                'value' => '',
            ),
        ),
        'fieldType' => array (
            'name' => 'fieldType',
            'type' => 'select',
            'options' => array (
                'label' => 'Field Type',
                'value_options' => array (
                    array (
                        'label' => 'Text',
                        'value' => 'text',
                    ),
                    array (
                        'label' => 'Radio',
                        'value' => 'radio',
                    ),
                    array (
                        'label' => 'Select',
                        'value' => 'select',
                    ),
                    array (
                        'label' => 'Multi Checkbox',
                        'value' => 'multiCheckbox',
                    ),
                    array (
                        'label' => 'Number',
                        'value' => 'number',
                    ),
                    array (
                        'label' => 'Email',
                        'value' => 'email',
                    ),
                    array (
                        'label' => 'Textarea',
                        'value' => 'textarea',
                    ),
                    array (
                        'label' => 'Url',
                        'value' => 'url',
                    ),
                ),
            ),
            'attributes' => array (
                'value' => 'text',
            ),
        ),
        'label' => array (
            'name' => 'label',
            'type' => 'text',
            'options' => array (
                'label' => 'Label',
            ),
            'attributes' => array (
                'value' => '',
            ),
        ),
        'description' => array (
            'name' => 'description',
            'type' => 'textarea',
            'options' => array (
                'label' => 'Description',
            ),
            'attributes' => array (
                'value' => '',
            ),
        ),
        'applyToAll' => array (
            'name' => 'applyToAll',
            'type' => 'select',
            'options' => array (
                'label' => 'Apply To All User',
                'value_options' => array(
                    array (
                        'label' => 'Yes',
                        'value' => '1',
                    ),
                    array (
                        'label' => 'No',
                        'value' => '0',
                    ),
                ),
            ),
            'attributes' => array (
                'value' => '1',
            ),
        ),
        'required' => array (
            'type' => 'select',
            'name' => 'required',
            'options' => array (
                'label' => 'Required',
                'value_options' => array(
                    array (
                        'label' => 'Yes',
                        'value' => '1',
                    ),
                    array (
                        'label' => 'No',
                        'value' => '0',
                    ),
                ),
            ),
            'attributes' => array (
                'value' => '0',
            ),
        ),
        'defaultValue' => array (
            'name' => 'defaultValue',
            'type' => 'textarea',
            'options' => array (
                'label' => 'Default Value',
            ),
            'attributes' => array (
                'value' => '',
            ),
        ),
    );

    /**
    * Form basic Validators
    *
    * @var array
    */
    protected $baseFilters = array (
        'id' => array (
            'name' => 'id',
            'required' => false,
            'filters' => array (
            ),
            'validators' => array (
                'notEmpty' => array (
                    'name' => 'NotEmpty',
                    'options' => array (
                    ),
                ),
            ),
        ),
        'fieldKey' => array (
            'name' => 'fieldKey',
            'required' => false,
            'filters' => array (
                'stripTags' => array (
                    'name' => 'StripTags',
                ),
                'stringTrim' => array (
                    'name' => 'StringTrim',
                ),
            ),
            'validators' => array (
                'notEmpty' => array (
                    'name' => 'NotEmpty',
                    'options' => array (
                    ),
                ),
                'stringLength' => array (
                    'name' => 'StringLength',
                    'options' => array (
                        'max' => '24',
                    ),
                ),
            ),
        ),
        'fieldType' => array (
            'name' => 'fieldType',
            'required' => false,
            'filters' => array (
            ),
            'validators' => array (
                'inArray' => array (
                    'name' => 'InArray',
                    'options' => array (
                        'haystack' => array (
                            'text',
                            'radio',
                            'select',
                            'multiCheckbox',
                            'number',
                            'email',
                            'textarea',
                            'url',
                        ),
                    ),
                ),
            ),
        ),
        'label' => array (
            'name' => 'label',
            'required' => false,
            'filters' => array (
                'stripTags' => array (
                    'name' => 'StripTags',
                ),
                'stringTrim' => array (
                    'name' => 'StringTrim',
                ),
            ),
            'validators' => array (
                'notEmpty' => array (
                    'name' => 'NotEmpty',
                    'options' => array (
                    ),
                ),
                'stringLength' => array (
                    'name' => 'StringLength',
                    'options' => array (
                        'max' => '64',
                    ),
                ),
            ),
        ),
        'description' => array (
            'name' => 'description',
            'required' => false,
            'filters' => array (
                'stripTags' => array (
                    'name' => 'StripTags',
                ),
                'stringTrim' => array (
                    'name' => 'StringTrim',
                ),
            ),
            'validators' => array (
                'notEmpty' => array (
                    'name' => 'NotEmpty',
                    'options' => array (
                    ),
                ),
                'stringLength' => array (
                    'name' => 'StringLength',
                    'options' => array (
                        'max' => '255',
                    ),
                ),
            ),
        ),
        'applyToAll' => array (
            'name' => 'applyToAll',
            'required' => false,
            'filters' => array (
            ),
            'validators' => array (
                'notEmpty' => array (
                    'name' => 'NotEmpty',

                ),
                'inArray' => array (
                    'name' => 'InArray',
                    'options' => array (
                        'haystack' => array (
                            '0',
                            '1',
                        ),
                    ),
                ),
            ),
        ),
        'required' => array (
            'name' => 'required',
            'required' => false,
            'filters' => array (
            ),
            'validators' => array (
                'notEmpty' => array (
                    'name' => 'NotEmpty',
                    'options' => array (
                    ),
                ),
            ),
        ),
        'defaultValue' => array (
            'name' => 'defaultValue',
            'required' => false,
            'filters' => array (
            ),
            'validators' => array (
                'notEmpty' => array (
                    'name' => 'NotEmpty',
                    'options' => array (
                    ),
                ),
            ),
        ),
    );
}