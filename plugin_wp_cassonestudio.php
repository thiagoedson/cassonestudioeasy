<?php
/**
 * Nome do plug-in: CassoneStudio Easy
 * URI do plug-in: https://cassonestudio.com.br/cassonestudio-easy/
 * URI do projeto: https://github.com/thiagoedson/cassonestudioeasy
 * Descrição: Este é o primeiro plug-in que eu já criei.
 * Versão: 1.0.0
 * Autor: Thiago Edson Pereira
 * Autor URI: https://twitter.com/thiagoedson
 **/


function dh_modify_read_more_link() {

	return '<a class="more-link" href="' . get_permalink() . '">Leia mais</a>';

}

add_filter( 'the_content_more_link', 'dh_modify_read_more_link' );

