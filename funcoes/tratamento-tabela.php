<?php

function tratamento_nota($nota) {
	return substr($nota,28,44);
}

function tratamento_data($data) {
	return substr($data,8,2) . "/" . substr($data,5,2) . "/" .  substr($data,0,4);
}
