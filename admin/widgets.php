<?php
function nb_widget() {
	echo nb_get_content();
}

function nb_widget_init() {
	if (get_option('pd_nb_inserttype','widget') == 'widget') {
		$description = __('No function here, justs inserts the appropiate stuff to display the attention bar!','attention-bar');
        	wp_register_sidebar_widget('pd_attention_bar', 'Attention bar', 'nb_widget', array('description'=>$description ));
	}
}
?>