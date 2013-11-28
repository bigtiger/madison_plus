<?php
class Redux_Options_editor {

    /**
     * Field Constructor.
     *
     * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
     *
     * @since Redux_Options 1.0.0
    */
    function __construct($field = array(), $value ='', $parent) {
        $this->field = $field;
		$this->value = $value;
		$this->args = $parent->args;
    }

    /**
     * Field Render Function.
     *
     * Takes the vars and outputs the HTML for the field in the settings
     *
     * @since Redux_Options 1.0.0
    */
    function render() {
        $class = (isset($this->field['class'])) ? $this->field['class'] : '';

        $settings = array(
            'textarea_name' => $this->args['opt_name'] . '[' . $this->field['id'] . ']',
            'editor_class' => $class,
            'wpautop' => (isset($this->field['autop'])) ? $this->field['autop'] : true,
        );
		if (isset($this->field['height'])) {
			$settings['editor_height'] = $this->field['height'];
		} elseif (isset($this->field['rows'])) {
			$settings['textarea_rows'] = $this->field['rows'];
		}

        wp_editor($this->value, $this->field['id'], $settings );
        echo (isset($this->field['desc']) && !empty($this->field['desc'])) ? '<br/><span class="description">' . $this->field['desc'] . '</span>' : '';
    }
}
