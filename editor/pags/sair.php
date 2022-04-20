<?php

	if(session_destroy()){
		redireciona('../editor/login', 'success', 2, 'Deslogando...');
	}else{
		echo "Erro ao deslogar.";
	}
?>