<?php
/**
 * Bootstrapper Form Checkable class
 */

namespace Bootstrapper;

/**
 * Creates Bootstrap 3 compliant Icons
 *
 * @package Bootstrapper
 */
class Checkable extends RenderedObject
{
    /**
     * @var Form
     */
    protected $form;
    
    
    /**
     * @var string The type
     */
    protected $type;
    
    /**
     * @var string The name
     */
    protected $name;
    
    /**
     * @var string The value
     */
    protected $value;
    
    /**
     * @var array The options
     */
    protected $options;
    
    /**
     * @var string The label
     */
    protected $label;
    
    /**
     * @var array The label options
     */
    protected $labelOptions;

    /**
     * Creates a new instance of a checkable type
     *
     * @param Form $form
     */
    public function __construct(Form $form, $type, $name, $value, $options = [], $label = null, $labelOptions = [])
    {
        $this->form = $form;
        
        $this->type = $type;
        $this->name = $name;
        $this->value = $value;
        $this->options = $options;
        
        $this->label = $label;
        $this->labelOptions = $labelOptions;
    }

    /**
     * Renders the object
     *
     * @return string
     */
    public function render()
    {
        $input = $this->form->input($this->type, $this->name, $this->value, $this->options);
        if (!$this->label) {
            return $input;
        }
        
        $attributes = new Attributes(
            $this->attributes,
            [
                'class' => $this->type
            ]
        );
        
        $input .= '<span>' . $this->label . '</span>';
        
        $label = '<label>' . $input . '</label>';
        
        return "<div $attributes>$label</div>";
    }

    public function withOptions($options)
    {
        $this->options = $options;
        
        return $this;
    }
    
    public function withLabel($label)
    {
        $this->label = $label;
        
        return $this;
    }
    
    public function withLabelOptions($labelOptions)
    {
        $this->labelOptions = $labelOptions;
        
        return $this;
    }
}
