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

namespace Epic\Form;

/**
 * Eva Form will automatic combination form Elements & Validators & Filters
 * Also allow add sub forms and unit validate
 * 
 * @category   Eva
 * @package    Eva_Form
 */
class CorporateForm extends RegForm
{
    protected $subFormGroups = array(
        'default' => array(
            'Profile' => 'Epic\Form\CorporateProfileForm',
        )
    );

    protected $mergeFilters = array(
        'email' => array(
            'required' => true
        ),
    );
}