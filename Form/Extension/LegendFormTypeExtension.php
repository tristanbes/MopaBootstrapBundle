<?php
namespace Mopa\Bundle\BootstrapBundle\Form\Extension;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormViewInterface;
use Symfony\Component\Form\FormBuilderInterface;

class LegendFormTypeExtension extends AbstractTypeExtension
{
    private $render_fieldset;
    private $show_legend;
    private $show_child_legend;
    private $render_required_asterisk;
    private $render_optional_text;

    public function __construct(array $options)
    {
        $this->render_fieldset          = $options['render_fieldset'];
        $this->show_legend              = $options['show_legend'];
        $this->show_child_legend        = $options['show_child_legend'];
        $this->render_required_asterisk = $options['render_required_asterisk'];
        $this->render_optional_text     = $options['render_optional_text'];
    }

    public function buildView(FormViewInterface $view, FormInterface $form, array $options)
    {
        $vars = array();

        $vars['render_fieldset']          = $options['render_fieldset'];
        $vars['show_legend']              = $options['show_legend'];
        $vars['show_child_legend']        = $options['show_child_legend'];
        $vars['label_render']             = $options['label_render'];
        $vars['render_required_asterisk'] = $options['render_required_asterisk'];
        $vars['render_optional_text']     = $options['render_optional_text'];

        $view->addVars($vars);

    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
    	$resolver->setDefaults(array(
            'render_fieldset'          => $this->render_fieldset,
            'show_legend'              => $this->show_legend,
            'show_child_legend'        => $this->show_child_legend,
            'label_render'             => true,
            'render_required_asterisk' => $this->render_required_asterisk,
            'render_optional_text'     => $this->render_optional_text,
        ));
    }

    public function getExtendedType()
    {
        return 'form';
    }
}
